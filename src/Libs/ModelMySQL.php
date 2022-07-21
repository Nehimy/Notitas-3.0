<?php
/**
 * ModelMysql - DuckBrain
 *
 * Modelo ORM para objetos que hagan uso de una base de datos MySQL.
 * Depende de que exista Libs\Database para poder funcionar.
 *
 * @author KJ
 * @website https://kj2.me
 * @licence MIT
 */

namespace Libs;

use Libs\Database;
use mysqli;

class ModelMySQL {

    public           ?int    $id          = null;
    protected        array   $toNull      = [];
    static protected string  $primaryKey  = 'id';
    static protected array   $ignoreSave  = ['id'];
    static protected array   $forceSave   = [];
    static protected string  $table;
    static protected string  $tableSufix  = 's';
    static protected ?mysqli $db          = null;
    static protected array   $querySelect = [
        'select'              => ['*'],
        'where'               => '',
        'from'                => '',
        'leftJoin'            => '',
        'rightJoin'           => '',
        'innerJoin'           => '',
        'AndOr'               => '',
        'orderBy'             => '',
        'groupBy'             => '',
        'limit'               => '',
        'sql_calc_found_rows' => false
    ];

    /**
     * Sirve para obtener la instancia de la base de datos.
     *
     * @return mysqli
     */
    protected static function db() : mysqli {
        if (is_null(static::$db))
            static::$db = Database::getConnection();

        return static::$db;
    }

    /**
     * Ejecuta una sentencia SQL en la base de datos.
     *
     * @param string $query
     *   Contiene la sentencia SQL que se desea ejecutar.
     *
     * @throws \Exception
     *   En caso de que la sentencia SQL falle, devolverá un error en pantalla.
     *
     * @return mixed
     *   Contiene el resultado de la llamada SQL (mysqli_result o bool).
     */
    protected static function query($query) {
        $db = static::db();

        $result = $db->query($query);
        if ($db->errno) {
            echo '<style>body{white-space: pre-line;}</style>';
            throw new \Exception(
                "\nFallo al consultar la base de datos\n" .
                "Errno: $db->errno\n" .
                "Error: $db->error\n" .
                "Query: $query\n"
            );
        }

        return $result;
    }

    /**
     * Reinicia la configuración de la sentencia SQL.
     */
    protected static function resetQuery() {
        static::$querySelect = [
            'select'              => ['*'],
            'where'               => '',
            'from'                => '',
            'leftJoin'            => '',
            'rightJoin'           => '',
            'innerJoin'           => '',
            'AndOr'               => '',
            'orderBy'             => '',
            'groupBy'             => '',
            'limit'               => '',
            'sql_calc_found_rows' => false
        ];
    }

    /**
     * Construye la sentencia SQL a partir static::$querySelect y una vez
     * construída, llama a resetQuery.
     *
     * @param bool $resetQuery
     *   Indica si el query debe reiniciarse o no (por defecto es true).
     *
     * @return string
     *   Contiene la sentencia SQL.
     */
    protected static function buildQuery(bool $resetQuery = true) : string {
        if (static::$querySelect['sql_calc_found_rows'])
            $sql = 'SELECT SQL_CALC_FOUND_ROWS '.join(', ', static::$querySelect['select']);
        else
            $sql = 'SELECT '.join(', ', static::$querySelect['select']);

        if (static::$querySelect['from'] != '') {
            $sql .= ' FROM '.static::$querySelect['from'];
        } else {
            $sql .= ' FROM '.static::table();
        }

        if(static::$querySelect['innerJoin'] != '') {
            $sql .= static::$querySelect['innerJoin'];
        }

        if (static::$querySelect['leftJoin'] != '') {
            $sql .= static::$querySelect['leftJoin'];
        }

        if(static::$querySelect['rightJoin'] != '') {
            $sql .= static::$querySelect['rightJoin'];
        }

        if (static::$querySelect['where'] != '') {
            $sql .= ' WHERE '.static::$querySelect['where'];

            if (static::$querySelect['AndOr'] != '') {
                $sql .= static::$querySelect['AndOr'];
            }
        }

        if (static::$querySelect['groupBy'] != '') {
            $sql .= ' GROUP BY '.static::$querySelect['groupBy'];
        }

        if (static::$querySelect['orderBy'] != '') {
            $sql .= ' ORDER BY '.static::$querySelect['orderBy'];
        }

        if (static::$querySelect['limit'] != '') {
            $sql .= ' LIMIT '.static::$querySelect['limit'];
        }

        if ($resetQuery)
            static::resetQuery();

        return $sql;
    }

