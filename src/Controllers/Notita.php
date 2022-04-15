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
		
	 	// Lo del formulario pasa al modelo - guardar nota
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
		public static function all(){
		  //Ordenar de forma decendente
			$value = 'id';
      $order = 'DESC';
		  MNotita::orderBy($value, $order);
		  //Ver todas las notas
			$NotasDesc = MNotita::get();
			View::render("index",['notitas' => $NotasDesc]);
			
		}	
		// Eliminar nota apartir del id		
		public static function delete($req){		
			$idid = $req->params->id;
			$killNota = MNotita::getById($idid);
			//echo $killNota->get;
			$killNota->delete();
			
			//Regresar al index
			Router::redirect('/all');		
		}
		
		/************************************/
		// Editar una nota ya creada 
		public static function editing($req){
			$editNota = MNotita::getById($req->params->id);			
			View::render("edit", ["editMyNota"=>$editNota]);
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
}

