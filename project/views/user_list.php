<?php
require_once 'views/template/header.php';
?>

<h2 class="mt-4">Daftar User</h2>
<a href="index.php?entity=user&action=add" class="">Add User</a>
<table class="w-full border">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($userList as $user): ?>
        <tr>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($user['nama']); ?></td>
            <td class="border px-4 py-2"><?php echo htmlspecialchars($user['email']); ?></td>
            <td class="border px-4 py-2">
                <a href="index.php?entity=user&action=edit&id_user=<?php echo $user['id_user']; ?>">Edit</a>
                |
                <a href="index.php?entity=user&action=delete&id_user=<?php echo $user['id_user']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
