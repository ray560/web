<?php

    $conn = new mysqli('127.0.0.1', 'root', '', 'brt');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "<p>Connected successfully";
    

    //echo $_POST["route_id"];
    //$route_id = $_POST["route_id"];
	echo "<br>";
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
	


    $sql = "INSERT INTO `chart` (`route_id`, `bus_id`, `departure_station`, `arrival_station`, `departure_time`, `arrival_time`, `day`, `price`, `county`) VALUES ('$route_id', '$bus_id', '$departure_station', '$arrival_station', '$departure_time', '$arrival_time', '$day', '$price', '$county');";

    echo "<br>";
    if(mysqli_query($conn, $sql)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not be able to execute $sql. ";}//. mysqli_error($link);}
  ?>