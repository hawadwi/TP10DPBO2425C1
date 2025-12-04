<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($kategori) ? 'Edit Kategori' : 'Add Kategori'; ?></h2>
<form action="index.php?entity=kategori&action=<?php echo isset($kategori) ? 'update&id_kategori=' . $kategori['id_kategori'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Nama Kategori:</label>
        <input type="text" name="nama_kategori" value="<?php echo isset($kategori) ? $kategori['nama_kategori'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
