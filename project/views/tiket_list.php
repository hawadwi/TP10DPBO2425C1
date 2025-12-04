<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar Tiket</h2>
<a href="index.php?entity=tiket&action=add" class="">Add Tiket</a>
<table class="w-full border mt-3">
    <tr>
        <th class="border px-4 py-2">Nama User</th>
        <th class="border px-4 py-2">Nama Event</th>
        <th class="border px-4 py-2">Tanggal Beli</th>
        <th class="border px-4 py-2">Status</th>
        <th class="border px-4 py-2">Action</th>
    </tr>

    <?php foreach ($tiketList as $tiket): ?>
        <tr>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($tiket['nama_user'] ?? 'Unknown'); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($tiket['nama_event'] ?? 'Unknown');?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($tiket['tanggal_beli']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($tiket['status']); ?></td>
            <td class="border px-4 py-2">
                <a href="index.php?entity=tiket&action=edit&id_tiket=<?php echo $tiket['id_tiket']; ?>">Edit</a>
                |
                <a href="index.php?entity=tiket&action=delete&id_tiket=<?php echo $tiket['id_tiket']; ?>" onclick="return confirm('Are you sure you want to delete this tiket?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>