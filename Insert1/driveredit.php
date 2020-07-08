<!doctype html>
<html>
<head>
<title>Edit Page</title>
<link rel="stylesheet" href="style12.css">
</head>
<body style="background-color:lightgrey">
    <?php

    $conn = new mysqli('127.0.0.1', 'root', '', 'transit');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "successfully connected";

    echo $_POST["driver_id"];
	$driver_id = $_POST["driver_id"];
    echo "<br>";
    echo $_POST["bus_id"];
    $bus_id = $_POST["bus_id"];
    echo "<br>";
    echo $_POST["lname"];
    $lname = $_POST["lname"];
	echo "<br>";
    echo $_POST["fname"];
    $fname = $_POST["fname"];
	echo "<br>";
    echo $_POST["sname"];
    $sname = $_POST["sname"];
    echo "<br>";
    echo $_POST["address"];
    $address = $_POST["address"];
	echo "<br>";
	echo $_POST["phone_number"];
    $phone_number = $_POST["phone_number"];
    echo "<br>";
    






    $sql = "UPDATE driver SET   driver_id ='$driver_id',
    bus_id ='$bus_id', lname ='$lname', fname ='$fname', sname ='$sname', address ='$address', phone_number ='$phone_number'   WHERE driver_id='$driver_id'  ";


    if(mysqli_query($conn, $sql)){
        echo "<p>Records UPDATED successfully.";
		

    } 
	else{
		echo "<p>The above records was NOT updated successfully</p>";
		}
	
	


    mysqli_close($conn);
	
	echo '<a href="drivereditrequest.php"><input type="button" id="back_btn" value="Back"/></a>'

    ?>
  </body>
</html>
