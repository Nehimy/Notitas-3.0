<?php
/*
 * DuckBrain - Microframework
 *
 * Librería de Enrrutador.
 * Depende de manera forzada de que la constante ROOT_DIR esté definida
 * y de manera optativa de que la constante SITE_URL lo esté también.
 *
 * Autor: KJ
 * Web: https://kj2.me
 * Licencia: MIT
 */

namespace Libs;

class Router {
    private static $get = [];
    private static $post = [];
    private static $put = [];
    private static $delete = [];
    private static $last;
    public static $notFoundCallback = 'Libs\Router::defaultNotFound';

    private static function defaultNotFound () {
        header("HTTP/1.0 404 Not Found");
        echo '<h2 style="text-align: center;margin: 25px 0px;">Error 404 - Página no encontrada</h2>';
    }

    private function __construct() {}

    /*
     * Parsea para deectar las pseudovariables (ej: {variable})
     *
     * @param string $path
     *   Ruta con pseudovariables.
     *
     * @param callable $callback
     *   Callback que será llamado cuando la ruta configurada en $path coincida.
     *
     * @return array
     *   Arreglo con 2 índices:
     *     path        - Contiene la ruta con las pseudovariables reeplazadas por expresiones regulares.
     *     callback    - Contiene el callback en formato Namespace\Clase::Método.
     */
    private static function parse($path, $callback) {
        preg_match_all('/{(\w+)}/s', $path, $matches, PREG_PATTERN_ORDER);
        $paramNames = $matches[1];

        $path = preg_quote($path, '/');
        $path = preg_replace(
            ['/\\\{\w+\\\}/s'],
            ['([^\/]+)'],
            $path);

        if (!is_callable($callback)) {
            $callback = 'Controllers\\'.$callback;
        }

        return [
            'path'       => $path,
            'callback'   => $callback,
            'paramNames' => $paramNames
        ];
    }


    /*
     * Devuelve el ruta base o raiz del proyecto sobre la que trabajará el router.
     *
     * Ej: Si la url del sistema está en "https://ejemplo.com/duckbrain"
     *     entonces la ruta base sería "/duckbrain"
     */
    public static function basePath() {
        if (defined('SITE_URL'))
            return parse_url(SITE_URL, PHP_URL_PATH);
        return str_replace($_SERVER['DOCUMENT_ROOT'], '/', ROOT_DIR);
    }

    /*
     * Redirije a una ruta relativa interna.
     *
     * @param string $path
     *   La ruta relativa a la ruta base.
     *
     * Ej: Si nuesto sistema está en "https://ejemplo.com/duckbrain"
     *     llamamos a Router::redirect('/docs'), entonces seremos
     *     redirigidos a "https://ejemplo.com/duckbrain/docs".
     */
    public static function redirect($path) {
        header('Location: '.static::basePath().substr($path,1));
    }

    /*
     * Añade un middleware a la última ruta usada.
     * Solo se puede usar un middleware a la vez.
     *
     * @param string $callback
     *
     * @return static
     *   Devuelve un enlace estático.
     */
    public static function middleware($callback){
        if (!isset(static::$last))
            return;

        $method = static::$last[0];
        $index = static::$last[1];

        if (!is_callable($callback)) {
            $callback = 'Middlewares\\'.$callback;
        }

        static::$$method[$index]['middleware'] = $callback;

        return new static();
    }

    /*
     * @return object
     *   Devuelve un objeto que contiene los atributos:
     *     post  - Donde se encuentran los valores enviados por $_POST.
     *     get   - Donde se encuentran los valores enviados por $_GET.
     *     json  - Donde se encuentran los valores JSON enviados en el body.
     *
     */
    private static function getReq() {
        $req             = (object) '';
        $req->get        = new Neuron($_GET);
        $req->post       = new Neuron($_POST);
        $req->json       = new Neuron(static::get_json());
        $req->params     = new Neuron();
        $req->path       = static::currentPath();
        return $req;
    }

