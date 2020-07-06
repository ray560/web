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

    echo $_POST["route_id"];
	$route_id = $_POST["route_id"];
    echo "<br>";
    echo $_POST["bus_id"];
    $bus_id = $_POST["bus_id"];
    echo "<br>";
    echo $_POST["departure_station"];
    $departure_station = $_POST["departure_station"];
    echo "<br>";
    echo $_POST["arrival_station"];
    $arrival_station = $_POST["arrival_station"];
    echo "<br>";
    echo $_POST["departure_time"];
    $departure_time = $_POST["departure_time"];
	echo "<br>";
    echo $_POST["arrival_time"];
    $arrival_time = $_POST["arrival_time"];
	echo "<br>";
    echo $_POST["day"];
    $day = $_POST["day"];
	echo "<br>";
    echo $_POST["price"];
    $price = $_POST["price"];
	echo "<br>";
    echo $_POST["county"];
    $county = $_POST["county"];






    $sql = "UPDATE chart SET   route_id ='$route_id',
    bus_id ='$bus_id',  departure_station ='$departure_station', arrival_station ='$arrival_station', departure_time ='$departure_time', arrival_time ='$arrival_time', day ='$day', price ='$price', county ='$county'   WHERE route_id='$route_id'  ";


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
