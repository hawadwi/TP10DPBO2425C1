<?php
require_once 'viewmodels/UserViewModel.php';
require_once 'viewmodels/EventViewModel.php';
require_once 'viewmodels/KategoriViewModel.php';
require_once 'viewmodels/TiketViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'user';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity === 'user') {
    $userVM = new UserViewModel();

    switch ($action) {
        case 'list':
            $userList = $userVM->getUserList();
            require 'views/user_list.php';
            break;

        case 'add':
            require 'views/user_form.php';
            break;

        case 'edit':
            $id_user = $_GET['id_user'];
            $user = $userVM->getUserById($id_user);
            require 'views/user_form.php';
            break;

        case 'save':
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $userVM->addUser($nama, $email);
            header("Location: index.php?entity=user&action=list");
            break;

        case 'update':
            $id_user = $_GET['id_user'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $userVM->updateUser($id_user, $nama, $email);
            header("Location: index.php?entity=user&action=list");
            break;

        case 'delete':
            $id_user = $_GET['id_user'];
            $userVM->deleteUser($id_user);
            header("Location: index.php?entity=user&action=list");
            break;
    }
}

elseif ($entity === 'event') {
    $eventVM = new EventViewModel();
    $kategoriVM = new KategoriViewModel();

    switch ($action) {
        case 'list':
            $eventList = $eventVM->getEventList();
            require 'views/event_list.php';
            break;

        case 'add':
            $kategoriList = $kategoriVM->getKategoriList();
            require 'views/event_form.php';
            break;

        case 'edit':
            $id_event = $_GET['id_event'];
            $event = $eventVM->getEventById($id_event);
            $kategoriList = $kategoriVM->getKategoriList();
            require 'views/event_form.php';
            break;

        case 'save':
            $eventVM->addEvent(
                $_POST['id_kategori'],
                $_POST['nama_event'],
                $_POST['tanggal_event'],
                $_POST['lokasi'],
                $_POST['harga']
            );
            header("Location: index.php?entity=event&action=list");
            break;

        case 'update':
            $id_event = $_GET['id_event'];
            $eventVM->updateEvent(
                $id_event,
                $_POST['id_kategori'],
                $_POST['nama_event'],
                $_POST['tanggal_event'],
                $_POST['lokasi'],
                $_POST['harga']
            );
            header("Location: index.php?entity=event&action=list");
            break;

        case 'delete':
            $id_event = $_GET['id_event'];
            $eventVM->deleteEvent($id_event);
            header("Location: index.php?entity=event&action=list");
            break;
    }
}

elseif ($entity === 'kategori') {
    $kategoriVM = new KategoriViewModel();

    switch ($action) {
        case 'list':
            $kategoriList = $kategoriVM->getKategoriList();
            require 'views/kategori_list.php';
            break;

        case 'add':
            require 'views/kategori_form.php';
            break;

        case 'edit':
            $id_kategori = $_GET['id_kategori'];
            $kategori = $kategoriVM->getKategoriById($id_kategori);
            require 'views/kategori_form.php';
            break;

        case 'save':
            $kategoriVM->addKategori($_POST['nama_kategori']);
            header("Location: index.php?entity=kategori&action=list");
            break;

        case 'update':
            $id_kategori = $_GET['id_kategori'];
            $kategoriVM->updateKategori($id_kategori, $_POST['nama_kategori']);
            header("Location: index.php?entity=kategori&action=list");
            break;

        case 'delete':
            $id_kategori = $_GET['id_kategori'];
            $kategoriVM->deleteKategori($id_kategori);
            header("Location: index.php?entity=kategori&action=list");
            break;
    }
}

elseif ($entity === 'tiket') {
    $tiketVM = new TiketViewModel();
    $userVM = new UserViewModel();
    $eventVM = new EventViewModel();

    switch ($action) {
        case 'list':
            $tiketList = $tiketVM->getTiketListWithDetail(); // kamu punya method ini
            require 'views/tiket_list.php';
            break;

        case 'add':
            $userList = $userVM->getUserList();
            $eventList = $eventVM->getEventList();
            require 'views/tiket_form.php';
            break;

        case 'edit':
            $id_tiket = $_GET['id_tiket'];
            $tiket = $tiketVM->getTiketById($id_tiket);
            $userList = $userVM->getUserList();
            $eventList = $eventVM->getEventList();
            require 'views/tiket_form.php';
            break;

        case 'save':
            $tiketVM->addTiket(
                $_POST['id_user'],
                $_POST['id_event'],
                $_POST['tanggal_beli'],
                $_POST['status']
            );
            header("Location: index.php?entity=tiket&action=list");
            break;

        case 'update':
            $id_tiket = $_GET['id_tiket'];
            $tiketVM->updateTiket(
                $id_tiket,
                $_POST['id_user'],
                $_POST['id_event'],
                $_POST['tanggal_beli'],
                $_POST['status']
            );
            header("Location: index.php?entity=tiket&action=list");
            break;

        case 'delete':
            $id_tiket = $_GET['id_tiket'];
            $tiketVM->deleteTiket($id_tiket);
            header("Location: index.php?entity=tiket&action=list");
            break;
    }
}
else {
    echo "Invalid entity.";
}
?>