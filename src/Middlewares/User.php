<?php

namespace Middlewares;

use Models\User as MUser;
use Libs\Router;

class User {
  public static function check($callback, $req) {
    $token = $_COOKIE['notita'];
    
    if (is_null($token))
      return Router::redirect('/login');  
      
    //Preguntar si el token esta en la BD
    //where busca y getFirst retorna una coinsidencia (objeto)
    $user = MUser::where('token', "$token")->getFirst();

    if(is_null($user))
      return Router::redirect('/login'); 
    
    $req->user = $user;
    call_user_func_array($callback, [$req]);
  }

}
