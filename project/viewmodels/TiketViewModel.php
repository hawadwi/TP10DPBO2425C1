<?php
require_once 'models/Tiket.php';

class TiketViewModel
{
    private $tiket;

    public function __construct()
    {
        $this->tiket = new Tiket();
    }

    public function getTiketList()
    {
        return $this->tiket->getAll();
    }

    public function getTiketListWithDetail()
    {
        return $this->tiket->getAllWithDetail();
    }

    public function getTiketById($id_tiket)
    {
        return $this->tiket->getById($id_tiket);
    }

    public function addTiket($id_user, $id_event, $tanggal_beli, $status)
    {
        return $this->tiket->create($id_user, $id_event, $tanggal_beli, $status);
    }

    public function updateTiket($id_tiket, $id_user, $id_event, $tanggal_beli, $status)
    {
        return $this->tiket->update($id_tiket, $id_user, $id_event, $tanggal_beli, $status);
    }

    public function deleteTiket($id_tiket)
    {
        return $this->tiket->delete($id_tiket);
    }
}
?>