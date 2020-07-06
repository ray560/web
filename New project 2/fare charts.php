<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style1.css">
    <script src="jquery-3.4.1.min.js" charset="utf-8"></script>
    <title>BUS RAPID TRANSIT | fare charts</title>
  </head>
  <body>
    <div class="navigation">
      <nav>
        <ul>
          <li><a href="index.php">.Home</a></li>
          <li><a href="fare charts.php">.Fare Charts</a></li>
          <li><a href="gallery.php">.Gallery</a></li>
          <li><a href="about us1.php">.About Us</a></li>
          <li><a href="collect.php">.Collect</a></li>
          <li><a href="contacts.php">.Contacts</a></li>
        </ul>
      </nav>
      </div>
    <a name="records"></a>
    <div class="section" id='about1'>
      <div class="container">
        <div class="about-content">
          <div>
            <h2 class="hd"><u>FARE CHART</u></h2>
            <table border="1"  width="100%";  height="200px">
             <tr>
              <th bgcolor="lightblue">Route ID</th>
              <th bgcolor="lightblue">Bus ID</th>
			  <th bgcolor="lightblue">Departure Station</th>
			  <th bgcolor="lightblue">Arrival Station</th>
              <th bgcolor="lightblue">Departure time</th>
              <th bgcolor="lightblue">Arrival time</th>
              <th bgcolor="lightblue">Day</th>
              <th bgcolor="lightblue">Price</th>
              <th bgcolor="lightblue">County</th>
             </tr>
             
<?php
$host = "localhost";
        $user = "root";
        $pwd = "";
		$db = "brt";

$con= new mysqli ($host, $user, $pwd, $db);

//Check server connection
if ($con->connect_error){
die ("Connection failed:". $con->connect_error);
}else {
//echo "Connected successfully <br />";
}
$sql = "SELECT route_id,bus_id,departure_station,arrival_station,departure_time,arrival_time,day,price,county from chart";

$result =$con-> query($sql);

if ($result -> num_rows > 0) {
while ($row = $result -> fetch_assoc()) {
echo "<tr><td>". $row["route_id"] ."</td><td>". $row["bus_id"] . "</td><td>".  $row["departure_station"] . "</td><td>". $row["arrival_station"] . "</td><td>". $row["departure_time"] . "</td><td>". $row["arrival_time"] . "</td><td>". $row["day"]. "</td><td>". $row["price"]."</td><td>". $row["county"]. "</td></tr>" ;
}
//echo"0 result";
}
$con -> close();
?>
             

             </table>
			 
				<p>
				
				</p>
				
				<p>
				<a href="ticket.php">.Request Ticket</a>
				</p>

              <!--<button type="button">View More</button>-->
          </div>



        </div>
      </div>
    </div>
    <footer>
      <span>&copy .bus rapid transit LTD</span>
        <ul>
          <li><a href="facebook.com">.fb</a></li>
          <li><a href="instagram.com">.ig</a></li>
          <li><a href="twitter.com">.tw</a></li>
        </ul>
    </footer>
    <script src="page0.js" charset="utf-8"></script>

  </body>
</html>
