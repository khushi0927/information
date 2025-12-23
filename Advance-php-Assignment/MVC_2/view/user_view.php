<!DOCTYPE html>
<html>
<body>

<h2>User</h2>

<!-- Insert / Update Form -->
<form method="post">
    <input type="hidden" name="id" value="<?= $_GET['edit'] ?? '' ?>">
    <input type="text" name="name" placeholder="Enter name" required>
    <button name="<?= isset($_GET['edit']) ? 'update' : 'add' ?>">
        <?= isset($_GET['edit']) ? 'Update' : 'Add' ?>
    </button>
</form>

<br>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Actions</th>
</tr>

<?php while ($row = $users->fetch_assoc()) { ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td>
        <a href="?edit=<?= $row['id'] ?>">Edit</a> |
        <a href="?delete=<?= $row['id'] ?>">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
