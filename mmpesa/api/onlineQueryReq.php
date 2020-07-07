<?php
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-COntrol-Allow-Methods: POST');
header('Access-COntrol-Allow-Headers: Access-Control-Allow-Headers, Content-Type,
Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../model/mpesa1.php';

//instantiate mpesa object
$mpesa = new mpesa1();


//get the raw posted data
$data = json_decode(file_get_contents("php://input"));
$CheckoutRequestID = $data->CheckoutRequestID;
$mpesa->online_query_req($CheckoutRequestID);

//confirm a transaction that has already been performed.
//checkout request id is found from the stk push method in class mpesa1