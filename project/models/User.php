<?php
require_once "config/Database.php";

class User
{
    private $conn;
    private $table = "user";

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

    public function getById($id_user)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_user = :id_user";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_user',  $id_user);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama, $email)
    {
        $query = "INSERT INTO " . $this->table . " (nama, email) VALUES (:nama, :email)";
        $stmt = $this->conn->prepare($query);
        // Bind parameters
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    public function update($id_user, $nama, $email)
    {
        $query = "UPDATE " . $this->table . " SET nama = :nama, email = :email WHERE id_user = :id_user";
        $stmt = $this->conn->prepare($query);
        // Bind parameters
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    public function delete($id_user)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_user = :id_user";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_user', $id_user);
        return $stmt->execute();
    }
}
