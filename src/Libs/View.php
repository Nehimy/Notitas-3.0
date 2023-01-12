<?php
/**
 * View - DuckBrain
 *
 * Manejador de vistas simplificado.
 *
 * @author KJ
 * @website https://kj2.me
 * @licence MIT
*/

namespace Libs;

class View extends Neuron {

    /**
     * Función que "renderiza" las vistas
     *
     * @param string $viewName
     *   Ruta relativa y el nommbre sin extensión del archivo ubicado en src/Views
     *
     * @param array $params
     *   (opcional) Arreglo que podrá ser usado en la vista mediante $view,ej. ($param['index'] se usaría así: $view->index)
     *
     * @param string $viewPath
     *   (opcional) Ruta donde se encuentra la vista. En caso de que la vista no se encuentre en esa ruta, se usará la ruta por defecto "src/Views/".
     */
    public static function render(string $viewName, array $params = [], string $viewPath = null) {
        $instance = new View($params);
        $instance->html($viewName, $viewPath);
    }

    /**
     * Renderiza las vistas HTML
     *
     * @param string $viewName
     *  Ruta relativa y el nommbre sin extensión del archivo ubicado en src/Views
     *
     * @param string $viewPath
     *   (opcional) Ruta donde se encuentra la vista. En caso de que la vista no se encuentre en esa ruta, se usará la ruta por defecto "src/Views/".
     */
    public function html(string $viewName, string $viewPath = null) {
        $view = $this;

        if (isset($viewPath) && file_exists($viewPath.$viewName.'.php'))
            return include($viewPath.$viewName.'.php');

        include(ROOT_DIR.'/src/Views/'.$viewName.'.php');
    }

    /**
     * Imprime los datos en Json.
     *
     * @param object $data
     */
    public function json(object $data) {
        header('Content-Type: application/json');
        print(json_encode($data));
    }

    /**
     * Imprime los datos en texto plano
     *
     * @param string $txt
     */
    public function text(string $txt) {
        header('Content-Type: text/plain');
        print($txt);
    }
}
?>
