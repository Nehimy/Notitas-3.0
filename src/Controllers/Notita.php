<?php
namespace Controllers;

use Libs\View;
use Models\User as MUser;
use Models\Notita as MNotita;
use Libs\Router;

class Notita {

    // Método que carge o lleva a crear una nueva nota
    public static function newNoteForm($req) {

        $req->view->html("new");
    }

    // Guardar nota recien creada
    public static function addNote($req) {
        $newNotita = new MNotita;

        #preguntamos si no es nulo y si esta definido
        if(isset($req->post->title) & isset($req->post->content)) {
            $newNotita->title = $req->post->title;
            $newNotita->content = trim($req->post->content);
            $newNotita->color = $req->post->color;
            $newNotita->user_id = $req->user->id;

            $newNotita->save();

            //Ir al index
            Router::redirect('/all');
        }else{
            Router::redirect('/new');
        }

    }

    // Método o camino que lleve a ver la nota completa del usuario
    public static function viewNote($req) {

        $req->view->html('view');
    }

    // Obtener todas las notas
    //***************************************
    public static function allNotes($req){
        // SELECT * FROM notitas WHERE user_id=$user_id ORDER BY id DESC;
        $req->view->notitas = MNotita::where('user_id', $req->user->id)
               ->orderBy('id', 'DESC')
               ->get();
        $req->view->html("index");
    }
    //***************************************

    // Cargar todas las notas de los usuarios para el admin
    public static function loadNotesAdmin($req){
        if($req->user->admin){
            $req->view->notitas =  MNotita::orderBy('id', 'DESC')->get();
            $req->view->html("panel-notes");

        }
    }

    // Eliminar nota apartir del id
    public static function delete($req){
        //print_r($req->user->admin);
        //$req->notita->delete();
        $req->view->notita->delete();
        //Regresar al index
        if(basename($req->path) == "admin")
            Router::redirect('/panel-notes');
        else
            Router::redirect('/all');

    }

    /************************************/
    // Editar una nota ya creada
    public static function editNote($req){
        $req->view->html("edit");
    }

    // Guardar nota modificada
    public static function update($req){
        $saveNota = MNotita::getById($req->params->id);
        $saveNota->title = $req->post->title;
        $saveNota->content = trim($req->post->contenido);
        $saveNota->color = $req->post->color;
        $saveNota->save();
        //Ver la nota acabada de guardar
        Router::redirect('/note/'.$saveNota->id);
    }
    /************************************/
    public static function searchNotes($req){

        $req->view->notitas = MNotita::search($req->post->palabra, ['title'])->get();
        $req->view->html("panel-notes");

    }

}
