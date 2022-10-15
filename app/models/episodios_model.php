<?php
class episodioModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=reviews;charset=utf8', 'root', '');
    }

    public function getEpisodios($serie) {
        $db = new PDO('mysql:host=localhost;'.'dbname=reviews;charset=utf8', 'root', '');

        $query = $db->prepare("SELECT * FROM episodios WHERE Serie = '$serie'");
        $query->execute();

        $episodios = $query->fetchAll(PDO::FETCH_OBJ);

        return $episodios;
    }

    public function insertEpisodio($titulo, $duracion, $temporada, $descripcion, $puntuacion, $serie) {
        $query = $this->db->prepare("INSERT INTO episodios(Titulo, Duracion, Temporada, Descripcion, Puntuacion, Serie) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$titulo, $duracion, $temporada, $descripcion, $puntuacion, $serie]);
    }

    public function deleteEpisodio($episodio) {
        $query = $this->db->prepare('DELETE FROM episodios WHERE Titulo = ?');
        $query->execute([$episodio]);
    }

    public function deleteTodosEpisodios($serie) {
        $query = $this->db->prepare('DELETE FROM episodios WHERE Serie = ?');
        $query->execute([$serie]);
    }

    public function getEpisodio($tituloEpisodio) {
        $query = $this->db->prepare("SELECT * FROM episodios WHERE Titulo = '$tituloEpisodio'");
        $query->execute();

        $episodio = $query->fetchAll(PDO::FETCH_OBJ);
        return $episodio;
    }

    public function getEpisodioById($id) {
        $query = $this->db->prepare("SELECT * FROM episodios WHERE ID_episodio = '$id'");
        $query->execute();

        $episodio = $query->fetchAll(PDO::FETCH_OBJ);
        return $episodio;
    }

    public function editEpisodio($titulo,$duracion,$temporada,$descripcion,$puntuacion,$id) {
        if(!empty($titulo)) {
            $query = $this->db->prepare('UPDATE episodios SET Titulo = ? WHERE ID_episodio = ?');
            $query->execute([$titulo,$id]);
        }

        if(!empty($duracion)) {
            $query = $this->db->prepare('UPDATE episodios SET Duracion = ? WHERE ID_episodio = ?');
            $query->execute([$duracion,$id]);
        }

        if(!empty($temporada)) {
            $query = $this->db->prepare('UPDATE episodios SET Temporada = ? WHERE ID_episodio = ?');
            $query->execute([$temporada,$id]);
        }

        if(!empty($descripcion)) {
            $query = $this->db->prepare('UPDATE episodios SET Descripcion = ? WHERE ID_episodio = ?');
            $query->execute([$descripcion,$id]);
        }

        if(!empty($puntuacion)) {
            $query = $this->db->prepare('UPDATE episodios SET Puntuacion = ? WHERE ID_episodio = ?');
            $query->execute([$puntuacion,$id]);
        }

    }

}