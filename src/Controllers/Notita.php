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

        //$req->view->notitas = MNotita::where('user_id', $req->user->id)->limit(2, 4)->get();
        $req->view->html("index");
    }
    //***************************************

    // Carga n cantidad de notas para el admin
    public static function adminNotes($req){
        if(isset($req->user->admin)){
            //Caso especial cuando sea la primer pagina
            $amount = 8;
            if(is_null($req->params->page)){
                $req->params->page = 1;
                $initialRow = 0;
            }else{
                $initialRow = $amount * ($req->params->page -1);
            }

            //Caso general
            $req->view->notitas = MNotita::orderBy('id','DESC')
                                ->limit($initialRow, $amount)->get();

            $amountOverflow = MNotita::limit($initialRow, ($amount +1))->count(true, true) - $amount;

            if ($amountOverflow == 1)
                $req->view->pg= $req->params->page;
            else
                $req->view->pg= $req->params->page -1;

            $req->view->html("panel-notes");
        }

    }

    /*Back metodo temporal que va hacia una pagina aterior si la hay*/
    public static function backNext($req){
        $amount = 8;
        if(isset($req->user->admin)){
            // Cuando la pagina cargue por primera vez
            if(is_null($req->params->page)){
                echo "mierda";
                $req->params->page = 1;
                $initialRow = 0;
            }else{
                //Indica en que parte de la fila esta
                $initialRow = $amount * ($req->params->page -1);
            }
            // Obtenemos las notas a mostrar
            $req->view->notitas = MNotita::orderBy('id','DESC')
                                ->limit($initialRow, $amount)->get();

            // Calculamos si quedan más notas
            $amountOverflow = MNotita::limit($initialRow, ($amount +1))->count(true, true) - $amount;


            if ($amountOverflow == 1)
                $req->view->pgNext = $req->params->page +1;
            else
                $req->view->pgNext = $req->params->page;

            echo $req->view->pgNext;
             echo "<br>";
             echo $req->view->pgBack;

            if ($req->params->page > 1)
                $req->view->pgBack = $req->params->page -1;

            if ($req->params->page == 1)
                $req->view->pgBack = 1;

            // carga la pagina
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
