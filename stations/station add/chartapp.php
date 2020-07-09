<?php
//create server and database connection constants
$host = "localhost";
$user = "root";
$pwd = "";
$db = "transit";

$con= new mysqli ($host, $user, $pwd, $db);

//Check server connection
if ($con->connect_error){
	die ("Connection failed:". $con->connect_error);
}else {
	echo "Connected successfully <br />";
}
//receive  values from user form and trim white spaces
$bus_station=trim($_POST['bus_station']);
$bus_id=trim($_POST['bus_id']);
$start_station=trim($_POST['start_station']);
$destination=trim($_POST['destination']);
$amount=trim($_POST['amount']);


//now insert the received values into database using defined variables
$sqli ="INSERT INTO chart(bus_station,bus_id,start_station,destination,amount) VALUES ('$bus_station','$bus_id','$start_station','$destination','$amount')";
if ($con->query($sqli) === TRUE) {
	 //storing the bus_id in a session variable
	 $_SESSION['chart_rec'] = $bus_id;
	 header("Location: page1.php?chart_record_created_successfully"); //redirect to the next interface on a successful input
     // echo " Bus record created successfully";
} else {
	header("Location: chartjoin.php?error:".$con->error); //remain on the same page in case of an error
    if ($_SESSION['chart_rec']){
        session_unset();
        session_destroy();
    }
    //echo "Error: " . $sqli . "<br>" . $con->error;
}
$con->close(); //close the connection for security reasons
?>  