    /**
     * Crea una instancia del objeto actual a partir de un arreglo.
     *
     * @param mixed $elem
     *   Puede recibir un arreglo o un objeto que contiene los valores
     *   que tendrán sus atributos.
     *
     * @return ModelMySQL
     *   Retorna un objeto de la clase actual.
     */
    protected static function getInstance(array $elem = []) : ModelMySQL {
        $class = get_called_class();
        $instance = new $class;

        foreach ($elem as $key => $value) {
            $instance->$key = $value;
        }

        return $instance;
    }

    /**
     * Devuelve los atributos a guardar de la clase actual.
     * Los atributos serán aquellos que sean public y
     * no esten excluidos en static::$ignoresave y aquellos
     * que sean private o protected pero estén en static::$forceSave.
     *
     * @return array
     *   Contiene los atributos indexados del objeto actual.
     */
    protected function getVars() : array {
        $reflection = new \ReflectionClass($this);
        $properties = $reflection->getProperties(\ReflectionProperty::IS_PUBLIC);
        $result = [];

        foreach($properties as $property) {
            $att = $property->name;
            $result[$att] = isset($this->$att)
                          ? $this->$att : null;
        }

        foreach (static::$ignoreSave as $del) {
            unset($result[$del]);
        }

        foreach (static::$forceSave as $value) {
            $result[$value] = isset($this->$value)
                            ? $this->$value: null;
        }

        return $result;
    }

    /**
     * Devuelve el nombre de la clase actual aunque sea una clase extendida.
     *
     * @return string
     *   Devuelve el nombre de la clase actual.
     */
    public static function className() : string {
        return strtolower(substr(strrchr(get_called_class(), '\\'), 1));
    }

    /**
     * Construye (a partir del nombre de la clase y el sufijo en static::$tableSufix)
     * y/o develve el nombre de la tabla de la BD en la que se alojará o
     * se aloja el objeto actual.
     *
     * @return string
     */
    protected static function table() : string {
        if (isset(static::$table))
            return static::$table;
        return static::className().static::$tableSufix;
    }

    /**
     * Actualiza los valores en la BD con los valores del objeto actual.
     */
    protected function update() {
        $atts = $this->getVars();

        foreach ($atts as $key => $value) {
            if (isset($value)) {
                $value = static::db()->real_escape_string($value);
                if (in_array($key, $this->toNull))
                    $set[]="$key=NULL";
                else
                    $set[]="$key='$value'";
            } else {
                if (in_array($key, $this->toNull))
                    $set[]="$key=NULL";
            }
        }

        $table = static::table();
        $pk = static::$primaryKey;
        $pkv = $this->$pk;
        $sql = "UPDATE $table SET ".join(', ', $set)." WHERE $pk='$pkv'";
        static::query($sql);
    }

    /**
     * Inserta una nueva fila en la base de datos a partir del
     * objeto actual.
     */
    protected function add() {
        $db = static::db();
        $atts = $this->getVars();

        foreach ($atts as $key => $value) {
            if (isset($value)) {
                $into[] = "`$key`";
                $values[] = "'".$db->real_escape_string($value)."'";
            }
        }

        $table = static::table();
        $sql = "INSERT INTO $table (".join(', ', $into).") VALUES (".join(', ', $values).")";
        static::query($sql);

        $pk = static::$primaryKey;
        $this->$pk = $db->insert_id;
    }

