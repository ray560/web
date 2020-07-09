<!doctype html>
<html>
<head>
<title>Edit Page</title>
<link rel="stylesheet" href="style12.css">
</head>
<body style="background-color:lightgrey">
    <?php

    $conn = new mysqli('127.0.0.1', 'root', '', 'transit');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "successfully connected";

    echo $_POST["bus_station"];
	$bus_station = $_POST["bus_station"];
    echo "<br>";
    echo $_POST["bus_id"];
    $bus_id = $_POST["bus_id"];
    echo "<br>";
    echo $_POST["start_station"];
    $start_station = $_POST["start_station"];
    echo "<br>";
    echo $_POST["destination"];
    $destination = $_POST["destination"];
    echo "<br>";
    echo $_POST["amount"];
    $amount = $_POST["amount"];
	echo "<br>";
    






    $sql = "UPDATE chart SET   bus_station ='$bus_station',
    bus_id ='$bus_id', start_station ='$start_station', destination ='$destination', amount ='$amount'   WHERE bus_station='$bus_station'  ";


    if(mysqli_query($conn, $sql)){
        echo "<p>Records UPDATED successfully.";
		

    } 
	else{
		echo "<p>The above records was NOT updated successfully</p>";
		}
	
	


    mysqli_close($conn);
	
	echo '<a href="charteditrequest.php"><input type="button" id="back_btn" value="Back"/></a>'

    ?>
  </body>
</html>
