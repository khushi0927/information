<?

require_once("config.php");

?>
<div class="p-5 mt-5 w-75 mx-auto">
<h1>Patient Detail <button type="button" class="btn btn-primary btn-lg float-end w-25" data-bs-toggle="modal" data-bs-target="#addptn" ><span class="bi bi-plus"></span> Add Patient </button></h1>
<hr class="w-50 border border-white" />
<table align="center" class="table table-responsive table-hover">
    <thead>
<tr class="bg-white" >
<th scope="col" style="background-color: #f4f4f9; color: black;">#id</th>
<th scope="col" style="background-color: #f4f4f9; color:black;">Name</th>
<th scope="col" style="background-color: #f4f4f9; color:black;">Phone</th>
<th scope="col" style="background-color: #f4f4f9; color:black;">Email</th>
<th scope="col"style="background-color: #f4f4f9; color:black;">Department</th>
<th scope="col" style="background-color: #f4f4f9; color:black;">Preferred_datetime</th>
<th scope="col" style="background-color: #f4f4f9; color:black;">Action</th>
</tr>
</thead>
<tbody>
<?php 
// <!-- fetch data -->
$select="select * from tbl_patient";
$query=mysqli_query($con,$select); 
$i=0;
while($fetch=mysqli_fetch_array($query))
{
 $i++; 
 if($i==true)
    {  
?>
<tr align="center">
<td><?php echo $i;?></td>
<td><?php echo $fetch["name"];?></td>
<td><?php echo $fetch["phone"];?></td>
<td><?php echo $fetch["email"];?></td>
<td><?php echo $fetch["department"];?></td>
<td><?php echo $fetch["preferred_datetime"];?></td>
<td>
<a href="read.php?readid=<?php echo base64_encode($fetch["id"]);?>" class="text-primary fs-5"><span class="bi bi-eye"></span></a>
| 
<a href="update.php?editid=<?php echo base64_encode($fetch["id"]);?>" class="fs-5 text-success"><span class="bi bi-pencil"></span></a>
|
<a href="delete.php?deldata=<?php echo base64_encode($fetch["id"]); ?>" class="text-danger fs-5" onclick="return confirm('Are you sure to Delete Data ?')"><span class="bi bi-trash"></span></a>    
</tr>
<?php 
}
}
?>
</tbody>
</table>
</div>    






