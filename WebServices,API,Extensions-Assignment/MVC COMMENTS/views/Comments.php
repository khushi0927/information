<!DOCTYPE html>
<html>
<head>
<title>Comments</title>
</head>
<body>

<h2>Add Comment</h2>

<form method="POST" action="index.php?action=insert">
    Name: <input type="text" name="username" required><br><br>
    Comment: <textarea name="comment" required></textarea><br><br>
    <button type="submit" name="submit">Add Comment</button>
</form>

<h2>All Comments</h2>

<table border="1">
<tr>
<th>Name</th>
<th>Comment</th>
<th>Action</th>
</tr>

<?php while($row = $comments->fetch_assoc()){ ?>

<tr>
<td><?php echo $row['username']; ?></td>
<td><?php echo $row['comment']; ?></td>
<td>
<a href="index.php?action=delete&delete=<?php echo $row['id']; ?>">Delete</a>
</td>
</tr>

<?php } ?>

</table>

</body>
</html>