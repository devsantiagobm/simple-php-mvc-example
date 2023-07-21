<?php



class RutaProtegida {
    function __construct() {
        session_start();
        
        if(empty($_SESSION)){
            header("location: login.php");
        }
    }
}
