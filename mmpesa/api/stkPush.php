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

$data = json_decode(file_get_contents("php://input"));
$phoneNumber = $data->phoneNumber;
$stkAmount=$data->Amount;

echo $mpesa->stk($phoneNumber, $stkAmount);
// echo $mpesa->stk($phoneNumber, $stkAmount);

