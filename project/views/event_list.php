<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar Event</h2>
<a href="index.php?entity=event&action=add" class="bg-blue-500 text-white px-4 py-2 rounded">Add Event</a>
<table class="w-full border mt-4">
    <tr>
        <th class="border px-4 py-2">Nama Event</th>
        <th class="border px-4 py-2">Tanggal</th>
        <th class="border px-4 py-2">Lokasi</th>
        <th class="border px-4 py-2">Harga</th>
        <th class="border px-4 py-2">Kategori</th>
        <th class="border px-4 py-2">Aksi</th>
    </tr>

    <?php foreach ($eventList as $event): ?>
        <tr>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($event['nama_event']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($event['tanggal_event']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($event['lokasi']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($event['harga']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($event['nama_kategori']); ?></td>
            <td class="border px-4 py-2">
                <a href="index.php?entity=event&action=edit&id_event=<?php echo $event['id_event']; ?>">Edit</a>
                |
                <a href="index.php?entity=event&action=delete&id_event=<?php echo $event['id_event']; ?>"onclick="return confirm('Are you sure you want to delete this event?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<?php
require_once 'views/template/footer.php';
?>