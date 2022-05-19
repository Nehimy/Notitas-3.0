<?php

use Libs\Router;

/******************************Note***********************************/

Router::get("/new", "Controllers\Notita::form")->middleware('Middlewares\User::check');
//nueva nota
Router::post("/new", "Controllers\Notita::add")
     //->middleware('Middlewares\User::verifyOwner')
     ->middleware('Middlewares\User::check');
//ver nota
Router::get("/note/{id}", "Controllers\Notita::view")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');
Router::get("/all", "Controllers\Notita::all")->middleware('Middlewares\User::check');

Router::get("/note/{id}/remove", "Controllers\Notita::delete")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

// editar nota
Router::get("/note/{id}/edit", "Controllers\Notita::editing")
    ->middleware('Middlewares\User::verifyOwner')
    ->middleware('Middlewares\User::check');

Router::post("/note/{id}/update", "Controllers\Notita::update")
    ->middleware('Middlewares\User::check');

/******************************User***********************************/

Router::get("/register", "Controllers\User::UserRegister");
Router::post("/register", "Controllers\User::AddUser"); //nuevo user

Router::get("/login", "Controllers\User::UserLogin");
Router::post("/login", "Controllers\User::Login");//confirmar logueo
