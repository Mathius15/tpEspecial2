<?php
class serieModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=reviews;charset=utf8', 'root', '');
    }

    public function getSeries($sort = null) {
        $db = new PDO('mysql:host=localhost;'.'dbname=reviews;charset=utf8', 'root', '');

        if($sort === "ASC") {
            $query = $db->prepare("SELECT * FROM series ORDER BY Nombre ASC");
            var_dump($sort);
            $query->execute();
        } elseif($sort === "DESC"){
            $query = $db->prepare("SELECT * FROM series ORDER BY Nombre DESC");
            var_dump($sort);
            $query->execute();
        } else {
            $query = $db->prepare("SELECT * FROM series");
            $query->execute();
        }

        $series = $query->fetchAll(PDO::FETCH_OBJ);

        return $series;
    }

    public function getSerie($serie) {
        $db = new PDO('mysql:host=localhost;'.'dbname=reviews;charset=utf8', 'root', '');

        $query = $db->prepare("SELECT * FROM series WHERE Nombre = ?");
        $query->execute([$serie]);
        $serie = $query->fetchAll(PDO::FETCH_OBJ);

        return $serie;
    }

    public function getSerieCampo($campo) {
        $db = new PDO('mysql:host=localhost;'.'dbname=reviews;charset=utf8', 'root', '');

        $query = $db->prepare("SELECT $campo FROM series");
        $query->execute();
        $serie = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $serie;
    }

    private function uploadImage($image){
        $target = "img/serie/" . uniqid() . "." . strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));  
        move_uploaded_file($image['tmp_name'], $target);
        return $target;
    }

    public function insertSerie($nombre, $descripcion, $puntuacion, $creadores, $genero, $imagen = null) {
        if($imagen != null) {
            $pathImg = $this->uploadImage($imagen);
            $query = $this->db->prepare("INSERT INTO series (Nombre, Descripcion, Puntuacion, Creadores, Genero, img) VALUES (?, ?, ?, ?, ?, ?)");
            $query->execute([$nombre,$descripcion, $puntuacion, $creadores, $genero, $pathImg]);
        } else {
            $query = $this->db->prepare("INSERT INTO series (Nombre, Descripcion, Puntuacion, Creadores, Genero) VALUES (?, ?, ?, ?, ?)");
            $query->execute([$nombre,$descripcion, $puntuacion, $creadores, $genero]);
        }
    }

    public function deleteSerie($serie) {
        $this->deleteTodosEpisodios($serie);
        $query = $this->db->prepare('DELETE FROM series WHERE Nombre = ?');
        $query->execute([$serie]);
    }

    public function deleteTodosEpisodios($serie) {
        $query = $this->db->prepare('DELETE FROM episodios WHERE Serie = ?');
        $query->execute([$serie]);
    }

    public function editSerie($nombre = null, $descripcion= null, $puntuacion= null, $creadores= null, $genero= null, $serie, $imagen= null) {

        if(!empty($nombre)) {
            $this->deleteTodosEpisodios($serie);
            $query = $this->db->prepare('UPDATE series SET Nombre = ? WHERE Nombre = ?');
            $query->execute([$nombre,$serie]);
        }

        if(!empty($descripcion)) {
            $query = $this->db->prepare('UPDATE series SET Descripcion = ? WHERE Nombre = ?');
            $query->execute([$descripcion,$serie]);
        }

        if(!empty($puntuacion)) {
            $query = $this->db->prepare('UPDATE series SET Puntuacion = ? WHERE Nombre = ?');
            $query->execute([$puntuacion,$serie]);
        }

        if(!empty($creadores)) {
            $query = $this->db->prepare('UPDATE series SET Creadores = ? WHERE Nombre = ?');
            $query->execute([$creadores,$serie]);
        }

        if(!empty($genero)) {
            $query = $this->db->prepare('UPDATE series SET Genero = ? WHERE Nombre = ?');
            $query->execute([$genero,$serie]);
        }

        if($imagen != null) {
            $pathImg = $this->uploadImage($imagen);
            $query = $this->db->prepare('UPDATE series SET img = ? WHERE Nombre = ?');
            $query->execute([$pathImg,$serie]);
        }
    }   

}