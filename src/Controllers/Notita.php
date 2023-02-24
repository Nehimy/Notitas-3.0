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

    /* Metodo de paginación */
    // Obtener n cantidad notas por pag.
    // Tambien carga notas que se buscan en el buscador
    public static function allNotesForAllUsers($req){
        $amount = 8;
        $req->view->admin = $req->user->admin;


        if(is_null($req->params->page)){
            $req->params->page = 1;
            $initialRow = 0;
        }else{
            //Indica en que parte de la fila se encuentra
            $initialRow = $amount * ($req->params->page -1);
        }
        //
        $notes = MNotita::orderBy('id','DESC')
               ->limit($initialRow, $amount);

        if (!$req->user->admin)
            $notes = $notes->where('user_id', $req->user->id);

        if(isset($req->get->search)){
            $notes = $notes->search($req->get->search,['title']);
            $req->view->search = '?search='.$req->get->search;
        } else
            $req->view->search = '';


        $req->view->notitas = $notes->get(false);

        $amountOverflow = MNotita::limit($initialRow, ($amount +1))
                        ->count(true, true) - $amount;

        //Next
        if ($amountOverflow == 1)
            $req->view->pgNext = $req->params->page +1;
        //Back
        if ($req->params->page > 1)
            $req->view->pgBack = $req->params->page -1;

        // Cargar la página
        $req->view->html("panel-notes");
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


}
