<?php foreach($posts as $post): ?>
    <h2><?= htmlspecialchars($post['title']) ?></h2>
    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
    <a href="index.php?action=show&id=<?= $post['id'] ?>">View</a> |
    <a href="index.php?action=edit&id=<?= $post['id'] ?>">Edit</a> |
    <a href="index.php?action=delete&id=<?= $post['id'] ?>">Delete</a>
    <hr>
<?php endforeach; ?>
