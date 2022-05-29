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
  
    //Método: 
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
        Router::redirect('/panel');
      else
        Router::redirect('/all');
    }else{
       View::render('login', ['error'=> 'Datos incorrectos']);           
    }
  }
  
   // Método que lleve a panel.php
	public static function panelAdmin(){
	  View::render("panel");
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
		$newNick = MUser::getById($req->params->id);
    $newNick->nick = $req->post->myname;
		$newNick->save();
		Router::redirect('/panel-users');
		}
	
}
