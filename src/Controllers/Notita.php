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
    public static function backNext($req){
        $amount = 8;

        //back off y next off
        $req->view->backOff = 0;
        $req->view->nextOff = 1;
        $req->view->isAdmin = $req->user->admin;

        if(is_null($req->params->page)){
            $req->params->page = 1;
            $initialRow = 0;
        }else{
            //Indica en que parte de la fila se encuentra
            $initialRow = $amount * ($req->params->page -1);
        }

        if($req->user->admin){
            // Obtenemos las notas a mostrar
            $req->view->notitas = MNotita::orderBy('id','DESC')
                                ->limit($initialRow, $amount)->get();
            // Calculamos si quedan más notas
            $amountOverflow = MNotita::limit($initialRow, ($amount +1))
                            ->count(true, true) - $amount;
        }else{
            // Obtenemos las notas a mostrar
            $req->view->notitas = MNotita::where('user_id', $req->user->id)
                                ->limit($initialRow, $amount)->get();
            // Calculamos si quedan más notas
            $amountOverflow = MNotita::where('user_id', $req->user->id)
                            ->limit($initialRow, ($amount +1))
                            ->count(true, true) - $amount;
        }


        //Next
        if ($amountOverflow == 1){
            $req->view->pgNext = $req->params->page +1;
            $req->view->backOff = 1;
        }else{
            $req->view->backOff = 1;
            //next off
            $req->view->nextOff = 0;
        }
        //Back
        if ($req->params->page > 1){
            $req->view->pgBack = $req->params->page -1;
        }else{
            //back off
            $req->view->backOff = 0;
        }

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
