<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar Kategori</h2>
<a href="index.php?entity=kategori&action=add" class="">Add Kategori</a>
<table class="w-full border">
    <tr>
        <th>Nama Kategori</th>
    </tr>
    <?php foreach ($kategoriList as $kategori): ?>
        <tr>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($kategori['nama_kategori']); ?></td>
            <td class="border px-4 py-2">
                <a href="index.php?entity=kategori&action=edit&id_kategori=<?php echo $kategori['id_kategori']; ?>">Edit</a>
                |
                <a href="index.php?entity=kategori&action=delete&id_kategori=<?php echo $kategori['id_kategori']; ?>" onclick="return confirm('Are you sure you want to delete this kategori?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
