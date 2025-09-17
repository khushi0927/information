
<?php 
if(isset($_POST["addpatient"]))
{
date_default_timezone_set("Asia/Calcutta");    
$name=$_POST["name"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$department=$_POST["department"];
$preferred_datetime=date("d/m/Y H:i:s a");
//create a insert query
$insert="insert into tbl_patient(name,phone,email,department,preferred_datetime) values ('$name','$phone','$email','$department','$preferred_datetime')";
//execute query 
$query=mysqli_query($con,$insert); 
echo "<script>
alert('Patient successfully Addedd')
window.location='./';
</script>";   
}

?>
<div class="modal fade" id="addptn" role="dialog">
<div class="modal-dialog" style="min-width: 50%;">
<div class="p-5 mt-5 w-75 mx-auto modal-content">
<h3>Add Patient here <button type="button" class="btn btn-danger border-0 btn-sm float-end" data-bs-dismiss="modal"><span class="bi bi-x-lg"></span></button></h3>
<hr class="w-50 border border-white" />
<form method="post">
<div class="form-group mt-3">
<input type="text" name="name" placeholder="Name *" required class="form-control">
</div>

<div class="form-group mt-3">
<input type="text" name="phone" placeholder="Phone *" required class="form-control">
</div>

<div class="form-group mt-3">
<input type="text"  name="email" placeholder="Email *" required class="form-control">
</div>

<div class="form-group mt-3">
<input type="text"  name="department" placeholder="Department *" required class="form-control">
</div>

<div class="form-group mt-3">
<input type="date"  name="preferred_datetime" required class="form-control">
</div>

<div class="form-group mt-3">
<input type="submit" name="addpatient" value="Add Patient"  class="btn btn-sm btn-primary text-white">
</div>
</form>

</div>
</div>
</div>    