<!DOCTYPE html>
<html>
<head>
<title>Delete Driver</title>
<link rel="stylesheet" href="style12.css">
</head>
<body style="background-color:lightgrey">

	<p>
		<h1><u>Deleting Driver</u></h1>
	</p>
	
    <?php

    $conn = new mysqli('127.0.0.1', 'root', '', 'transit');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "successfully connected";

    $driver_id = $_POST['driver_id'];
	$driver_id=$_POST['driver_id'];
	echo $driver_id;

    $sql="DELETE  FROM driver  WHERE driver_id ='$driver_id'";
	
    $result= mysqli_query($conn,$sql);
	
	echo '<a href="driverdeleterequest.php"><input type="button" id="back_btn" value="Back"/></a>'
    ?>
  </body>
</html>