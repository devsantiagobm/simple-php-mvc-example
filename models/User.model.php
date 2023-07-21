<?php

require_once("Table.model.php");



class User extends Table {
    private $nombre;
    private $email;
    private $password;

    function __construct($row) {
        $this->nombre = $row["nombre"];
        $this->email = $row["email"];
        $this->password = $row["password"];
    }

    static public function findByEmail($email) {
        try {
            $query = "SELECT * FROM usuarios WHERE email = '$email'";
            $database = Database::connect();
            $consulta = $database->prepare($query);
            $consulta->execute();
            $resultado = $consulta->fetch();

            return empty($resultado) ? null : $resultado;
        } catch (\Throwable $th) {
            return null;
        }
    }

    static public function findByEmailAndPassword($email, $password) {
        try {
            $query = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
            $database = Database::connect();
            $consulta = $database->prepare($query);
            $consulta->execute();
            $resultado = $consulta->fetch();

            return empty($resultado) ? null : $resultado;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }
}
