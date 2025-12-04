<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($event) ? 'Edit Event' : 'Add Event'; ?></h2>
<form action="index.php?entity=event&action=<?php echo isset($event) ? 'update&id_event=' . $event['id_event'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Nama Event:</label>
        <input type="text" name="nama_event" value="<?php echo isset($event) ? htmlspecialchars($event['nama_event']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Kategori:</label>
        <select name="id_kategori" class="border p-2 w-full" required>
            <option value="">Select Kategori</option>
            <?php foreach ($kategoriList as $kategori): ?>
                <option value="<?php echo $kategori['id_kategori']; ?>"<?php echo (isset($event) && $event['id_kategori'] == $kategori['id_kategori']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($kategori['nama_kategori']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label class="block">Tanggal Event:</label>
        <input type="date" name="tanggal_event" value="<?php echo isset($event) ? htmlspecialchars($event['tanggal_event']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Lokasi:</label>
        <input type="text" name="lokasi" value="<?php echo isset($event) ? htmlspecialchars($event['lokasi']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Harga:</label>
        <input type="number" name="harga" min="0"value="<?php echo isset($event) ? htmlspecialchars($event['harga']) : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>