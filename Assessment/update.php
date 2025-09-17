<?php 
require("config.php");
require("navigation.php");
// read data 
if(isset($_GET["editid"]))
{
$editid=base64_decode($_GET["editid"]);        
$select="select * from tbl_patient where id='$editid'";
$query=mysqli_query($con,$select); 
$fetch=mysqli_fetch_array($query);
}
// update employee details
if(isset($_POST["updatepatient"]))
{
$editid=base64_decode($_GET["editid"]);
$empname=$_POST["name"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$department=$_POST["department"];
$preferred_datetime=$_POST["preferred_datetime"];
$updata="update tbl_patient set name='$name', phone='$phone',email='$email',department='$department',preferred_datetime='$preferred_datetime' where id='$editid'";
//execute query 
$query=mysqli_query($con,$updata);
echo "<script>
alert('Patient successfully updated')
window.location='./';
</script>";    
}
?>
<div class="p-5 mt-5 w-75 mx-auto">
<div class="row">
<div class="col-md-5">
<img src="https://cdn-icons-png.flaticon.com/512/4616/4616041.png" class="img-fluid mt-5 p-5 w-100" />
</div>
<div class="col-md-7">
<h1>Edit Patient details </h1>
<hr class="w-50 border border-secondary" />

<form method="post">
<div class="form-group mt-3">
<input type="text" name="name" value="<?php echo $fetch["name"];?>" placeholder="Name *" required class="form-control">
</div>

<div class="form-group mt-3">
<input type="text" name="phone" placeholde="phone *" value="<?php echo $fetch["phone"];?>" required class="form-control">
</div>

<div class="form-group mt-3">
<input type="text"  name="email" placeholder="email *" required class="form-control"><?php echo $fetch["email"];?>
</div>

<div class="form-group mt-3">
<input type="text" name="department" placeholde="department *" value="<?php echo $fetch["department"];?>" required class="form-control">
</div>

<div class="form-group mt-3">
<input type="date" name="preferred_datetime" placeholde="preferred_datetime *" value="<?php echo $fetch["preferred_datetime"];?>" required class="form-control">
</div>

<div class="form-group mt-3">
<input type="submit" name="updatepatient" value="Update Patient"  class="btn btn-sm btn-primary text-white">
</div>
</form>
</div>
</div>    

</div>    