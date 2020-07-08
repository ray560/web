<!doctype html>
<html>
<head>
<title>Edit Form</title>
<link rel="stylesheet" href="style12.css">
</head>
<body style="background-color:lightgrey">
  
    <p>
		<h1><u>Edit Bus</u></h1>
	</p>
    <?php
    $conn = new mysqli('127.0.0.1', 'root', '', 'transit');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	if (isset($_POST['bus_id'])){
		$bus_id = $_POST['bus_id'];
		
		
		
		
	}
	$sql="SELECT * FROM bus WHERE bus_id ='$bus_id'";


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

    <form action="busedit.php" method="Post" enctype="multipart/form-data">
        <table>
          <tr>
            <td>Bus ID</td>
            <td><input type="int" value="<?php echo $record[0]; ?>" name="bus_id" required></td>
          </tr>

          <tr>
            <td>Driver ID</td>
			<td><input type="int" value="<?php echo $record[1]; ?>" name="driver_id" required></td>
          </tr>

          <tr>
            <td>Bus Station</td><td>
			<input type="int" value="<?php echo $record[2]; ?>" name="bus_station" required></td>
          </tr>
			
          <tr>
            <td>Number of Passengers</td>
			<td><input type="int" value="<?php echo $record[4]; ?>" name="no_of_passengers" required></td>
          </tr>
			
		  


<tr><td></td><td><input type="submit" value="Update" name="Send" ></td></tr>
<tr><td></td><td><a href="buseditrequest.php"><input type="button" id="back_btn" value="Back"/></a></td></tr>
</table>
</form>
</body>
</html>
