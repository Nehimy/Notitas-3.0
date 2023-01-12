<?php

namespace Controllers;

use Libs\View;
use Models\User as MUser;
use Models\Notita as MNotita;
use Libs\Router;

class User {

    // Método que carge registro
    public static function UserRegister() {
        View::render('register');
    }

    // Método que guarde el usuario
    public static function AddUser($req) {
        $newUser = new MUser;

        $nick = $req->post->name;
        $mail = $req->post->mail;
        $password = $req->post->password;
        //Encriptando contraseña
        $password = password_hash($password, PASSWORD_DEFAULT);
        //$admin = isset($req->post->admin) ? 1:0;
        $admin = 0;

        if(isset($nick) & isset($password)) {
            $user = MUser::where("nick", "$nick")
                  ->getFirst();

            if (isset($user)) {
                View::render("message", ["content"=>" El nick ya esta en uso", "url"=>"register", "button"=> "Volver al registro!"]);
                exit();
            }
            $newUser->nick = $nick;
            $newUser->admin = $admin;
            $newUser->password = $password;

            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $newUser->mail = $mail;
            }else{
                $menssage = "Esta dirección de correo \"$mail\" no es válida.";
                View::render("message", ["content"=>$menssage, "url"=>"register", "button"=> "Volver al registro!"]);
                exit();
            }

            $newUser->save();
            View::render("message",["content"=>"Usuario ya registrado, proceda a logearse por favor.", "url"=>"login", "button"=> "Iniciar sesión"]);
        }
    }


    // Carga el formulario del login
    public static function UserLogin(){
        View::render('login');
    }

    // Recibe los datos del formulario login
    public static function Login($req){

        $nick = $req->post->name;
        $password = $req->post->password;

        //Obtener el usuario
        $user = MUser::select(["password,id,admin,mail"])
              ->where("nick", "$nick")
              ->getFirst();
        //Preguntar si la contraseña es correcta
        if(isset($user) && password_verify($password, $user->password)){
            //Crear una cookie
            $user->createCookie();
            if($user->admin == 1){
                $hash= md5(strtolower(trim($user->mail)));
                Router::redirect('/panel-notes', ["avatar"=>$hash]);
            }
            else{
                Router::redirect('/all');
            }
        }else{
            View::render('login', ['error'=> 'Datos incorrectos']);
        }
    }

    // Cargar todas los usuarios para el admin
    public static function allUsersForAdmin($req) {
        if($req->user->admin){
            $amount = 16;
            if(is_null($req->params->pag)){
                $req->params->pag = 1;
                $initialRow = 0;
            }else{
                $initialRow = $amount * ($req->params->pag -1);
            }

            if($req->get->search)
                $req->view->users = MUser::search($req->get->search, ['nick']);

            //$req->view->users = $users = MUser::all();
            $req->view->users = MUser::orderBy('id','DESC')
                              ->limit($initialRow, $amount)->get(false);

            //calculo para saber si quedan usuarios a cargar en otra pag.
            $amountOverflow =  MUser::limit($initialRow, ($amount +1))
                            ->count(true, true) - $amount;

            //next
            if($amountOverflow == 1)
                $req->view->next = $req->params->pag +1;

            if($req->params->pag > 1)
                $req->view->back = $req->params->pag -1;

            $req->view->html("panel-users");
        }
    }

    // Eliminar usuario
    public static function deleteUser($req) {

        $notes = MNotita::where('user_id', $req->params->id)
              ->orderBy('id', 'DESC')
               ->get();
        //Eliminar todas sus notas
        foreach($notes as $note){
            $note->delete();
        }
        // Eliminar usuario
        MUser::getById($req->params->id)->delete();
        Router::redirect('/panel-users');
    }

    // Editat usuario
    public static function editUserForm($req) {
        //$user = MUser::getById($req->params->id);
        //View::render("edit-user", ["User" => $user]);
        $req->view->user = MUser::getById($req->params->id);
        $req->view->html('edit-user');
    }

    // Update usuario
    public static function updateUser($req){
        $user = MUser::getById($req->params->id);
        $user->mail = $req->post->mail;
        $password = password_hash($req->post->password, PASSWORD_DEFAULT);
        $user->password = $password;
        $user->save();

        Router::redirect("/user/$user->id/view");

    }

    // Carga la página luego de aptualizar los datos del usuario
    public static function viewUser($req) {

        $req->view->user =  MUser::getById($req->params->id);$user;
        $req->view->html("view-user");
    }

    // Elimina la sesión del usuario
    public static function loginOff($req){

        $req->user->eliminateCookie();
        Router::redirect('/login');

    }

}
