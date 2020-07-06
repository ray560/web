<?php

?>

<!doctype html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="style12.css">
</head>
<body style="background-color:lightgrey">

	<p>
		<h1><u>Adding Bus</u></h1>
	</p>

	<form class="frm" action="busapp.php" method="post">

					Bus ID
              <input  type="int" name="bus_id" required><br>
			        Driver ID
              <input  type="int" name="driver_id" required><br>
				    Route ID
              <input  type="int" name="route_id" required><br>
					Fare Charge
              <input  type="int" name="fare_charge" required><br>
				    Number of Passengers
              <input type="int" name="no_of_passengers" required><br>

		      <button type="submit" name="button">Submit</button>
			  <a href="page1.php"><input type="button" id="back_btn" value="Back"/></a>
    </form>
	
	
	
</body>
</html>