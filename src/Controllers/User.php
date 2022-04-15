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
    $admin = isset($req->post->admin) ? 1:0;
    
    if(isset($nick) & isset($password)){
			$newUser->nick = $nick;
			$newUser->password = $password;
			$newUser->admin = $admin;
			$newUser->save();			
     }
     //Nueva nota (1 BD para cada usuario)
     $newNotes = new MNotita;
     
     //cargar la cuenta de solo usuario
     //Ordenar de forma decendente
			$value = 'id';
      $order = 'DESC';
		  MNotita::orderBy($value, $order);
     $contenido = MNotita::get();
     View::render("index",['notitas' => $contenido]);
     
     
  }
  
  
  
  
  
  
  
  
  
  
  
  
}
