<?php
namespace Controllers;

use Libs\View;
use Models\User as MUser;
use Models\Notita as MNotita;
use Libs\Router;

class Notita {
    // Método que carge o lleva a crear una nueva nota

    public static function form($req) {

        //$hash= md5(strtolower(trim($req->user->mail)));
        //View::render("new", ['avatar' => $hash]);
        $req->view->html("new");
    }

    // Crea una nota - guardar nota
    public static function add($req) {
        $newNotita = new MNotita;
        #variable
        $titulo = $req->post->title;
        $contenido = $req->post->content;

        #preguntamos si no es nulo y si esta definido
        if(isset($titulo) & isset($contenido)){
            $newNotita->title = $titulo;
            $newNotita->content = $contenido;
            $newNotita->color = $req->post->color;
            $newNotita->user_id = $req->user->id;
            $newNotita->save();
            //Ir al index
            Router::redirect('/all');
        }else{
            Router::redirect('/new');
        }

    }

    // Método o camino que lleve a ver la nota completa
    public static function view($req){
        $id = $req->params->id;
        $notita = MNotita::getById($id);

        //carga la pagina
        $hash= md5(strtolower(trim($req->user->mail)));
        View::render("view", ['notita'=> $notita, 'avatar' => $hash]);
    }

    // Obtener todas las notas
    //***************************************
    public static function all($req){
        // SELECT * FROM notitas WHERE user_id=$user_id ORDER BY id DESC;
        $req->view->notitas = MNotita::where('user_id', $req->user->id)
               ->orderBy('id', 'DESC')
               ->get();
        $req->view->html("index");
    }
    //***************************************
    //
    //
    // Cargar todas las notas de los usuarios para el admin
    public static function panelNotes($req){
        if($req->user->admin){
            $req->view->notitas =  MNotita::orderBy('id', 'DESC')->get();
            $req->view->html("panel-notes");

        }
    }
    //
    //
    //

    // Eliminar nota apartir del id
    public static function delete($req){
        //print_r($req->user->admin);
        $req->notita->delete();
        //Regresar al index
        if(basename($req->path) == "admin")
            Router::redirect('/panel-notes');
        else
            Router::redirect('/all');


    }

    /************************************/
    // Editar una nota ya creada
    public static function editing($req){

        $hash= md5(strtolower(trim($req->user->mail)));
        View::render("edit", ["editMyNota"=>$req->notita, "avatar"=>$hash]);
    }

    // Guardar nota modificada
    public static function update($req){
        $saveNota = MNotita::getById($req->params->id);
        $saveNota->title = $req->post->title;
        $saveNota->content = $req->post->contenido;
        $saveNota->color = $req->post->color;
        $saveNota->save();
        //Ver la nota acabada de guardar
        Router::redirect('/note/'.$saveNota->id);
    }
    /************************************/
    public static function searching($req){
        $notas = MNotita::search($req->post->palabra, ['title'])->get();
        View::render("panel-notes", ['notitas'=> $notas]);

    }

}