    /**
     * Revisa si el objeto a guardar es nuevo o no y según el resultado
     * llama a update para actualizar o add para insertar una nueva fila.
     */
    public function save() {
        $pk = static::$primaryKey;
        if (isset($this->$pk))
            $this->update();
        else
            $this->add();
    }

    /**
     * Elimina el objeto actual de la base de datos.
     */
    public function delete() {
        $atts = $this->getVars();

        foreach ($atts as $key => $value) {
            $value = static::db()->real_escape_string($value);
            $set[]="$key='$value'";
        }

        $table = static::table();
        $pk = static::$primaryKey;
        $pkv = $this->$pk;
        $sql = "DELETE FROM $table WHERE $pk='$pkv'";
        static::query($sql);
    }

    /**
     * Define SELECT en la sentencia SQL.
     *
     * @param array $columns
     *   Columnas que se selecionarán en la consulta SQL.
     *
     * @return ModelMySQL
     */
    public static function select(array $columns) : ModelMySQL {
        $db = static::db();
        $select = [];
        foreach($columns as $column) {
            $select[] = $db->real_escape_string($column);
        }

        static::$querySelect['select'] = $select;

        return new static();
    }

    /**
     * Define FROM en la sentencia SQL.
     *
     * @param array $tables
     *   Tablas que se selecionarán en la consulta SQL.
     *
     * @return ModelMySQL
     */
    public static function from(array $tables) : ModelMySQL {
        $db = static::db();
        $from = [];
        foreach($tables as $table) {
            $from[] = $db->real_escape_string($table);
        }

        static::$querySelect['from'] = join(', ', $from);

        return new static();
    }

    /**
     * Define el WHERE en la sentencia SQL.
     *
     * @param string $column
     *   La columna a comparar.
     *
     * @param string $operatorOrValue
     *   El operador o el valor a comparar como igual en caso de que $value no se defina.
     *
     * @param string $value
     *   (opcional) El valor a comparar en la columna.
     *
     * @param bool $no_quote
     *   (opcional) Se usa cuando $value es una columna o un valor que no requiere comillas.
     *
     * @return ModelMySQL
     */
    public static function where(string $column, string $operatorOrValue, string $value=null, bool $no_quote = false) : ModelMySQL {
        if (is_null($value)) {
            $value = $operatorOrValue;
            $operatorOrValue = '=';
        }

        $value = static::db()->real_escape_string($value);

        if ($no_quote)
            static::$querySelect['where'] = "$column$operatorOrValue$value";
        else
            static::$querySelect['where'] = "$column$operatorOrValue'$value'";

        return new static();
    }

    /**
     * Define WHERE usando IN en la sentencia SQL.
     *
     * @param string $column
     *   La columna a comparar.
     *
     * @param array $arr
     *   Arreglo con todos los valores a comparar con la columna.
     *
     * @param bool $in
     *   Define si se tienen que comprobar negativa o positivamente.
     *
     * @return ModelMySQL
     */
    public static function where_in(string $column, array $arr, bool $in = true) : ModelMySQL {
        foreach($arr as $index => $value) {
            $arr[$index] = static::db()->real_escape_string($value);
        }

        if ($in)
            static::$querySelect['where'] = "$column IN (".join(', ',$arr).")";
        else
            static::$querySelect['where'] = "$column NOT IN (".join(', ',$arr).")";

        return new static();
    }

    /**
     * Define LEFT JOIN en la sentencia SQL.
     *
     * @param string $table
     *   Tabla que se va a juntar a la del objeto actual.
     *
     * @param string $columnA
     *   Columna a comparar para hacer el join.
     *
     * @param string $operatorOrColumnB
     *   Operador o columna a comparar como igual para hacer el join en caso de que $columnB no se defina.
     *
     * @param string $columnB
     *   (opcional) Columna a comparar para hacer el join.
     *
     * @return ModelMySQL
     */
    public static function leftJoin(string $table, string $columnA, string $operatorOrColumnB, string $columnB = null) : ModelMySQL {
        if (is_null($columnB)) {
            $columnB = $operatorOrColumnB;
            $operatorOrColumnB = '=';
        }

        $columnA = static::db()->real_escape_string($columnA);
        $columnB = static::db()->real_escape_string($columnB);

        static::$querySelect['leftJoin'] .= ' LEFT JOIN ' . $table . ' ON ' . "$columnA$operatorOrColumnB$columnB";


        return new static();
    }

