<?php
//create server and database connection constants
$host = "localhost";
$user = "root";
$pwd = "";
$db = "brt";

$con= new mysqli ($host, $user, $pwd, $db);

//Check server connection
if ($con->connect_error){
	die ("Connection failed:". $con->connect_error);
}else {
	echo "Connected successfully <br />";
}
//receive  values from user form and trim white spaces
$bus_id=trim($_POST['bus_id']);
$driver_id=trim($_POST['driver_id']);
$route_id=trim($_POST['route_id']);
$fare_charge=trim($_POST['fare_charge']);
$no_of_passengers=trim($_POST['no_of_passengers']);


//now insert the received values into database using defined variables
$sqli ="INSERT INTO bus(bus_id,driver_id,route_id,fare_charge,no_of_passengers) VALUES ('$bus_id','$driver_id','$route_id','$fare_charge','$no_of_passengers')";
if ($con->query($sqli) === TRUE) {
	 //storing the bus_id in a session variable
	 $_SESSION['bus_rec'] = $bus_id;
	 header("Location: page1.php?bus_record_created_successfully"); //redirect to the next interface on a successful input
     // echo " Bus record created successfully";
} else {
	header("Location: busjoin.php?error:".$con->error); //remain on the same page in case of an error
    if ($_SESSION['bus_rec']){
        session_unset();
        session_destroy();
    }
    //echo "Error: " . $sqli . "<br>" . $con->error;
}
$con->close(); //close the connection for security reasons
?>  