<?php
//create server and database connection constants
session_start();

$host = "localhost";
$user = "root";
$pwd = "";
$db = "brt";

$con= new mysqli ($host, $user, $pwd, $db);

//Check server connection
if ($con->connect_error){
die ("Connection failed:". $con->connect_error);
}else {
//echo "Connected successfully <br />";
}
//receive  values from user form and trim white spaces
$ticket_id=trim($_POST['ticket_id']);
$route_id=trim($_POST['route_id']);
$bus_id=trim($_POST['bus_id']);
$lastname=trim($_POST['lastname']);
$firstname=trim($_POST['firstname']);
$middlename=trim($_POST['middlename']);
$phone_no=trim($_POST['phone_no']);
$amount=trim($_POST['amount']);
$e_mail=trim($_POST['e_mail']);


//now insert the received values into database using defined variables
$sqli ="INSERT INTO ticket(ticket_id,route_id,bus_id,lastname,firstname,middlename,phone_no,amount,e_mail) VALUES ('$ticket_id','$route_id','$bus_id','$lastname','$firstname','$middlename','$phone_no','$amount','$e_mail')";
if ($con->query($sqli) === TRUE) {
    //storing the Route ID in a session variable
    $_SESSION['route_pas'] = $ticket_id;
    header("Location: ticket.php?ticket_record_created_successfully"); //redirect to the next interface on a successful input
//    echo " student record created successfully";
} else {
    header("Location: fare charts.php?error:".$con->error); //remain on the same page in case of an error
    if ($_SESSION['route_pas']){
        session_unset();
        session_destroy();
    }
//    echo "Error:" . $sqli . "<br>" . $con->error;
}
$con->close(); //close the connection for security reasons	