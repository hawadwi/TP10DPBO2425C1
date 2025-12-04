<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($tiket) ? 'Edit Tiket' : 'Add Tiket'; ?></h2>
<form action="index.php?entity=tiket&action=<?php echo isset($tiket) ? 'update&id_tiket=' . $tiket['id_tiket'] : 'save'; ?>" method="POST" class="space-y-4">
    <!-- USER -->
    <div>
        <label class="block">User:</label>
        <select name="id_user" class="border p-2 w-full" required>
            <option value="">Select User</option>
            <?php foreach ($userList as $user): ?>
                <option value="<?php echo $user['id_user']; ?>" <?php echo (isset($tiket) && $tiket['id_user'] == $user['id_user']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($user['nama']); ?> (<?php echo htmlspecialchars($user['email']); ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <!-- EVENT -->
    <div>
        <label class="block">Event:</label>
        <select name="id_event" class="border p-2 w-full" required>
            <option value="">Select Event</option>
            <?php foreach ($eventList as $event): ?>
                <option value="<?php echo $event['id_event']; ?>" <?php echo (isset($tiket) && $tiket['id_event'] == $event['id_event']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($event['nama_event']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <!-- TANGGAL BELI -->
    <div>
        <label class="block">Tanggal Beli:</label>
        <input type="date" name="tanggal_beli" class="border p-2 w-full" value="<?php echo isset($tiket) ? $tiket['tanggal_beli'] : ''; ?>" required>
    </div>
    <!-- STATUS -->
    <div>
        <label class="block">Status:</label>
        <select name="status" class="border p-2 w-full" required>
            <option value="pending" <?php echo (isset($tiket) && $tiket['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
            <option value="paid" <?php echo (isset($tiket) && $tiket['status'] == 'paid') ? 'selected' : ''; ?>>Paid</option>
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>