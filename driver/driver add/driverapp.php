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
$driver_id=trim($_POST['driver_id']);
$bus_id=trim($_POST['bus_id']);
$lname=trim($_POST['lname']);
$fname=trim($_POST['fname']);
$sname=trim($_POST['sname']);
$address=trim($_POST['address']);
$phone_number=trim($_POST['phone_number']);



//now insert the received values into database using defined variables
$sqli ="INSERT INTO driver(driver_id,bus_id,lname,fname,sname,address,phone_number) VALUES ('$driver_id','$bus_id','$lname','$fname','$sname','$address','$phone_number')";
if ($con->query($sqli) === TRUE) {
	 //storing the driver_id in a session variable
	 $_SESSION['driver_rec'] = $driver_id;
	 header("Location: driverjoin.php?driver_record_created_successfully"); //redirect to the next interface on a successful input
     // echo " Driver record created successfully";
} else {
	header("Location: driverjoin.php?error:".$con->error); //remain on the same page in case of an error
    if ($_SESSION['driver_rec']){
        session_unset();
        session_destroy();
    }
    //echo "Error: " . $sqli . "<br>" . $con->error;
}
$con->close(); //close the connection for security reasons
?>  