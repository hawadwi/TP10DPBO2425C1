<?php
require_once "config/Database.php";

class Kategori_event
{
    private $conn;
    private $table = "kategori_event";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_kategori)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_kategori = :id_kategori";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_kategori',  $id_kategori);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama_kategori)
    {
        $query = "INSERT INTO " . $this->table . " (nama_kategori) VALUES (:nama_kategori)";
        $stmt = $this->conn->prepare($query);
        // Bind parameters
        $stmt->bindParam(':nama_kategori', $nama_kategori);
        return $stmt->execute();
    }

    public function update($id_kategori, $nama_kategori)
    {
        $query = "UPDATE " . $this->table . " SET nama_kategori = :nama_kategori WHERE id_kategori = :id_kategori";
        $stmt = $this->conn->prepare($query);
        // Bind parameters
        $stmt->bindParam(':id_kategori', $id_kategori);
        $stmt->bindParam(':nama_kategori', $nama_kategori);   
        return $stmt->execute();
    }

    public function delete($id_kategori)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_kategori = :id_kategori";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_kategori', $id_kategori);
        return $stmt->execute();
    }
}
