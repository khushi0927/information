<?php


$conn = mysqli_connect("localhost", "root", "", "ajax_example");

if (!$conn) {
	http_response_code(500);
	echo "Database connection failed: " . htmlspecialchars(mysqli_connect_error());
	exit;
}

$query = isset($_GET['query']) ? $_GET['query'] : '';


$sql = "SELECT * FROM tbl_product WHERE name LIKE ? ORDER BY id DESC";
$stmt = mysqli_prepare($conn, $sql);
if ($stmt === false) {
	http_response_code(500);
	echo "Failed to prepare statement.";
	mysqli_close($conn);
	exit;
}

$like = "%" . $query . "%";
mysqli_stmt_bind_param($stmt, "s", $like);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "<div style='border:1px solid #ccc; margin-bottom:10px; padding:10px;'>";
		echo "<strong>Name:</strong> " . htmlspecialchars($row['name']) . "<br>";
		echo "<strong>Price:</strong> ₹" . htmlspecialchars($row['price']) . "<br>";
		if (!empty($row['image'])) {
			echo "<img src='uploads/" . htmlspecialchars($row['image']) . "' width='100' alt='Product Image'><br>";
		}
		echo "</div>";
	}
} else {
	echo "No products found.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
