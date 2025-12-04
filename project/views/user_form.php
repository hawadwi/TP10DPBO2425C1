<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($user) ? 'Edit User' : 'Add User'; ?></h2>
<form action="index.php?entity=user&action=<?php echo isset($user) ? 'update&id_user=' . $user['id_user'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Name:</label>
        <input type="text" name="nama" value="<?php echo isset($user) ? $user['nama'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Email:</label>
        <input type="text" name="email" value="<?php echo isset($user) ? $user['email'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
