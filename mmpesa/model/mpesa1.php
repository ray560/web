
<?php
class mpesa1{
    
///Used to generate a password used to interact with any Safaricom Mpesa API
public function GenerateToken() {
    $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
    //set your consumer key here
    $consumerKey = 'erGAfYRAP4u0RBJbYB6ZAa9oxGajx6jX';
    //set your consumer sectet here
    $consumerSecret = 'dRvDmBfAAVmiIZlP';
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    //The combination of the consumer Key and Consumer Secret
    //$consumer_key:$consumer_secret
    $credentials = base64_encode($consumerKey.':'.$consumerSecret);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
    curl_setopt($curl, CURLOPT_HEADER, false);
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $curl_response = curl_exec($curl);
    curl_close($curl);
    $access_token = json_decode($curl_response)->access_token;
    
    return $access_token;
}


public function initiateSTK(string $phoneNumber, string $stkAmount){

    global $mpesaResultUrl;

    ///We get a unique password for each transaction
    //The password lasts for 1hr(3600)
    $access_token = $this->GenerateToken();

    //The amount you want to be charged
    ///If the User does not have that amount the request will fail
    $amount = $stkAmount;

    ///The Number you want the Pop up to appear
    $customerNumber = $phoneNumber; 


    $timestamp = date("YmdHis");
    echo ($timestamp);

    //These variables will change when your apply for production
    $lipaNaMpesaOnlineShortCode = "174379";
    $lipaNaMpesaOnlinePassKey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";

    ///This is where the Mpesa Response will be sent
    ///The name of the exposed localhost followed by the name of the file processing the mpesa response
    $resultURL = 'http://d5f486d67faa.ngrok.io/web/mmpesa/callback/input.php';

    $password = $lipaNaMpesaOnlineShortCode.$lipaNaMpesaOnlinePassKey.$timestamp;
    $passwordFinal = base64_encode($password);
    $payment_url = "https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest";

    $curlSTK = curl_init();
    curl_setopt($curlSTK, CURLOPT_URL, $payment_url);
    curl_setopt($curlSTK, CURLOPT_HTTPHEADER, array('Content-Type:application/json',$access_token)); //setting custom header
    
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
            'CallBackURL' => 'https://7cf4cbb7e6a1.ngrok.io/web/mmpesa/callback/input.php',
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
        
    }

}