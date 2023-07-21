<?php

require_once("Table.model.php");
require_once("../database/database.php");

class Note extends Table {
    private $titulo;
    private $descripcion;

    function __construct($row) {
        $this->titulo = $row["titulo"];
        $this->descripcion = $row["descripcion"];
    }

    static public function find($query){
        $notas = parent::find($query);
        $notasConvertidas = [];

        foreach ($notas as $nota) {
            $notasConvertidas[] = new Note($nota);
        }

        return $notasConvertidas;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
}
