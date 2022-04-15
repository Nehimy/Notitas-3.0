<?php
/*
 * DuckBrain - Microframework
 *
 * Clase diseñada para crear y devolver una única instancia mysqli.
 * Depende de manera forzada de que estén definidas las constantes:
 * dbhost, dbname, dbpass y dbuser
 *
 * Autor: KJ
 * Web: https://kj2.me
 * Licencia: MIT
 */

namespace Libs;

class Database {
    static private $db;

    private function __construct() {}

    static public function getConnection() {
        if (!isset(self::$db)) {
            self::$db = new \mysqli(dbhost, dbuser, dbpass, dbname);
            if (self::$db->connect_errno) {
                echo '<style>body{white-space: pre-line;}</style>';
                throw new \Exception('No se ha podido conectar a la base de datos.');
            }
        }
        return self::$db;
    }
}
?>
