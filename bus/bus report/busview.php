<?php
session_start();
$con = mysqli_connect('localhost', 'root','', 'transit');
// check connections
if(!$con)
    {
        echo " Not connected to the server";
    }
$query = "SELECT * FROM bus";
$result = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Bus Report</title>
<link rel="stylesheet" href="style12.css">
</head>
<body style="background-color:lightgrey">
<table border="1px" style="width:600px; line-height:40px; margin-left:500px; margin-top:30px; margin-bottom:100px;">
<tr>
<th colspan="6">Bus Records</th>

</tr>
<t>
<th>Bus ID</th>
<th>Driver ID</th>
<th>Bus Station</th>
<th>Number of Passengers</th>
<th><a href="page1.php"><input type="button" id="back_btn" value="Back"/></a></th>

</t>
<?php
while($rows=mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $rows['bus_id'];?></td>
<td><?php echo $rows['driver_id'];?></td>
<td><?php echo $rows['bus_station'];?></td>
<td><?php echo $rows['no_of_passengers'];?></td>

</tr>
<?php
}
?>


</table>

</body>
</html>