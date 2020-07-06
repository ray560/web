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

    echo $_POST["bus_id"];
	$bus_id = $_POST["bus_id"];
    echo "<br>";
    echo $_POST["driver_id"];
    $driver_id = $_POST["driver_id"];
    echo "<br>";
    echo $_POST["route_id"];
    $route_id = $_POST["route_id"];
    echo "<br>";
    echo $_POST["fare_charge"];
    $fare_charge = $_POST["fare_charge"];
    echo "<br>";
    echo $_POST["no_of_passengers"];
    $no_of_passengers = $_POST["no_of_passengers"];






    $sql = "UPDATE bus SET   bus_id ='$bus_id',
    driver_id ='$driver_id',  route_id ='$route_id', fare_charge ='$fare_charge', no_of_passengers ='$no_of_passengers'   WHERE bus_id='$bus_id'  ";


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
