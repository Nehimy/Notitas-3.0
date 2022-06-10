<?php

namespace Controllers;

use Libs\View;
use Models\User as MUser;
use Models\Notita as MNotita;
use Libs\Router;

class User{

    // Método que carge registro
    public static function UserRegister(){
        View::render('register');
    }

    // Método que guarde el usuario
    public static function AddUser($req){
        $newUser = new MUser;

        $nick = $req->post->name;
        $mail = $req->post->mail;
        $password = $req->post->password;
        //Encriptando contraseña
        $password = password_hash($password, PASSWORD_DEFAULT);
        //$admin = isset($req->post->admin) ? 1:0;
        $admin = 0;

        if(isset($nick) & isset($password)){
            $user = MUser::where("nick", "$nick")
                  ->getFirst();

            if (isset($user)){
                //exit("El nick \"$nick\" ya está en uso.");
                View::render("option-1", ["user"=>$user, "content"=>"ya esta en uso"]);
                exit();
            }
            $newUser->nick = $nick;
            $newUser->mail = $mail;
            $newUser->password = $password;
            $newUser->admin = $admin;
            $newUser->save();
            View::render("option-2");
        }
    }
    //Método
    public static function UserLogin(){
        View::render('login');
    }

    public static function Login($req){

        $nick = $req->post->name;
        $password = $req->post->password;

        //Otener el users
        $user = MUser::select(["password,id,admin"])
              ->where("nick", "$nick")
              ->getFirst();
        //Preguntar si la contraseña es correcta
        if(isset($user) && password_verify($password, $user->password)){
            //Crear una cookie
            $user->createCookie();

            if($user->admin == 1)
                Router::redirect('/panel-begin');
            else
                Router::redirect('/all');
        }else{
            View::render('login', ['error'=> 'Datos incorrectos']);
        }
    }

    // Método que lleve a panel.php
    public static function panelAdmin($req){
        if($req->user->admin){
            $notes = MNotita::orderBy('id', 'DESC')->get();
            View::render("panel-begin",['lastNotes' => $notes]);
        }
    }

    // Cargar todas las notas para el admin
    public static function allNotes($req){
        if($req->user->admin){
            $notas = MNotita::orderBy('id', 'DESC')->get();
            View::render("panel-notes",['notitas' => $notas]);
        }
    }

    // Cargar todas los usuarios para el admin
    public static function allUsers($req){
        if($req->user->admin){
            $users = MUser::all();
            View::render("panel-users",['theUsers' => $users]);
        }
    }

    // Eliminar usuario
    public static function deleteUser($req){
        $theuser = MUser::getById($req->params->id);
        $theuser->delete();

        Router::redirect('/panel-users');
    }

    // Editat usuario
    public static function editUsers($req){
        $theuser = MUser::getById($req->params->id);
        View::render("edit-user", ["editUser" => $theuser]);
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



}