    /**
     * Define RIGHT JOIN en la sentencia SQL.
     *
     * @param string $table
     *   Tabla que se va a juntar a la del objeto actual.
     *
     * @param string $columnA
     *   Columna a comparar para hacer el join.
     *
     * @param string $operatorOrColumnB
     *   Operador o columna a comparar como igual para hacer el join en caso de que $columnB no se defina.
     *
     * @param string $columnB
     *   (opcional) Columna a comparar para hacer el join.
     *
     * @return ModelMySQL
     */
    public static function rightJoin(string $table, string $columnA, string $operatorOrColumnB, string $columnB = null) : ModelMySQL {
        if (is_null($columnB)) {
            $columnB = $operatorOrColumnB;
            $operatorOrColumnB = '=';
        }

        $columnA = static::db()->real_escape_string($columnA);
        $columnB = static::db()->real_escape_string($columnB);

        static::$querySelect['rightJoin'] .= ' RIGHT JOIN ' . $table . ' ON ' . "$columnA$operatorOrColumnB$columnB";

        return new static();
    }

    /**
     * Define INNER JOIN en la sentencia SQL.
     *
     * @param string $table
     *   Tabla que se va a juntar a la del objeto actual.
     *
     * @param string $columnA
     *   Columna a comparar para hacer el join.
     *
     * @param string $operatorOrColumnB
     *   Operador o columna a comparar como igual para hacer el join en caso de que $columnB no se defina.
     *
     * @param string $columnB
     *   (opcional) Columna a comparar para hacer el join.
     *
     * @return ModelMySQL
     */
    public static function innerJoin(string $table, string $columnA, string $operatorOrColumnB, string $columnB = null) : ModelMySQL {
        if (is_null($columnB)) {
            $columnB = $operatorOrColumnB;
            $operatorOrColumnB = '=';
        }

        $columnA = static::db()->real_escape_string($columnA);
        $columnB = static::db()->real_escape_string($columnB);

        static::$querySelect['innerJoin'] .= ' INNER JOIN ' . $table . ' ON ' . "$columnA$operatorOrColumnB$columnB";

        return new static();
    }

    /**
     * Define AND en la sentencia SQL (se puede anidar).
     *
     * @param string $column
     *   La columna a comparar.
     *
     * @param string $operatorOrValue
     *   El operador o el valor a comparar como igual en caso de que $value no se defina.
     *
     * @param string $value
     *   (opcional) El valor el valor a comparar en la columna.
     *
     * @param bool $no_quote
     *   (opcional) Se usa cuando $value es una columna o un valor que no requiere comillas.
     *
     * @return ModelMySQL
     */
    public static function and(string $column, string $operatorOrValue, string $value=null, bool $no_quote = false) : ModelMySQL {
        if (is_null($value)) {
            $value = $operatorOrValue;
            $operatorOrValue = '=';
        }

        $value = static::db()->real_escape_string($value);

        if ($no_quote)
            static::$querySelect['AndOr'] .= " AND $column$operatorOrValue$value";
        else
            static::$querySelect['AndOr'] .= " AND $column$operatorOrValue'$value'";

        return new static();
    }

