<?php

require("config.php");


if(isset($_GET["readid"]))
{
    $readid=$_GET["readid"];
     echo " ReadID from URL = $readid <br>";

    $select="select * from tbl_patient where id='$readid'";
    echo " SQL = $select <br>";

    $query=mysqli_query($con,$select);

    if(!$query){

        die("Query Error:".mysqli_error($con));
    }

   
    $fetch=mysqli_fetch_array($query);

     if(!$fetch)
    {
        die("No Patient Found With Id:$readid");
    }

     echo "<pre>";
    print_r($fetch);
    echo "</pre>";
}
?>


<div class="p-5 mt-5 w-75 mx-auto">
<div class="row">
<div class="col-md-5">
<img src="https://cdn-icons-png.flaticon.com/512/4616/4616041.png" class="img-fluid mt-5 p-5 w-100" />
</div>
<div class="col-md-7">
<h1>Read Patient details </h1>
<hr class="w-50 border border-white" />
<table align="left" class="p-5" cellspacing="25" cellpadding="25">
<tr class="bg-white">
<th>#id</th>
<td><?php echo $fetch["id"];?></td>
</tr>
<tr class="bg-white">
<th>Name</th>
<td><?php echo $fetch["name"];?></td>
</tr>

<tr class="bg-white">
<th>phone</th>
<td><?php echo $fetch["phone"];?></td>
</tr>

<tr class="bg-white">
<th>email</th>
<td><?php echo $fetch["email"];?></td>
</tr>

<tr class="bg-white">
<th>departmnet</th>
<td><?php echo $fetch["department"];?></td>
</tr>

<tr class="bg-white">
<th>preferred_datetime</th>
<td><?php echo $fetch["preferred_datetime"];?></td>
</tr>

</table>
</div>
</div>    

</div>    