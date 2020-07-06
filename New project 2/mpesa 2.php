//This file processes the Mpesa Response


if(isset($_POST)){

$callbackJSONData=file_get_contents('php://input');
$callbackData=json_decode($callbackJSONData);

$resultCode=$callbackData->Body->stkCallback->ResultCode;
$resultDesc=$callbackData->Body->stkCallback->ResultDesc;
$merchantRequestID=$callbackData->Body->stkCallback->MerchantRequestID;
$checkoutRequestID=$callbackData->Body->stkCallback->CheckoutRequestID;

$amount=$callbackData->stkCallback->Body->CallbackMetadata->Item[0]->Value;
$mpesaReceiptNumber=$callbackData->Body->stkCallback->CallbackMetadata->Item[1]->Value;
$balance=$callbackData->stkCallback->Body->CallbackMetadata->Item[2]->Value;
$b2CUtilityAccountAvailableFunds=$callbackData->Body->stkCallback->CallbackMetadata->Item[3]->Value;
$transactionDate=$callbackData->Body->stkCallback->CallbackMetadata->Item[4]->Value;
$phoneNumber=$callbackData->Body->stkCallback->CallbackMetadata->Item[5]->Value;




if($resultCode == '0'){


//Get the Record that has the checkoutID that had been saved earlier then save the Mpesa Receipt

//$mpesaReceiptNumber $checkoutRequestID

}else if($resultCode == '1032'){
//The User cancelled the pop up
//Find the record with the specified CheckoutRequestID Then delete it

//$checkoutRequestID

}

}