    /**
     * Define OR en la sentencia SQL (se puede anidar).
     *
     * @param string $column
     *   La columna a comparar.
     *
     * @param string $operatorOrValue
     *   El operador o el valor a comparar como igual en caso de que $value no se defina.
     *
     * @param string $value
     *   (opcional) El valor el valor a comparar en la columna.
     *
     * @param bool $no_quote
     *   (opcional) Se usa cuando $value es una columna o un valor que no requiere comillas.
     *
     * @return ModelMySQL
     */
    public static function or(string $column, string $operatorOrValue, string $value=null, bool $no_quote = false) : ModelMySQL {
        if (is_null($value)) {
            $value = $operatorOrValue;
            $operatorOrValue = '=';
        }

        $value = static::db()->real_escape_string($value);

        if ($no_quote)
            static::$querySelect['AndOr'] .= " OR $column$operatorOrValue$value";
        else
            static::$querySelect['AndOr'] .= " OR $column$operatorOrValue'$value'";

        return new static();
    }

    /**
     * Define GROUP BY en la sentencia SQL.
     *
     * @param array $arr
     *   Columnas por las que se agrupará.
     *
     * @return ModelMySQL
     */
    public static function groupBy(array $arr) : ModelMySQL {
        static::$querySelect['groupBy'] = join(', ', $arr);
        return new static();
    }

    /**
     * Define LIMIT en la sentencia SQL.
     *
     * @param int $initial
     * @param int $final
     *
     * @return ModelMySQL
     */
    public static function limit(int $initial, int $final = 0) : ModelMySQL {
        if ($final==0)
            static::$querySelect['limit'] = $initial;
        else
            static::$querySelect['limit'] = $initial.', '.$final;

        return new static();
    }

    /**
     * Define ORDER BY en la sentencia SQL.
     *
     * @param string $value
     *   Columna por la que se ordenará.
     *
     * @param string $order
     *   (opcional) Define si el orden será de manera ascendente (ASC),
     *   descendente (DESC) o aleatorio (RAND).
     *
     * @return ModelMySQL
     */
    public static function orderBy(string $value, string $order = 'ASC') : ModelMySQL {
        if ($value == "RAND") {
            static::$querySelect['orderBy'] = 'RAND()';
            return new static();
        }

        $value = static::db()->real_escape_string($value);

        if (!(strtoupper($order) == 'ASC' || strtoupper($order) == 'DESC'))
            $order = 'ASC';

        static::$querySelect['orderBy'] = $value.' '.$order;

        return new static();
    }

    /**
     * Retorna la cantidad de filas que hay en un query.
     *
     * @param bool $resetQuery
     *   (opcional) Indica si el query debe reiniciarse o no (por defecto es true).
     *
     * @param bool $useLimit
     *   (opcional) Permite usar limit para establecer un máximo inical y final para contar. Requiere que se haya definido antes el límite (por defecto en false).
     *
     * @return int
     */
    public static function count(bool $resetQuery = true, bool $useLimit = false) : int {
        if (!$resetQuery)
            $backup = [
                'select'              => static::$querySelect['select'],
                'sql_calc_found_rows' => static::$querySelect['sql_calc_found_rows'],
                'limit'               => static::$querySelect['limit'],
                'orderBy'             => static::$querySelect['orderBy']
            ];

        if ($useLimit && static::$querySelect['limit'] != '') {
            static::$querySelect['select']              = ['1'];
            static::$querySelect['sql_calc_found_rows'] = false;
            static::$querySelect['orderBy']             = '';

            $sql         = 'SELECT COUNT(1) AS quantity FROM ('.static::buildQuery($resetQuery).') AS counted';
            $queryResult = static::query($sql)->fetch_assoc();
            $result      = $queryResult['quantity'];
        } else {
            static::$querySelect['select']              = ['1'];
            static::$querySelect['sql_calc_found_rows'] = true;
            static::$querySelect['limit']               = '1';
            static::$querySelect['orderBy']             = '';

            $sql = static::buildQuery($resetQuery);
            static::query($sql);
            $result = static::found_row();
        }

        if (!$resetQuery) {
            static::$querySelect['select']              = $backup['select'];
            static::$querySelect['sql_calc_found_rows'] = $backup['sql_calc_found_rows'];
            static::$querySelect['limit']               = $backup['limit'];
            static::$querySelect['orderBy']             = $backup['orderBy'];
        }

        return $result;
    }

