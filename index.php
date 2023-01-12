<?php
require_once('config.php');


// Incluir clases
spl_autoload_register(function ($className) {
    $fp = str_replace('\\','/',$className);
    $name = basename($fp);
    $dir  = dirname($fp);
    $file = ROOT_DIR.'/src/'.$dir.'/'.$name.'.php';
    if (file_exists($file)) {
        require_once $file;
        return;
    }
});

// Incluir routers
$routers = glob(ROOT_DIR.'/src/Routers/*.php');

foreach($routers as $file){
    require_once($file);
}

\Libs\Router::apply();
?>
