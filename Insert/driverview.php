<?php
session_start();
$con = mysqli_connect('localhost', 'root','', 'brt');
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
<th>Surname</th>
<th>First Name</th>
<th>Second Name</th>
<th>Phone Number</th>
<th>Address</th>
<th>Shift Time</th>
<th>Date of Joining</th>
<th><a href="page1.php"><input type="button" id="back_btn" value="Back"/></a></th>

</t>
<?php
while($rows=mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $rows['driver_id'];?></td>
<td><?php echo $rows['bus_id'];?></td>
<td><?php echo $rows['surname'];?></td>
<td><?php echo $rows['firstname'];?></td>
<td><?php echo $rows['secondname'];?></td>
<td><?php echo $rows['phonenumber'];?></td>
<td><?php echo $rows['address'];?></td>
<td><?php echo $rows['shift_time'];?></td>
<td><?php echo $rows['date_of_joining'];?></td>


</tr>
<?php
}
?>


</table>

</body>
</html>