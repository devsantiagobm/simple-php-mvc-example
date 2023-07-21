<?php
require_once("../utilities/rutaProtegida.php");
require_once("../models/Note.model.php");


class Home extends RutaProtegida {
    function __construct() {
        parent::__construct();
        
        $notas = $this->getNotes();

        require_once("../views/home.view.php");
    }

    public function getNotes() {
        require_once("../utilities/helpers.php");
        $helpers->startSession();

        $idUser = $_SESSION["user-id"];
        return Note::find("SELECT * FROM notas WHERE id_usuario = '$idUser'");
    }
}

new Home();
