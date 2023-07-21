<?php

require_once("../utilities/rutaProtegida.php");


class CrearNota extends RutaProtegida {
    function __construct() {
        parent::__construct();

        require_once("../views/crear_nota.view.php");
    }
}


new CrearNota();