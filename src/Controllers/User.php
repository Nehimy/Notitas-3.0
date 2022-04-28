<?php

namespace Controllers;

use Libs\View;
use Models\User as MNuser;
use Models\Notita as MNotita;
use Libs\Router;

class User{
  
  // Método que carge registro
  public static function UserRegister(){
    View::render('register'); 
  }
  
  // Método que guarde el usuario
  public static function AddUser($req){
    $newUser = new MNuser;
    
    $nick = $req->post->name;
    $mail = $req->post->mail;
    $password = $req->post->password;
    //$admin = isset($req->post->admin) ? 1:0;
    $admin = 0;
    
    if(isset($nick) & isset($password)){
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
          <a href="<?=SITE_URL?>login">Save</a>
        </body>
     
      </html>  
      <?php
  }
  
    // Método
  public static function UserLogin(){
    View::render('login');
  }
  
  
  
  
  
  
  
  
}
