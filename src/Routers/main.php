<?php
use Libs\Router;

/******************************Note***********************************/
//***********************************
// Ver nota cuando estemos en ney.lh
//***********************************

Router::get("", "Controllers\Notita::viewNote")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');


// Garga la pagina de new nota
Router::get("/new", "Controllers\Notita::newNoteForm")
    ->middleware('Middlewares\User::check');

// Guarda la nueva nota
Router::post("/new", "Controllers\Notita::addNote")
     ->middleware('Middlewares\User::check');

// Ver nota
Router::get("/note/{id}", "Controllers\Notita::viewNote")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');


// Ver todas las notas
Router::get("/all", "Controllers\Notita::allNotesForAllUsers")
    ->middleware('Middlewares\User::check');

// Los botones de siguiente y atras
Router::get("/page{page}","Controllers\Notita::allNotesForAllUsers")
        ->middleware('Middlewares\User::check');

// Cargar el panel inicial para el admin
Router::get("/panel-notes", "Controllers\Notita::allNotesForAllUsers")
    ->middleware('Middlewares\User::check');


/*****************************************************************/

// Eliminar nota
Router::get("/note/{id}/remove", "Controllers\Notita::delete")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

// Eliminar nota - admin
Router::get("/note/{id}/remove/admin", "Controllers\Notita::delete")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

// Editar nota
Router::get("/note/{id}/edit", "Controllers\Notita::editNote")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

// Guardar nota editada
Router::post("/note/{id}/update", "Controllers\Notita::update")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');




/****************************** User ***********************************/

// Nuevo user
Router::get("/register", "Controllers\User::UserRegister");

// Guarda en la base de datos al usuario nuevo
Router::post("/register", "Controllers\User::AddUser");

// Login
Router::get("/login", "Controllers\User::UserLogin");

// Loguearce
Router::post("/login", "Controllers\User::Login"); //confirmar logueo

//*********************************************************

// Eliminar un usuario
Router::get("/user/{id}/remove", "Controllers\User::deleteUser")
    ->middleware('Middlewares\User::check');

// Ver todas los usuarios para el admin
Router::get("/panel-users", "Controllers\User::allUsersForAdmin")
    ->middleware('Middlewares\User::check');

Router::get("/p{pag}", "Controllers\User::allUsersForAdmin")
    ->middleware('Middlewares\User::check');

// Editar usuario
Router::get("/user/{id}/edit", "Controllers\User::editUserForm")
    ->middleware('Middlewares\User::check');

// Adtualizar usuario
Router::post("/user/{id}/update", "Controllers\User::updateUser")
    ->middleware('Middlewares\User::check');


// Ver usuario
Router::get("/user/{id}/view", "Controllers\User::viewUser")
    ->middleware('Middlewares\User::check');

Router::get("/login-off", "Controllers\User::loginOff")
    ->middleware('Middlewares\User::check');
