<?php 
require_once("config.php");
if(isset($_GET["deldata"]))
{
    $deldata=base64_decode($_GET["deldata"]);
    // pass a delete sql query
    $del="delete from tbl_patient where empid='$deldata'";
    $query=mysqli_query($con,$del);
    // pass a deleted messages
    echo "<script>
    alert('Data successfully deleted')
    window.location='./'
    </script>";
}

?>