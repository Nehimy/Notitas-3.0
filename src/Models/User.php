<?php

namespace Models;

use Libs\ModelMySQL;

class User extends ModelMySQL{
  public $nick;
  public $password;
  public $admin;
}
