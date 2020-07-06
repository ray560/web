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
		<h1><u>Adding Driver</u></h1>
	</p>


<form class="frm" action="driverapp.php" method="post">
					<p>
					Driver ID
              <input  type="int" name="driver_id" placeholder="Enter Driver ID" required><br></p>
					<p>
					Bus ID
              <input  type="int" name="bus_id" placeholder="Enter Bus ID" required><br></p>
					<p>
					SurName
              <input  type="text" name="surname" placeholder="Enter Your SurName" required><br></p>
					<p>
			        First Name
              <input  type="text" name="Firstname" placeholder="Enter Your First Name" required><br></p>
					<p>
				    Second Name
              <input  type="text" name="secondname" placeholder="Enter Your Second Name" required><br></p>
					<p>
				    Phone Number
              <input type="int" name="phonenumber" placeholder="Enter Your Phone Number" required><br></p>
					<p>
			  	    Address
              <input type="varchar" name="address" placeholder="Enter the Address" required><br></p>
					<p>
			  	    Shift Time
              <input type="date_time_set" name="shift_time" placeholder="Enter the Shift Time" required><br></p>
					<p>
			  	    Date of Joining
              <input type="date" name="date_of_joining" placeholder="Enter the Date of Joining" required><br></p>

		      <button type="submit" name="button">Submit</button>
			  <a href="page1.php"><input type="button" id="back_btn" value="Back"/></a>
      </form>
	  
	  
</body>
</html>