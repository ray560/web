<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Deleterequest</title>
  </head>
  <body>
    <?php
    $conn = new mysqli('127.0.0.1', 'root', '', 'transport');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "successfully connected";


    $sql="SELECT * FROM driverdetails ";

  $result= mysqli_query($conn,$sql);

  // keeps getting the next row until there are no more to get
  $row1=mysqli_fetch_array($result,MYSQLI_NUM);
  echo "<table border= 1>";
  echo "<th> surname </th>";
  echo "<th> firstname </th>";
  echo "<th> secondname </th>";
  echo "<th> driver_id </th>";
  echo "<th> phonenumber </th>";
  echo "<th> address </th>";
  echo "<th> shift_time </th>";
  echo "<th> date_of_joining </th>";
  while($row1=mysqli_fetch_array($result,MYSQLI_NUM))
  	{
	// Print out the contents of each row into a table
	echo "<form action='delete1.php' method='Post'>";
	echo "<tr><td width= 100px>";
	echo $row1[0];
	$driver_id= $row1[3];
	echo "</td><td with= 100px>";
	echo $row1[1];
	echo "</td><td width= 100px>";
	echo $row1[2];
	echo "</td><td width= 100px>";
    echo $row1[3];
	echo "</td><td width= 100px>";
    echo $row1[4];
	echo "</td><td width= 100px>";
	echo $row1[5];
	echo "</td><td width= 100px>";
	echo $row1[6];
	echo "</td><td width= 100px>";
	echo $row1[7];
	echo "</td><td width= 100px>";
  echo "<input type='hidden' id='driver_id' name='driver_id' value='$driver_id'>";

	echo '<input type="submit" value="Del">';

	echo "</td></tr>";
	echo "</form>";
}

echo "</table>";

    ?>
  </body>
</html>
