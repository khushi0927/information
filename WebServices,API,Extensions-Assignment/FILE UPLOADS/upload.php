<!DOCTYPE html>
<html>
<head>
<title>Upload Document</title>
</head>
<body>

<h2>Upload Your Document</h2>

<form action="process_upload.php" method="POST" enctype="multipart/form-data">
    
    <input type="file" name="document" required>
    <br><br>
    
    <button type="submit" name="upload">Upload File</button>

</form>

</body>
</html>