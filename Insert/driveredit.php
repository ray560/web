<!doctype html>
<html>
<head>
<title>Edit Page</title>
<link rel="stylesheet" href="style12.css">
</head>
<body style="background-color:lightgrey">
    <?php

    $conn = new mysqli('127.0.0.1', 'root', '', 'brt');
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
    echo $_POST["surname"];
    $surname = $_POST["surname"];
	echo "<br>";
    echo $_POST["firstname"];
    $firstname = $_POST["firstname"];
	echo "<br>";
    echo $_POST["secondname"];
    $secondname = $_POST["secondname"];
    echo "<br>";
    echo $_POST["phonenumber"];
    $phonenumber = $_POST["phonenumber"];
    echo "<br>";
    echo $_POST["address"];
    $address = $_POST["address"];
	echo "<br>";
    echo $_POST["shift_time"];
    $shift_time = $_POST["shift_time"];
	echo "<br>";
    echo $_POST["date_of_joining"];
    $date_of_joining = $_POST["date_of_joining"];






    $sql = "UPDATE driver SET   driver_id ='$driver_id',
    bus_id ='$bus_id',  surname ='$surname', firstname ='$firstname', secondname ='$secondname', phonenumber ='$phonenumber', address ='$address', shift_time ='$shift_time', date_of_joining ='$date_of_joining'   WHERE driver_id='$driver_id'  ";


    if(mysqli_query($conn, $sql)){
        echo "<p>Records UPDATED successfully.";
		

    } 
	else{
		echo "<p>The above records was NOT updated successfully</p>";
		}
	
	


    mysqli_close($conn);

    ?>
  </body>
</html>
