<?php

require_once("../database/Database.php");

class Table {

    static public $database;

    static public function save($query) {
        try {
            self::$database->exec($query);
        } catch (\Throwable $th) {
            echo "ocurrió un problema al realizar el registro: <br>" . $th->getMessage();
            exit;
        }
    }


    static public function find($query) {
        try {
            $sentence = self::$database->prepare($query);
            $sentence->execute();
            return $sentence->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            echo "ocurrió un error al solicitar información de la base de datos: " . $th->getMessage();
            exit;
        }
    }

    static public function findLastId() {
        $lastId = self::$database->lastInsertId();
        return $lastId;
    }
}

Table::$database = Database::connect();

//PHP no permite tener propiedades estáticas inicializadas al momento de la creación de la clase, por esa razón, después de creada la clase,
// esta propiedad debe cambiar su valor