    /**
     * Retorna las filas contadas en el último query.
     *
     * @return int
     */
    public static function found_row() : int {
        $result = static::query('SELECT FOUND_ROWS() AS quantity')->fetch_assoc();
        return $result['quantity'];
    }

    /**
     * Habilita el conteo de todos las coincidencias posibles incluso usando limit.
     *
     * @return ModelMySQL
     */
    public static function sql_calc_found_rows() : ModelMySQL {
        static::$querySelect['sql_calc_found_rows'] = true;
        return new static();
    }

    /**
     * Obtiene una instancia según su primary key (generalmente id).
     * Si no encuentra una instancia, devuelve nulo.
     *
     * @param mixed $id
     * @return mixed
     */
    public static function getById($id) {
        return static::where(static::$primaryKey, $id)->getFirst();
    }

    /**
     * Realiza una búsqueda en la tabla de la instancia actual.
     *
     * @param string $search
     *   Contenido a buscar.
     *
     * @param array $in
     *   (opcional) Columnas en las que se va a buscar (null para buscar en todas).
     *
     * @return ModelMySQL
     */
    public static function search(string $search, array $in = null) : ModelMySQL {
        if ($in == null) {
            $className = get_called_class();
            $in = array_keys((new $className())->getVars());
        }

        $db = static::db();

        $search = $db->real_escape_string($search);

        $where = [];

        foreach($in as $row) {
            $where[] = "$row LIKE '%$search%'";
        }

        if (static::$querySelect['where']=='')
            static::$querySelect['where'] = join(' OR ', $where);
        else
            static::$querySelect['where'] = static::$querySelect['where'] .' AND ('.join(' OR ', $where).')';

        return new static();
    }

    /**
     * Obtener los resultados de la consulta SQL.
     *
     * @param bool $resetQuery
     *   (opcional) Indica si el query debe reiniciarse o no (por defecto es true).
     *
     * @return array
     *   Contiene un arreglo de instancias de la clase actual.
     */
    public static function get(bool $resetQuery = true) : array { // Devuelve array vacío si no encuentra nada.
        $sql = static::buildQuery($resetQuery);
        $result = static::query($sql);

        $instances = [];

        while ($row = $result->fetch_assoc()) {
            $instances[] = static::getInstance($row);
        }

        return $instances;
    }

    /**
     * El primer elemento de la consulta SQL.
     *
     * @param bool $resetQuery
     *   (opcional) Indica si el query debe reiniciarse o no (por defecto es true).
     *
     * @return mixed
     *   Puede retornar un objeto ModelMySQL o null.
     */
    public static function getFirst(bool $resetQuery = true) { // Devuelve null si no encuentra nada.
        static::limit(1);
        $instances = static::get($resetQuery);
        return empty($instances) ? null : $instances[0];
    }

    /**
     * Obtener todos los elementos del la tabla de la instancia actual.
     *
     * @return array
     *   Contiene un arreglo de instancias de la clase actual.
     */
    public static function all() : array {
        $sql = 'SELECT * FROM '.static::table();

        $result = static::query($sql);

        $instances = [];

        while ($row = $result->fetch_assoc()) {
            $instances[] = static::getInstance($row);
        }

        return $instances;
    }

    /**
     * Permite definir como nulo el valor de un atributo.
     * Sólo funciona para actualizar un elemento de la BD, no para insertar.
     *
     * @trows \Exception
     *   Devolverá un error en caso de usarse en un insert.
     *
     * @param array $atts
     */
    public function setNull(array $atts) {
        if (!isset($this->id))
            throw new \Exception(
                "\nEl método setNull sólo funciona para actualizar, no al insertar."
            );

        foreach ($atts as $att) {
            if (!in_array($att, $this->toNull))
                $this->toNull[] = $att;
        }
    }
}
?>
