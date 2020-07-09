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
					Last Name
              <input  type="text" name="lname" placeholder="Enter Your Last Name" required><br></p>
					<p>
			        First Name
              <input  type="text" name="fname" placeholder="Enter Your First Name" required><br></p>
					<p>
				    Second Name
              <input  type="text" name="sname" placeholder="Enter Your Second Name" required><br></p>
					<p>
			  	    Address
              <input type="varchar" name="address" placeholder="Enter the Address" required><br></p>
				    <p>
				    Phone Number
              <input type="int" name="phone_number" placeholder="Enter Your Phone Number" required><br></p>

		      <button type="submit" name="button">Submit</button>
			  <a href="page1.php"><input type="button" id="back_btn" value="Back"/></a>
      </form>
	  
	  
</body>
</html>