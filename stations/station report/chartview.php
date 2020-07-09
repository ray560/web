<?php
session_start();
$con = mysqli_connect('localhost', 'root','', 'transit');
// check connections
if(!$con)
    {
        echo " Not connected to the server";
    }
$query = "SELECT * FROM chart";
$result = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Chart Report</title>
<link rel="stylesheet" href="style12.css">
</head>
<body style="background-color:lightgrey">
<table border="1px" style="width:600px; line-height:40px; margin-left:500px; margin-top:30px; margin-bottom:100px;">
<tr>
<th colspan="10">Chart Records</th>

</tr>
<t>
<th> Bus Station </th>
<th> Bus ID </th>
<th> Start Station </th>
<th> Destination </th>
<th> Amount </th>

<th><a href="page1.php"><input type="button" id="back_btn" value="Back"/></a></th>

</t>
<?php
while($rows=mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $rows['bus_station'];?></td>
<td><?php echo $rows['bus_id'];?></td>
<td><?php echo $rows['start_station'];?></td>
<td><?php echo $rows['destination'];?></td>
<td><?php echo $rows['amount'];?></td>


</tr>
<?php
}
?>


</table>

</body>
</html>