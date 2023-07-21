<?php
require_once("../database/database.php");
require_once("../models/User.model.php");
require_once("../models/Note.model.php");


class HandlerRequests {
    private $helpers;

    function __construct() {
        extract($_POST);
        $this->requires();
        
        
        $this->helpers->validatePostIsNotEmpty();
        $this->helpers->validateTypeIsNotEmpty();


        if ($type == "login") {
            $this->login();
        } else if ($type == "signup") {
            $this->signUp();
        } else if($type == "note"){
            $this -> createNote();
        }
    }

    public function createNote(){
        extract($_POST);
        $this->helpers->validarCamposNote();
        $this->helpers->startSession();

        $userId = $_SESSION['user-id'];
        Note::save("INSERT INTO notas (titulo, descripcion, id_usuario) VALUES ('$titulo', '$descripcion', $userId)");

        header("location: ../controllers/index.php");
    }

    public function login() {
        extract($_POST);
        $this->helpers->validarCamposLogin();

        $user = User::findByEmailAndPassword($email, $password);
        if ($user == null) $this->helpers->goBack("error=user-not-found");


        $this->helpers->crearSesión(["email" => $email, "username" => $user["nombre"], "user-id" => $user["id_usuario"]]);
        header("Location: ../controllers/index.php");
    }


    public function requires() {
        require_once("helpers.php");

        $this->helpers = $helpers;
    }

    public function signUp() {
        try {
            extract($_POST);
            $this->helpers->validarCamposSignUp();

            $user = User::findByEmail($email);
            
            
            if (isset($user)) {
                header("Location: ../controllers/signup.php?error=user-already-exist");
                exit;
            }
            
            
            
            User::save("INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')");
            
            $userId = User::findLastId();
            $this->helpers->crearSesión(["email" => $email, "username" => $nombre, "user-id" => $userId]);
            header("Location: ../controllers/index.php");
        } catch (\Throwable $th) {
            header("Location: ../controllers/signup.php?error=" . $th->getCode());
        }
    }
}


new HandlerRequests();
