<?php
namespace Models;

use Libs\ModelMySQL;

class User extends ModelMySQL{
  public $nick;
  public $mail;
  public $password;
  public $admin;
  public $token;

  //Genera el token y crea la cookie
  public function createCookie() {
    $token = md5($this->id.'-'.time().PRIVATE_KEY);

    $this->token = $token;
    $this->save();

    setcookie("notita", $token, time()+(24*60*60*31),true);
  }

  public function eliminateCookie() {
      /*$token = md5($this->id.'-'.time().PRIVATE_KEY);
      $this->token = $token;
      $this->save();*/

      setcookie("notita", time() - 3600, true);
  }
}