    /*
     * @return object
     *   Devuelve un objeto con los datos recibidos en JSON.
     */
    private static function get_json() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if ($contentType === "application/json") {
            return json_decode(trim(file_get_contents("php://input")));
        }
        return (object) '';
    }

    /*
     * Define los routers para el método GET.
     *
     * @param string $path
     *   Ruta con pseudovariables.
     *
     * @param callable $callback
     *   Callback que será llamado cuando la ruta configurada en $path coincida.
     *
     * @return static
     *   Devuelve un enlace estático.
     */
    public static function get($path, $callback) {
        static::$get[] = static::parse($path, $callback);
        static::$last = ['get', count(static::$get)-1];
        return new static();
    }

    /*
     * Define los routers para el método POST.
     *
     * @param string $path
     *   Ruta con pseudovariables.
     *
     * @param callable $callback
     *   Callback que será llamado cuando la ruta configurada en $path coincida.
     *
     * @return static
     *   Devuelve un enlace estático.
     */
    public static function post($path, $callback) {
        static::$post[] = static::parse($path, $callback);
        static::$last   = ['post', count(static::$post)-1];
        return new static();
    }

    /*
     * Define los routers para el método PUT.
     *
     * @param string $path
     *   Ruta con pseudovariables.
     *
     * @param callable $callback
     *   Callback que será llamado cuando la ruta configurada en $path coincida.
     *
     * @return static
     *   Devuelve un enlace estático
     */

    public static function put($path, $callback) {
        static::$put[]  = static::parse($path, $callback);
        static::$last   = ['put', count(static::$put)-1];
        return new static();
    }

    /*
     * Define los routers para el método DELETE.
     *
     * @param string $path
     *   Ruta con pseudovariables
     *
     * @param callable $callback
     *   Callback que será llamado cuando la ruta configurada en $path coincida.
     *
     * @return static
     *   Devuelve un enlace estático
     */
    public static function delete($path, $callback) {
        static::$delete[] = static::parse($path, $callback);
        static::$last     = ['delete', count(static::$delete)-1];
        return new static();
    }

    /*
     * Devuelve la ruta actual.
     */
    public static function currentPath() {
        return preg_replace('/'.preg_quote(static::basePath(), '/').'/',
                            '/', strtok($_SERVER['REQUEST_URI'], '?'), 1);
    }

    /*
     * Aplica los routers.
     *
     * Este método ha de ser llamado luego de que todos los routers hayan sido configurados.
     *
     * En caso que la ruta actual coincida con un router configurado, se comprueba si hay middleware; Si hay
     * middleware, se enviará el callback y los datos de la petición como un Neuron. Caso contrario, se enviarán
     * los datos directamente al callback.
     *
     * Con middleware:
     *                 $middleware($callback, $req)
     *
     * Sin middleware:
     *                 $callback($req)
     *
     * $req es una instancia de Neuron que tiene los datos de la petición.
     *
     * Si no la ruta no coincide con ninguna de las rutas configuradas, ejecutará el callback $notFoundCallback
     */
    public static function apply() {
        $path =  static::currentPath();
        $routers = [];
        switch ($_SERVER['REQUEST_METHOD']){ // Según el método selecciona un arreglo de routers configurados
            case 'POST':
                $routers = static::$post;
                break;
            case 'PUT':
                $routers = static::$put;
                break;
            case 'DELETE':
                $routers = static::$delete;
                break;
            default:
                $routers = static::$get;
                break;
        }

        $args = static::getReq();

        foreach ($routers as $router) { // revisa todos los routers para ver si coinciden con la ruta actual
            if (preg_match_all('/^'.$router['path'].'\/?$/si',$path, $matches, PREG_PATTERN_ORDER)) {
                unset($matches[0]);

                // Comprobando pseudo variables en la ruta
                if (isset($matches[1])) {
                    foreach ($matches as $index => $match) {
                        $paramName = $router['paramNames'][$index-1];
                        $args->params->$paramName = urldecode($match[0]);
                    }
                }

                // Comprobando si hay middleware
                if (isset($router['middleware']))
                    $data = call_user_func_array($router['middleware'], [$router['callback'], $args]);
                else
                    $data = call_user_func_array($router['callback'], [$args]);

                if (isset($data)) {
                    header('Content-Type: application/json');
                    print(json_encode($data));
                }

                return;
            }
        }

        // Si no hay router que coincida llamamos a $notFoundCallBack
        call_user_func_array(static::$notFoundCallback, [$args]);
    }
}
?>
