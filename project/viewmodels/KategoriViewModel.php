<?php
require_once 'models/Kategori_event.php';

class KategoriViewModel
{
    private $kategori;

    public function __construct()
    {
        $this->kategori = new Kategori_event();
    }

    public function getKategoriList()
    {
        return $this->kategori->getAll();
    }

    public function getKategoriById($id_kategori)
    {
        return $this->kategori->getById($id_kategori);
    }

    public function addKategori($nama_kategori)
    {
        return $this->kategori->create($nama_kategori);
    }

    public function updateKategori($id_kategori, $nama_kategori)
    {
        return $this->kategori->update($id_kategori, $nama_kategori);
    }

    public function deleteKategori($id_kategori)
    {
        return $this->kategori->delete($id_kategori);
    }
}
