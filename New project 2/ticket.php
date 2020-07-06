
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
  
   <a name="registration"></a>
    <div class="section" id='project'>
      <div class="container">
        <div class="project-content">
          <div>
            <h2 class="hd registration"><u>TICKET REGISTRATION</u></h2>
					<form action="buyticket.php" method="post">
					  
					  <p>
					  Route ID:
					  <input type="int" name="route_id" required>
					  </p>
					  
					  <p>
					  Bus ID:
					  <input type="int" name="bus_id" required>
					  </p>
					  
					  <p>
					  Last Name:
					  <input type="text" name="lastname" required>
					  </p>
					  
					  <p>
					  First Name:
					  <input type="text" name="firstname" required>
					  </p>
					  
					  <p>
					  Middle Name:
					  <input type="text" name="middlename" required>
					  </p>
					  
					  <p>
					  Phone Number:
					  <input type="int" name="phone_no" required>
					  </p>
					  
					  <p>
					  E-mail Address:
					  <input type="varchar" name="e_mail" required>
					  </p>
					  
					  <p><a href="mpesa1.php"><input name="submit" type="submit" id="submit_btn" value="Buy ticket"/><br></p>
							
					</form>
		  </div>

				<div>
                 <img class="img" src="bus5.jpg" alt="">
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