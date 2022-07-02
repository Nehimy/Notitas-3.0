<?php
use Libs\Router;

/******************************Note***********************************/

// Garga la pagina de new nota
Router::get("/new", "Controllers\Notita::newNota")->middleware('Middlewares\User::check');

// guarda la nueva nota
Router::post("/new", "Controllers\Notita::addNota")
     ->middleware('Middlewares\User::check');

// ver nota
Router::get("/note/{id}", "Controllers\Notita::viewNota")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

// ver todas las notas
Router::get("/all", "Controllers\Notita::all")
    ->middleware('Middlewares\User::check');

// eliminar nota
Router::get("/note/{id}/remove", "Controllers\Notita::delete")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

// eliminar nota - admin
Router::get("/note/{id}/remove/admin", "Controllers\Notita::delete")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

// editar nota
Router::get("/note/{id}/edit", "Controllers\Notita::editing")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

/*Router::get("/note/{id}/edit", "Controllers\Notita::editing")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');*/

// guardar nota editada
Router::post("/note/{id}/update", "Controllers\Notita::update")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

/******************************User***********************************/
// nuevo user
Router::get("/register", "Controllers\User::UserRegister");
Router::post("/register", "Controllers\User::AddUser");

// login
Router::get("/login", "Controllers\User::UserLogin");

// login por formulario
Router::post("/login", "Controllers\User::Login"); //confirmar logueo
// ->middleware('Middlewares\User::check');

// cargar el panel
Router::get("/panel-begin", "Controllers\User::panelAdmin")
    ->middleware('Middlewares\User::check');

// eliminar un usuario
Router::get("/user/{id}/remove", "Controllers\User::deleteUser")
    ->middleware('Middlewares\User::check');

// ver todas los usuarios para el admin
Router::get("/panel-users", "Controllers\User::panelUsers")
    ->middleware('Middlewares\User::check');

// ver todas las notas para el admin
Router::get("/panel-notes", "Controllers\Notita::panelNotes")
    ->middleware('Middlewares\User::check');

// editar usuario
Router::get("/user/{id}/edit", "Controllers\User::editUsers")
    ->middleware('Middlewares\User::check');

// enlace del search
Router::post("/search-for", "Controllers\Notita::searching")
    ->middleware('Middlewares\User::check');

// Adtualizar usuario
Router::post("/user/{id}/update", "Controllers\User::updateUser")
    ->middleware('Middlewares\User::check');

// Ver usuario
Router::get("/user/{id}/view", "Controllers\User::viewUser")
    ->middleware('Middlewares\User::check');

Router::get("/login-off", "Controllers\User::loginOff")
    ->middleware('Middlewares\User::check');


//Test 1

Router::get("/pruebita", function(){
    //echo "hola mundo";
    \Libs\View::render("login");

} );

//Test 2

Libs\Router::get("/dina-mariguana", function(){
    $buey = new \Libs\View;
    $buey ->render("/header", ["avatar"=>"205e460b479e2e5b48aec07710c08d50"]);
});
