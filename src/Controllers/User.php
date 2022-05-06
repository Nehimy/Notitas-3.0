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
      
      if (isset($user))
        exit("El nick \"$nick\" ya está en uso.");
    
			$newUser->nick = $nick;
			$newUser->mail = $mail;
			$newUser->password = $password;
			$newUser->admin = $admin;
			$newUser->save();			
     }

      ?>
      <html>
        <header>
        </header>
        </body>
          Usuario ya registrado, proceda a logearse por favor.
          <a href="<?=SITE_URL?>login">Iniciar sesión</a>
        </body>
     
      </html>  
      <?php
  }
  
    // Método: 
  public static function UserLogin(){
    View::render('login');
  }
  
  public static function Login($req){
    //preguntar si este usuario ya esta en lista
    $nick = $req->post->name;
    $password = $req->post->password;

    //obtener tabla users
    $result = MUser::select(["password,id"])
                     ->where("nick", "$nick")
                     ->getFirst();       
                           
    if(password_verify($password, $result->password)){
      echo "Logueado correctamente <br>";
      //Crear una cookie (token o llave identificativa)
      setcookie("Ney", 'time login', time()+(24*60*60*31),true);
      
      //Vamos al panel del usuario
      $MyId = $result->id; //id del usuario
      $TheNote = new MNotita;
      $TheNote = MNotita::select(['user_id'])
                        ->where('user_id',"$MyId")
                        ->getFirst();
      if($TheNote){
        //Cagar todo lo que tenga
      }else{
        //Carga el panel vacio el usuario
        echo "Nuevo usuario contenido vacio";
      }
    }else{
      View::render('login', ['error'=> 'Datos incorrectos']);           
    }
  }
  
}
