
<?php
//main control class. Main class that interacts with mpesa. 
//offers two methods, the stk push and online request query, to confirm  payment.
class mpesa1{
     //set your consumer key here
     private $consumerKey = 'erGAfYRAP4u0RBJbYB6ZAa9oxGajx6jX';
     //set your consumer sectet here
     private $consumerSecret = 'dRvDmBfAAVmiIZlP';
///Used to generate a password used to interact with any Safaricom Mpesa API

    //set here your callback url, 
    private $callbackUrl ='https://59e9d0598ace.ngrok.io';
private function GenerateToken() {
    $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
   
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    //The combination of the consumer Key and Consumer Secret
    //$consumer_key:$consumer_secret
    $credentials = base64_encode($this->consumerKey.':'.$this->consumerSecret);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
    curl_setopt($curl, CURLOPT_HEADER, false);
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $access_token = json_decode($curl_response)->access_token;
    
    return $access_token;
}

//on calling this method, an stk is activated, after a successful transaction,
// a webhook is sent to your call back url, which is listened to by the
//input.php file which inturn writes the message received in a log.txt file
function stk(string $phoneNumber, string $stkAmount){
            $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        
            ///We get a unique password for each transaction
            //The password lasts for 1hr(3600)
            $access_token = 'Authorization: Bearer '.$this->GenerateToken();
            
            //The amount you want to be charged
            ///If the User does not have that amount the request will fail
            $amount = $stkAmount;
            
            ///The Number you want the Pop up to appear
            $customerNumber = $phoneNumber; 
            $timestamp = date("YmdHis");

            //These variables will change when your apply for production
            $lipaNaMpesaOnlineShortCode = "174379";
            $lipaNaMpesaOnlinePassKey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";

            $password = $lipaNaMpesaOnlineShortCode.$lipaNaMpesaOnlinePassKey.$timestamp;
            $passwordFinal = base64_encode($password);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        
        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'BusinessShortCode' => $lipaNaMpesaOnlineShortCode,
            'Password' => $passwordFinal,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $customerNumber,
            'PartyB' =>  $lipaNaMpesaOnlineShortCode,
            'PhoneNumber' =>  $customerNumber,
            'CallBackURL' => $this->callbackUrl.'/web/mmpesa/callback/input.php',
            'AccountReference' => 'testing rays project',
            'TransactionDesc' => 'testing rays project'
        );
        
        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$access_token)); //setting custom header
        
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        
        $curl_response = curl_exec($curl);


        $ResponseCode = json_decode($curl_response)->ResponseCode;


        //If Successful we save the checkout ID which will be used to confirm safaricom Mpesa Response
        if($ResponseCode=='0'){
            echo $curl_response;

            // data in the following formart
            // {
            //     "MerchantRequestID": "2482-507116-1",
            //     "CheckoutRequestID": "ws_CO_070720202238032199",
            //     "ResponseCode": "0",
            //     "ResponseDescription": "Success. Request accepted for processing",
            //     "CustomerMessage": "Success. Request accepted for processing"
            // }

        }else{
            echo "Error";
        }

    }

    public function online_query_req( string $CheckoutRequestID){
      
            ///We get a unique password for each transaction
                //The password lasts for 1hr(3600)
                $access_token = 'Authorization: Bearer '.$this->GenerateToken();
    
            $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query';
      
            
            $timestamp = date("YmdHis");

            //These variables will change when your apply for production
            $lipaNaMpesaOnlineShortCode = "174379";
            $lipaNaMpesaOnlinePassKey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";

            $password = $lipaNaMpesaOnlineShortCode.$lipaNaMpesaOnlinePassKey.$timestamp;
            $passwordFinal = base64_encode($password);

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$access_token)); //setting custom header
            
            
            $curl_post_data = array(
              //Fill in the request parameters with valid values
              'BusinessShortCode' => $lipaNaMpesaOnlineShortCode,
              'Password' => $passwordFinal,
              'Timestamp' => $timestamp,
              'CheckoutRequestID' =>$CheckoutRequestID
            );
            
            $data_string = json_encode($curl_post_data);
            
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
            
            $curl_response = curl_exec($curl);
            
            echo $curl_response;
            //data is in the following format
            // {
            //     "ResponseCode": "0", 
            //     "ResponseDescription": "The service request has been accepted successsfully",
            //     "MerchantRequestID": "17559-349487-1",
            //     "CheckoutRequestID": "ws_CO_070720202116576879",
            //     "ResultCode": "0",
            //     "ResultDesc": "The service request is processed successfully."
            // }
        
    }

}