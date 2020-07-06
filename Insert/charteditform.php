<!doctype html>
<html>
<head>
<title>Edit Form</title>
<link rel="stylesheet" href="style12.css">
</head>
<body style="background-color:lightgrey">
  
    <p>
		<h1><u>Editing Chart</u></h1>
	</p>
    <?php
    $conn = new mysqli('127.0.0.1', 'root', '', 'brt');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

	if (isset($_POST['route_id'])){
		$route_id = $_POST['route_id'];
		
		
		
		
	}
	$sql="SELECT * FROM chart WHERE route_id ='$route_id'";


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
            <td>Route ID</td>
            <td><input type="int" value="<?php echo $record[0]; ?>" name="route_id" required></td>
          </tr>

          <tr>
            <td>Bus ID</td>
			<td><input type="int" value="<?php echo $record[1]; ?>" name="bus_id" required></td>
          </tr>

          <tr>
            <td>Departure Station</td><td>
			<input type="varchar" value="<?php echo $record[2]; ?>" name="departure_station" required></td>
          </tr>

          <tr>
            <td>Arrival Station</td>
			<td><input type="varchar" value="<?php echo $record[3]; ?>" name="arrival_station" required></td>
          </tr>
			
          <tr>
            <td>Departure Time</td>
			<td><input type="time" value="<?php echo $record[4]; ?>" name="departure_time" required></td>
          </tr>
		  
		  <tr>
            <td>Arrival Time</td>
			<td><input type="time" value="<?php echo $record[4]; ?>" name="arrival_time" required></td>
          </tr>
		  
		  <tr>
            <td>Day</td>
			<td><input type="date" value="<?php echo $record[4]; ?>" name="day" required></td>
          </tr>
		  
		  <tr>
            <td>Price</td>
			<td><input type="int" value="<?php echo $record[4]; ?>" name="price" required></td>
          </tr>
		  
		  <tr>
            <td>County</td>
			<td><input type="text" value="<?php echo $record[4]; ?>" name="county" required></td>
          </tr>
			
		  


<tr><td></td><td><input type="submit" value="Update" name="Send" ></td></tr>
<tr><td></td><td><a href="charteditrequest.php"><input type="button" id="back_btn" value="Back"/></a></td></tr>
</table>
</form>
</body>
</html>
