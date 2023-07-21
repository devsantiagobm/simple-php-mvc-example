<?php


class Helpers {
    public function validatePostIsNotEmpty() {
        if (empty($_POST)) {
            $this->goBack("error=data-must-be-given");
        }
    }


    public function validarCamposLogin() {
        extract($_POST);

        if (empty($email)) {
            $this->goBack("type-error=email");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->goBack("type-error=email-format");
        } else if (empty($password)) {
            $this->goBack("type-error=password");
        }
    }

    public function validarCamposSignUp() {
        extract($_POST);

        if (empty($email)) {
            $this->goBack("type-error=email");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->goBack("type-error=email-format");
        } else if (empty($nombre)) {
            $this->goBack("type-error=nombre");
        } else if (empty($password)) {
            $this->goBack("type-error=password");
        }
    }

    public function goBack($errorQuery = "") {
        if (isset($_SERVER["HTTP_REFERER"])) {
            $url = explode("?", $_SERVER["HTTP_REFERER"])[0];
            header("Location: " .  $url . "?" . $errorQuery);
        }

        exit;
    }

    public function crearSesión($informacion) {
        $this->startSession();

        foreach ($informacion as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }

    public function startSession() {
        if (empty($_SESSION)) {
            session_start();
        }
    }

    public function validarCamposNote() {
        extract($_POST);

        if (empty($titulo)) {
            $this->goBack("error-type=titulo");
        }
        else if(empty($descripcion)){
            $this->goBack("error-type=descripcion");
        }
    }

    public function validateTypeIsNotEmpty() {
        extract($_POST);

        if (empty($type) || ($type != "login" && $type != "signup" && $type != "note")) {
           $this->goBack("error=type-must-be-given");
        }
    }
}



$helpers = new Helpers();
