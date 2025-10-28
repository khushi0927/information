<form method="post" enctype="multipart/form-data">
    <input type="file" name="my file">
    <input type="submit" value="Upload">
</form>

<?php

echo "File Name: " . $_FILES['my file']['name'];
echo "Temp Path: " . $_FILES['my file']['tmp_name'];

?>