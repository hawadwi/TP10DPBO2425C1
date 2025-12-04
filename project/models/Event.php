<?php
require_once "config/Database.php";

class Event
{
    private $conn;
    private $table = "event";

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

    public function getAllWithCategory()
    {
        $query = "SELECT e.*, k.nama_kategori 
                  FROM event e 
                  LEFT JOIN kategori_event k 
                  ON e.id_kategori = k.id_kategori";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_event)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_event = :id_event";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_event', $id_event);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($id_kategori, $nama_event, $tanggal_event, $lokasi, $harga)
    {
        $query = "INSERT INTO " . $this->table . "
                  (id_kategori, nama_event, tanggal_event, lokasi, harga)
                  VALUES (:id_kategori, :nama_event, :tanggal_event, :lokasi, :harga)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_kategori', $id_kategori);
        $stmt->bindParam(':nama_event', $nama_event);
        $stmt->bindParam(':tanggal_event', $tanggal_event);
        $stmt->bindParam(':lokasi', $lokasi);
        $stmt->bindParam(':harga', $harga);

        return $stmt->execute();
    }

    public function update($id_event, $id_kategori, $nama_event, $tanggal_event, $lokasi, $harga)
    {
        $query = "UPDATE " . $this->table . "
                  SET id_kategori = :id_kategori,
                      nama_event = :nama_event,
                      tanggal_event = :tanggal_event,
                      lokasi = :lokasi,
                      harga = :harga
                  WHERE id_event = :id_event";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_event', $id_event);
        $stmt->bindParam(':id_kategori', $id_kategori);
        $stmt->bindParam(':nama_event', $nama_event);
        $stmt->bindParam(':tanggal_event', $tanggal_event);
        $stmt->bindParam(':lokasi', $lokasi);
        $stmt->bindParam(':harga', $harga);

        return $stmt->execute();
    }

    public function delete($id_event)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_event = :id_event";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_event', $id_event);
        return $stmt->execute();
    }
}
?>