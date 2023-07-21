<?php


class RutaNoProtegida {
    function __construct() {
        session_start();

        if (isset($_SESSION["email"])) {
            header("Location: ./index.php");
        }
    }
}
