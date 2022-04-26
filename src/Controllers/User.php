<?php

namespace Controllers;

use Libs\View;
use Models\User as MNuser;
use Models\Notita as MNotita;
use Libs\Router;

class User{
  
  // Método que carge o lleve a login.php
  public static function UserRegister(){
    View::render('register');
  }
  
  // Método que guarde el usuario
  public static function addUser($req){
    $newUser = new MNuser;
    
    $nick = $req->post->name;
    $password = $req->post->password;
    //$admin = isset($req->post->admin) ? 1:0;
    $admin = 0;
    
    if(isset($nick) & isset($password)){
			$newUser->nick = $nick;
			$newUser->password = $password;
			$newUser->admin = $admin;
			$newUser->save();			
     }
     //obtener el id del usuario
     //Buscar: hacer una consulta sql para apartir de una colummna obtener el id
     /*$dato = MNuser::get();
     $dato2 = $req->post->id;
     print_r($dato);  
     print_r($dato2);*/
     
     //$dato3 = MNuser::getVars();
     //print_r($dato3);
     //$id = "id";
     //$dato4 = MNuser::search($id);
     //print_r($dato4);
  }
  
  
  
  
  
  
  
  
  
  
  
  
}
