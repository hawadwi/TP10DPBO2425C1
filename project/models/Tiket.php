<?php
require_once "config/Database.php";

class Tiket
{
    private $conn;
    private $table = "tiket";

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

    public function getAllWithDetail()
    {
        $query = "SELECT 
                    t.*, 
                    u.nama AS nama_user,
                    u.email AS email_user,
                    e.nama_event AS nama_event,
                    e.tanggal_event AS tanggal_event,
                    e.lokasi AS lokasi_event
                  FROM tiket t
                  LEFT JOIN user u ON t.id_user = u.id_user
                  LEFT JOIN event e ON t.id_event = e.id_event";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_tiket)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_tiket = :id_tiket";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_tiket', $id_tiket);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($id_user, $id_event, $tanggal_beli, $status)
    {
        $query = "INSERT INTO " . $this->table . "
                  (id_user, id_event, tanggal_beli, status)
                  VALUES (:id_user, :id_event, :tanggal_beli, :status)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':id_event', $id_event);
        $stmt->bindParam(':tanggal_beli', $tanggal_beli);
        $stmt->bindParam(':status', $status);

        return $stmt->execute();
    }

    public function update($id_tiket, $id_user, $id_event, $tanggal_beli, $status)
    {
        $query = "UPDATE " . $this->table . "
                  SET id_user = :id_user,
                      id_event = :id_event,
                      tanggal_beli = :tanggal_beli,
                      status = :status
                  WHERE id_tiket = :id_tiket";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id_tiket', $id_tiket);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':id_event', $id_event);
        $stmt->bindParam(':tanggal_beli', $tanggal_beli);
        $stmt->bindParam(':status', $status);

        return $stmt->execute();
    }

    public function delete($id_tiket)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_tiket = :id_tiket";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_tiket', $id_tiket);
        return $stmt->execute();
    }
}
?>