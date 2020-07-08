<?php
	session_start();
?>

<!doctype html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style1.css">
</head>
<body style="background-color:lightgrey">
	
	<div id="main-wrapper">
		<center>
		 <h2>Home Page</h2>
		 <h3>Goodbye 
		  <?php echo $_SESSION['username']?>
		 </h3>
		 <img src="images/im6.jpg" class="bus"/>
		</center>
    
	    <form class="myform" action="homepage.php" method="post">
		
		 <input name="logout" type="submit" id="logout_btn" value="Log Out"/><br>
		 <a href="page1.php"><input type="button" id="back_btn" value="Back"/></a>
	
	    </form>
		<?php
			if(isset($_POST['logout']))
			{
			  session_destroy();
			  header('location:index.php');
			}
		?>
	</div>

</body>
</html>