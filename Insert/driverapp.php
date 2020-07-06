  <?php

    $conn = new mysqli('127.0.0.1', 'root', '', 'brt');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "<p>Connected successfully";
    

    //echo $_POST["MemberID"];
    //$MemberID = $_POST["MemberID"];
    echo $_POST["driver_id"];
    $driver_id = $_POST["driver_id"];
	echo "<br>";
    echo $_POST["bus_id"];
    $bus_id = $_POST["bus_id"];
	echo "<br>";
    echo $_POST["surname"];
    $surname = $_POST["surname"];
    echo "<br>";
    echo $_POST["Firstname"];
    $firstname = $_POST["Firstname"];
	echo "<br>";
    echo $_POST["secondname"];
    $secondname = $_POST["secondname"];
    echo "<br>"; 
    echo $_POST["phonenumber"];
    $phonenumber = $_POST["phonenumber"];
	echo "<br>";
    echo $_POST["address"];
    $address = $_POST["address"];
	echo "<br>";
    echo $_POST["shift_time"];
    $shift_time = $_POST["shift_time"];
    echo "<br>";
    echo $_POST["date_of_joining"];
    $date_of_joining = $_POST["date_of_joining"];


    $sql = "INSERT INTO `driver` (`driver_id`, `bus_id`, `surname`, `firstname`, `secondname`, `phonenumber`,`address`,`shift_time`,`date_of_joining`) VALUES ('$driver_id', '$bus_id', '$surname', '$firstname', '$secondname', '$phonenumber', '$address', '$shift_time', '$date_of_joining');";

    echo "<br>";
    if(mysqli_query($conn, $sql)){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. ";}//. mysqli_error($link);}
  ?>