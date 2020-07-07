<?php
  $postData = file_get_contents('php://input');
  //perform your processing here, e.g. log to file....
  $fp = fopen('log.txt', 'w');//url fopen should be allowed for this to occur
  if(fwrite($fp, $postData) === FALSE)
  {
      fwrite($fp, "Error: no data written");
  }
    fclose($fp);
  // echo '{"ResultCode": 0, "ResultDesc": "The service was accepted successfully", "ThirdPartyTransID": "1234567890"}';
?>
