<?php
session_start();
$con = mysqli_connect('localhost', 'root','', 'brt');
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
<th> Route ID </th>
<th> Bus ID </th>
<th> Departure Station </th>
<th> Arrival Station </th>
<th> Departure Time </th>
<th> Arrival Time </th>
<th> Day </th>
<th> Price </th>
<th> County </th>
<th><a href="page1.php"><input type="button" id="back_btn" value="Back"/></a></th>

</t>
<?php
while($rows=mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $rows['route_id'];?></td>
<td><?php echo $rows['bus_id'];?></td>
<td><?php echo $rows['departure_station'];?></td>
<td><?php echo $rows['arrival_station'];?></td>
<td><?php echo $rows['departure_time'];?></td>
<td><?php echo $rows['arrival_time'];?></td>
<td><?php echo $rows['day'];?></td>
<td><?php echo $rows['price'];?></td>
<td><?php echo $rows['county'];?></td>

</tr>
<?php
}
?>


</table>

</body>
</html>