<<<<<<< HEAD
<form method="post" enctype="multipart/form-data">
    <input type="file" name="my file">
    <input type="submit" value="Upload">
</form>

<?php

echo "File Name: " . $_FILES['my file']['name'];
echo "Temp Path: " . $_FILES['my file']['tmp_name'];

=======
<form method="post" enctype="multipart/form-data">
    <input type="file" name="my file">
    <input type="submit" value="Upload">
</form>

<?php

echo "File Name: " . $_FILES['my file']['name'];
echo "Temp Path: " . $_FILES['my file']['tmp_name'];

>>>>>>> 3d7a8e84d0b5b2bab93b45629bd2d62ccb481133
?>