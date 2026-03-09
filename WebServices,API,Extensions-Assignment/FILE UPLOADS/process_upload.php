<?php

$conn = new mysqli("localhost","root","","file_uploads_project");

if(isset($_POST['upload'])){

    $file = $_FILES['document'];
    
    $filename = $file['name'];
    $tmpname = $file['tmp_name'];
    $filesize = $file['size'];
    $fileerror = $file['error'];

    $fileExt = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // Allowed file types
    $allowed = ['pdf','doc','docx','jpg','png'];

    if(in_array($fileExt,$allowed)){

        if($filesize < 2000000){ // 2MB limit

            $newname = time()."_".$filename;
            $destination = "uploads/".$newname;

            move_uploaded_file($tmpname,$destination);

            // Save in database
            $stmt = $conn->prepare("INSERT INTO documents (filename) VALUES (?)");
            $stmt->bind_param("s",$newname);
            $stmt->execute();

            echo "File uploaded successfully!";

        } else {
            echo "File too large. Max size 2MB allowed.";
        }

    } else {
        echo "Invalid file type!";
    }

}

?>