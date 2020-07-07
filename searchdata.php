<html>
<head>
	<title> Search Data by its ID </title>
	
</head>
<body style="background-color:lightgrey">
	<center>
	 <h1>Search for a single DATA/ Record from DataBase using PHP</h1>
	 <h1>Retrieve/search/fetch/data  from database</h1>
	 
	 <div class="container">
		<form action="" method="POST"
		
			<input type="varchar" name="driver_id" placeholder="Enter Driver ID">
			<input type="varchar" name="driver_id" placeholder="Enter Driver ID">
			<input type="submit" name="search" value="Search by ID">
		</form>
		<table border="1px" style="width:600px; line-height:40px; margin-left:10px; margin-top:30px; margin-bottom:100px;">
				<tr>
					<th> Driver ID </th>
					<th> Bus ID </th>
					<th> Surname </th>
					<th> First Name </th>
					<th> Second Name </th>
					<th> Phone Number </th>
					<th> Address </th>
					<th> Shift Time </th>
					<th> Date of Joining </th>
				</tr> <br>
			 <?php
			   $connection = mysqli_connect("localhost","root","");
			   $db = mysqli_select_db($connection,'brt');
			   
			   if(isset($_POST['search']))
			   {
				   $driver_id = $_POST['driver_id'];
				   $query = "SELECT * FROM driver WHERE driver_id='driver_id' LIKE";
				   $result = mysqli_query($connection, $query) or die("Error: " . mysqli_error($connection));
				   
				   while($row = mysqli_fetch_array($result))
				   {
					   ?>
					   <tr>
							<td> <?php echo $row['driver_id']?></td>
							<td> <?php echo $row['bus_id']?></td>
							<td> <?php echo $row['surname']?></td>
							<td> <?php echo $row['firstname']?></td>
							<td> <?php echo $row['secondname']?></td>
							<td> <?php echo $row['phonenumber']?></td>
							<td> <?php echo $row['address']?></td>
							<td> <?php echo $row['shift_time']?></td>
							<td> <?php echo $row['date_of_joining']?></td>
					   
					   </tr>
					   
					   
					   <?php
				   }
			   }
			 
			 ?>
		
		</table>
	 
	 </div>
	</center>


</body>
</html>