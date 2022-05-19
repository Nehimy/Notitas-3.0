<?php
/**
 * Database - DuckBrain
 *
 * Clase diseñada para crear y devolver una única instancia mysqli (database).
 * Depende de manera forzada de que estén definidas las constantes:
 * dbhost, dbname, dbpass y dbuser
 *
 * @author KJ
 * @website https://kj2.me
 * @licence MIT
 */

namespace Libs;
use mysqli;

class Database extends \mysqli {
    static private $db;

    private function __construct() {}

    /**
     * Devuelve una instancia homogénea (singlenton) a la base de datos.
     *
     * @return mysqli
     */
    static public function getConnection() : mysqli {
        if (!isset(self::$db)) {
            self::$db = new mysqli(dbhost, dbuser, dbpass, dbname);
            if (self::$db->connect_errno) {
                echo '<style>body{white-space: pre-line;}</style>';
                throw new \Exception('No se ha podido conectar a la base de datos.');
            }
        }
        return self::$db;
    }
}
?>
