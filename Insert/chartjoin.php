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

                    Route ID
              <input  type="int" name="route_id" placeholder="Enter the Route ID" required><br>
			        Bus ID
              <input  type="int" name="bus_id" placeholder="Enter the Bus ID" required><br>
					Departure Station
              <input  type="varchar" name="departure_station" placeholder="Enter the Departure Station" required><br>
			        Arrival Station
              <input  type="varchar" name="arrival_station" placeholder="Enter Your Arrival Station" required><br>
				    Departure Time
              <input  type="time" name="departure_time" placeholder="Enter the Departure Time" required><br>
					Arrival Time
              <input  type="time" name="arrival_time" placeholder="Enter the Arrival Time" required><br>
				    Day
              <input type="date" name="day" placeholder="Enter the Day" required><br>
					Price
              <input type="int" name="price" placeholder="Enter the Price" required><br>
					County
              <input type="text" name="county" placeholder="Enter the County" required><br>

		      <button type="submit" name="button">Submit</button>
			  <a href="page1.php"><input type="button" id="back_btn" value="Back"/></a>
      </form>
	  
	  
</body>
</html>