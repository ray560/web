<!DOCTYPE html>
<html>
<head>
<title>Delete Chart</title>
<link rel="stylesheet" href="style12.css">
</head>
<body style="background-color:lightgrey">

	<p>
		<h1><u>Deleting Chart</u></h1>
	</p>
	
    <?php

    $conn = new mysqli('127.0.0.1', 'root', '', 'transit');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "successfully connected";

    $bus_station = $_POST['bus_station'];
	$bus_station=$_POST['bus_station'];
	echo $bus_station;

    $sql="DELETE  FROM chart  WHERE bus_station ='$bus_station'";
	
    $result= mysqli_query($conn,$sql);
	
	echo '<a href="chartdeleterequest.php"><input type="button" id="back_btn" value="Back"/></a>'
    ?>
  </body>
</html>