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
		<h1><u>Adding Chart</u></h1>
	</p>


<form class="frm" action="chartapp.php" method="post">

                    Bus Station
              <input  type="int" name="bus_station" placeholder="Enter Bus Station" required><br>
			        Bus ID
              <input  type="int" name="bus_id" placeholder="Enter the Bus ID" required><br>
					Start Station
              <input  type="varchar" name="start_station" placeholder="Enter the Start Station" required><br>
			        Destination
              <input  type="varchar" name="destination" placeholder="Enter the Destination" required><br>
				    Amount
              <input  type="int" name="amount" placeholder="Enter the Amount" required><br>
				

		      <button type="submit" name="button">Submit</button>
			  <a href="page1.php"><input type="button" id="back_btn" value="Back"/></a>
      </form>
	  
	  
</body>
</html>