<?php


class Database {
    static private $driver = 'mysql';
    static private $host = 'localhost';
    static private $db_name = 'phpcurso';
    static private $usuario = 'root';
    static private $password = '';

    public static function connect() {
        try {
            $connectionString = self::$driver . ":host=" . self::$host . ";dbname=" . self::$db_name;
            $connection = new PDO($connectionString, self::$usuario, self::$password);
            return $connection;
        } catch (\Throwable $th) {
            echo "Ha ocurrido un error al conectar la base de datos";
            return null;
        }
    }
}