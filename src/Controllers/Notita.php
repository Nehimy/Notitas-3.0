<?php
namespace Controllers;

use Libs\View;
use Models\Notita as MNotita;
use Libs\Router;

class Notita {

		// Método que carge o lleve a new.php
		public static function form(){
			View::render("new");
		}

	 	// Crea una nota - guardar nota
		public static function add($req){
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
			View::render("view", ['notita'=> $notita]);
		}

		// Obtener todas las notas
		public static function all($req){
      $user_id = $req->user->id;    
			  // SELECT * FROM notitas WHERE user_id=$user_id ORDER BY id DESC;
        $notas = MNotita::where('user_id', $user_id)
		          ->orderBy('id', 'DESC')
              ->get();
        View::render("index",['notitas' => $notas]);
		}
		
		// Eliminar nota apartir del id
		public static function delete($req){
			$req->notita->delete();
			//Regresar al index
			Router::redirect('/all');
		}

		/************************************/
		// Editar una nota ya creada
		public static function editing($req){
			View::render("edit", ["editMyNota"=>$req->notita]);
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
