

///Used to generate a password used to interact with any Safaricom Mpesa API
function GenerateToken() {
    $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    $consumer_key = "zHQdK12mfQAqqbI19UibkT2Y5RPekvup";
    $consumer_secret = "rFWR7I5DXKEeGpoK";
    $api_URL = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
   
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    //The combination of the consumer Key and Consumer Secret
    //$consumer_key:$consumer_secret
    $credentials = base64_encode('zHQdK12mfQAqqbI19UibkT2Y5RPekvup :rFWR7I5DXKEeGpoK');
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
    curl_setopt($curl, CURLOPT_HEADER, false);
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $access_token = json_decode($curl_response)->access_token;
      
    return $access_token;
}


function initiateSTK(string $phoneNumber, string $stkAmount){

global $mpesaResultUrl;

///We get a unique password for each transaction
//The password lasts for 1hr(3600)
$access_token = GenerateToken();

//The amount you want to be charged
///If the User does not have that amount the request will fail
$amount = $stkAmount;

///The Number you want the Pop up to appear
$customerNumber = $phoneNumber; 


$timestamp = date("Ymdhis");

//These variables will change when your apply for production
$lipaNaMpesaOnlineShortCode = "174379";
$lipaNaMpesaOnlinePassKey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";

///This is where the Mpesa Response will be sent
///The name of the exposed localhost followed by the name of the file processing the mpesa response
$resultURL = '';

$password = $lipaNaMpesaOnlineShortCode.$lipaNaMpesaOnlinePassKey.$timestamp;
$passwordFinal = base64_encode($password);
$payment_url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";

$curlSTK = curl_init();
curl_setopt($curlSTK, CURLOPT_URL, $payment_url);
curl_setopt($curlSTK, CURLOPT_HTTPHEADER, array("Content-Type:application/json","Authorization:Bearer ".$access_token)); //setting custom header

$curl_post_data = array(
    'BusinessShortCode' => $lipaNaMpesaOnlineShortCode,
    'Password' => $passwordFinal,
    'Timestamp' => $timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount' => $amount,
    'PartyA' => $customerNumber,
    'PartyB' => $lipaNaMpesaOnlineShortCode,
    'PhoneNumber' => $customerNumber,
    'CallBackURL' => $resultURL,
    ///You can change these to anything you want
    'AccountReference' => 'Order',
    'TransactionDesc' => 'Testing'
);



$data_string = json_encode($curl_post_data);

curl_setopt($curlSTK, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curlSTK, CURLOPT_POST, true);
curl_setopt($curlSTK, CURLOPT_POSTFIELDS, $data_string);

$curl_response = curl_exec($curlSTK);


$ResponseCode = json_decode($curl_response)->ResponseCode;


//If Successful we save the checkout ID which will be used to confirm safaricom Mpesa Response
if($ResponseCode=='0'){
 
    $CheckoutRequestID = json_decode($curl_response)->CheckoutRequestID;
    return $CheckoutRequestID;
    
 
  }else{
      echo "Error";
    }


}