<?php
  $postData = file_get_contents('php://input');
  //perform your processing here, e.g. log to file....
  $fp = fopen('log.txt', 'w');//url fopen should be allowed for this to occur
  if(fwrite($fp, $postData) === FALSE)
  {
      fwrite($fp, "Error: no data written");
  }
    //set here all methods to save this data in your database
    fclose($fp);
  echo '{"ResultCode": 0, "ResultDesc": "The service was accepted successfully", "ThirdPartyTransID": "1234567890"}';
  //file is  one that watches the callback url to receive data from
  //the mpesa api. It then writes the data to the log.text file.
?>
