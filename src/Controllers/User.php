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
                //echo "Esta dirección de correo ($mail) es válida.";
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

    // Carga la cuenta del usuario o admin
    public static function Login($req){

        $nick = $req->post->name;
        $password = $req->post->password;

        //Obtener el user
        $user = MUser::select(["password,id,admin,mail"])
              ->where("nick", "$nick")
              ->getFirst();
        //Preguntar si la contraseña es correcta
        if(isset($user) && password_verify($password, $user->password)){
            //Crear una cookie
            $user->createCookie();
            if($user->admin == 1){
                $hash= md5(strtolower(trim($user->mail)));
                Router::redirect('/panel-begin', ["avatar"=>$hash]);
            }
            else{
                Router::redirect('/all');
            }
        }else{
            View::render('login', ['error'=> 'Datos incorrectos']);
        }
    }

    // Método que lleve a panel.php
    public static function panelAdmin($req ){
        if($req->user->admin) {
            //View::render("panel-begin",['lastNotes' => $notes]);
            $req->view->notitas = MNotita::orderBy('id', 'DESC')->get();;
            $req->view->html('panel-begin');
        }
    }

    // Cargar todas los usuarios para el admin
    public static function panelUsers($req) {
        if($req->user->admin){
            $req->view->Users = $users = MUser::all();
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
    public static function editUsers($req) {
        //$user = MUser::getById($req->params->id);
        //View::render("edit-user", ["User" => $user]);
        $req->view->User= MUser::getById($req->params->id);
        $req->view->html('edit-user');
    }

    // Update usuario
    public static function updateUser($req){
        $user = MUser::getById($req->params->id);
        $user->mail = $req->post->mail;
        $password = password_hash($req->post->password, PASSWORD_DEFAULT);
        $user->password = $password;

        $user->save();
        View::render("/view-user",['theUser' => $user]);
    }
    // Ver usuario
    public static function viewUser($req) {
        $user = MUser::getById($req->params->id);
        View::render("/view-user",['theUser' => $user]);
    }

    public static function loginOff($req){
        //eliminar cookie

        $req->user->eliminateCookie();
        Router::redirect('/login');

    }

}
