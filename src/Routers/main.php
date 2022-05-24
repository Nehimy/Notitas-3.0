<?php

use Libs\Router;

/******************************Note***********************************/

Router::get("/new", "Controllers\Notita::form")->middleware('Middlewares\User::check');

//nueva nota
Router::post("/new", "Controllers\Notita::add")
     ->middleware('Middlewares\User::check');
     
// ver nota
Router::get("/note/{id}", "Controllers\Notita::view")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');
    
// ver todas las notas
Router::get("/all", "Controllers\Notita::all")
    ->middleware('Middlewares\User::check');

// eliminar nota
Router::get("/note/{id}/remove", "Controllers\Notita::delete")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

// editar nota
Router::get("/note/{id}/edit", "Controllers\Notita::editing")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

// guardar nota editada
Router::post("/note/{id}/update", "Controllers\Notita::update")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

/******************************User***********************************/

Router::get("/register", "Controllers\User::UserRegister");
Router::post("/register", "Controllers\User::AddUser"); //nuevo user

Router::get("/login", "Controllers\User::UserLogin");
Router::post("/login", "Controllers\User::Login");//confirmar logueo

Router::get("/panel", "Controllers\User::panelAdmin");

/*enlace de prueba*/

Router::get("/panel", "Controllers\User::allNotes");

Router::get("/panelusers", "Controllers\User::allUsers")
    ->middleware('Middlewares\User::check');


