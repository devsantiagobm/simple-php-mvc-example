<?php 


require_once("../utilities/rutaNoProtegida.php");


class Login extends RutaNoProtegida{
    function __construct(){
        parent::__construct();
        
        require_once("../views/login.view.php");
    }
}


new Login();