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

class View {

    /**
     * Función que "renderiza" las vistas
     *
     * @param string $viewName
     *   Ruta relativa y el nommbre sin extensión del archivo ubicado en src/Views
     *
     * @param array $params
     *   (opcional) Arreglo que podrá ser usado en la vista mediante $view ($param['index'] se usaría así: $view->index)
     *
     * @param string $viewPath
     *   (opcional) Ruta donde se encuentra la vista. En caso de que la vista no se encuentre en esa ruta, se usará la ruta por defecto "src/Views/".
     */
    public static function render(string $viewName, array $params = [], string $viewPath = null) {
        $view = new Neuron($params);
        unset($params);

        if (isset($viewPath) && file_exists($viewPath.$viewName.'.php'))
            return include($viewPath.$viewName.'.php');

        include(ROOT_DIR.'/src/Views/'.$viewName.'.php');
    }
}
?>
