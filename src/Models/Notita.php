<?php

namespace Models;

use Libs\ModelMySQL;

class Notita extends ModelMySQL{
    public $title;
    public $content;
    public $color;
    public $user_id;
}
