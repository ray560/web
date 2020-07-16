<?php
include_once 'dbconf.php';
include_once 'database.php';
include_once '../../mmpesa/model/mpesa1.php';

        //instantiating database to connect
$database = new dbconf();
$db = $database->connect();
//instaiating blog post object
$post = new database($db);
$mpesa = new mpesa1();

$fname = $_GET['fname'];
$lname = $_GET['lname'];
$pnumber = $_GET['pnumber'];
$trip_id = 5668;
$seat_no = $_GET['seat_no'];
$amount = $_GET['amount'];


$data = $mpesa->stk($pnumber, $amount);

$transaction_id = json_decode($data)->CheckoutRequestID;

//$route_id = $post->getrouteId($_GET['to_destination'] , $_GET['from_destination'] );

$ticket_details = array(
    'firstname'=>$fname,
    'lastname'=>$lname,
    'phonenumber'=>$pnumber,
    'seat_no'=>$seat_no,
    'transaction_id'=>$transaction_id,
    'trip_id'=>$trip_id,
);

$post->createTicket($ticket_details);