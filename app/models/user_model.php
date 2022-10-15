<?php
class userModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=reviews;charset=utf8', 'root', '');
    }

    public function getUserByEmail($email) {
        $query = $this->db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $query->execute([$email]);
        $usuario = $query->fetchAll(PDO::FETCH_OBJ);

        return $usuario;
    }


}