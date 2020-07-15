<?php
session_start();
$con = mysqli_connect('localhost', 'root','', 'transit');
// check connections
if(!$con)
    {
        echo " Not connected to the server";
    }
$query = "SELECT * FROM driver";
$result = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Driver Report</title>
<link rel="stylesheet" href="style12.css">
</head>
<body style="background-color:lightgrey">
<table border="1px" style="width:600px; line-height:40px; margin-left:500px; margin-top:30px; margin-bottom:100px;">
<tr>
<th colspan="10">Driver Records</th>

</tr>
<t>
<th>Driver ID</th>
<th>Bus ID</th>
<th>Last Name</th>
<th>First Name</th>
<th>Second Name</th>
<th>Address</th>
<th>Phone Number</th>
<th><a href="index.php"><input type="button" id="back_btn" value="Back"/></a></th>

</t>
<?php
while($rows=mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $rows['driver_id'];?></td>
<td><?php echo $rows['bus_id'];?></td>
<td><?php echo $rows['lname'];?></td>
<td><?php echo $rows['fname'];?></td>
<td><?php echo $rows['sname'];?></td>
<td><?php echo $rows['address'];?></td>
<td><?php echo $rows['phone_number'];?></td>


</tr>
<?php
}
?>


</table>

</body>
</html>