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

    $conn = new mysqli('127.0.0.1', 'root', '', 'brt');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "successfully connected";

    $route_id = $_POST['route_id'];
	$route_id=$_POST['route_id'];
	echo $route_id;

    $sql="DELETE  FROM chart  WHERE route_id ='$route_id'";
	
    $result= mysqli_query($conn,$sql);
	
	echo '<a href="chartdeleterequest.php"><input type="button" id="back_btn" value="Back"/></a>'
    ?>
  </body>
</html>