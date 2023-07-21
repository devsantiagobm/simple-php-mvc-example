<?php 


require_once("../utilities/rutaNoProtegida.php");


class SignUp extends RutaNoProtegida{
    function __construct(){
        parent::__construct();
        require_once("../views/signup.view.php");
    }
}


new SignUp();