<?php

namespace Middlewares;

use Models\User as MUser;
use Models\Notita as MNotita;
use Libs\Router;
use Libs\Middleware;
use Libs\View;

// comprueba si el usuario es ese
class User extends Middleware {

    public static function check($req) {

    if (is_null($_COOKIE['notita']))
      return Router::redirect('/login');
    else
       $token = $_COOKIE['notita'];
    //Preguntar si el token esta en la BD
    //where busca y getFirst retorna una coinsidencia (objeto)
    $user = MUser::where('token', "$token")->getFirst();

    if(is_null($user))
        return Router::redirect('/login');

    $req->user = $user;
    $req->view = new View;
    $req->view->avatar = md5(strtolower(trim($user->mail)));



    static::next($req);
  }

  //verificar dueño
   public static function verifyOwner($req) {

     $notita = MNotita::getById($req->params->id);

     if(is_null($notita))
        exit('La nota no existe.');

     $req->notita = $notita;

     if($notita->user_id == $req->user->id ||
     $req->user->admin)
       static::next($req);
     else
       exit('Acceso denegado.');
   }

}
