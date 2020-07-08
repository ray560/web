<!doctype html>
<html>
<head>
<title>Edit Form</title>
<link rel="stylesheet" href="style12.css">
</head>
<body style="background-color:lightgrey">
  
    <p>
		<h1><u>Edit Driver</u></h1>
	</p>
    <?php
    $conn = new mysqli('127.0.0.1', 'root', '', 'transit');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	if (isset($_POST['driver_id'])){
		$driver_id = $_POST['driver_id'];
		
		
		
		
	}
	$sql="SELECT * FROM driver WHERE driver_id ='$driver_id'";


	$result= mysqli_query($conn,$sql);

	$rows = mysqli_num_rows($result);

	$record = mysqli_fetch_array($result);

echo $record[0];
echo "  ";
echo $record[1];
echo "  ";
echo $record[2];
echo "  ";
echo $record[3];
echo "  ";
echo $record[4];
echo "  ";




mysqli_close($conn);


    ?>

    <form action="driveredit.php" method="Post" enctype="multipart/form-data">
        <table>
          <tr>
            <td>Driver ID</td>
            <td><input type="int" value="<?php echo $record[0]; ?>" name="driver_id" required></td>
          </tr>

          <tr>
            <td>Bus ID</td>
			<td><input type="int" value="<?php echo $record[1]; ?>" name="bus_id" required></td>
          </tr>

          <tr>
            <td>Last Name</td><td>
			<input type="text" value="<?php echo $record[2]; ?>" name="lname" required></td>
          </tr>

          <tr>
            <td>First Name</td>
			<td><input type="text" value="<?php echo $record[3]; ?>" name="fname" required></td>
          </tr>
			
          <tr>
            <td>Second Name</td>
			<td><input type="text" value="<?php echo $record[4]; ?>" name="sname" required></td>
          </tr>
		  
		  <tr>
            <td>Address</td>
			<td><input type="varchar" value="<?php echo $record[4]; ?>" name="address" required></td>
          </tr>
		  
		  <tr>
            <td>Phone Number</td>
			<td><input type="int" value="<?php echo $record[4]; ?>" name="phone_number" required></td>
          </tr>
			
		  


<tr><td></td><td><input type="submit" value="Update" name="Send" ></td></tr>
<tr><td></td><td><a href="drivereditrequest.php"><input type="button" id="back_btn" value="Back"/></a></td></tr>
</table>
</form>
</body>
</html>
