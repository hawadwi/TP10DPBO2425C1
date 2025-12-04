<?php
require_once __DIR__ . '/../models/Event.php';
require_once __DIR__ . '/../models/Kategori_event.php';

class EventViewModel
{
    private $event;
    private $kategori;
    
    public function __construct()
    {
        $this->event = new Event();
        $this->kategori= new Kategori_event();
    }

    public function getEventList()
    {
        return $this->event->getAllWithCategory();
    }

    public function getEventById($id_event)
    {
        return $this->event->getById($id_event);
    }

    public function addEvent($id_kategori, $nama_event, $tanggal_event, $lokasi, $harga)
    {
        return $this->event->create($id_kategori, $nama_event, $tanggal_event, $lokasi, $harga);
    }

    public function updateEvent($id_event, $id_kategori, $nama_event, $tanggal_event, $lokasi, $harga)
    {
        return $this->event->update($id_event, $id_kategori, $nama_event, $tanggal_event, $lokasi, $harga);
    }

    public function deleteEvent($id_event)
    {
        return $this->event->delete($id_event);
    }
}
?>