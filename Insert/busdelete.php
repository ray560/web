<!DOCTYPE html>
<html>
<head>
<title>Delete Bus</title>
<link rel="stylesheet" href="style12.css">
</head>
<body style="background-color:lightgrey">

	<p>
		<h1><u>Deleting Bus</u></h1>
	</p>
	
    <?php

    $conn = new mysqli('127.0.0.1', 'root', '', 'brt');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "successfully connected";

    $bus_id = $_POST['bus_id'];
	$bus_id=$_POST['bus_id'];
	echo $bus_id;

    $sql="DELETE  FROM bus  WHERE bus_id ='$bus_id'";
	
    $result= mysqli_query($conn,$sql);
	
	echo '<a href="busdeleterequest.php"><input type="button" id="back_btn" value="Back"/></a>'
    ?>
  </body>
</html>