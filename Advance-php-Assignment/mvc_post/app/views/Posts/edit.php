<h2>Edit Post</h2>
<form method="POST" action="">
    Title:<br>
    <input type="text" name="title" value="<?= htmlspecialchars($post['title']) ?>" required><br><br>
    Content:<br>
    <textarea name="content" rows="5" required><?= htmlspecialchars($post['content']) ?></textarea><br><br>
    <input type="submit" value="Update">
</form>
