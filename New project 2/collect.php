<?php
	session_start();
	require'dbconfig/config.php';
?>

<!doctype html>
<html>
<head>
<title>login page</title>
<link rel="stylesheet" href="css/style1.css">
</head>
<body style="background-color:lightgrey">
	
	<div id="main-wrapper">
		<center>
		 <h2>Login Form</h2>
		 <img src="images/im6.jpg" class="bus"/>
		</center>
    
	    <form class="myform" action="collect.php" method="post">
		   <label><b>Username:</label><br>
		   <input name="username" type="text" class="inputvalues" placeholder="Type your Username" required/><br>
		   <label><b>Password:</label><br>
		   <input name="password" type="password" class="inputvalues" placeholder="Type your Password" required/><br>
		   <a href="page1.php"><input name="login" type="submit" id="login_btn" value="login"/><br>
		   <a href="index.php"><input type="button" id="back_btn" value="Back"/></a>
	
	    </form>
		<?php
			if(isset($_POST['login']))
			{
				$username = $_POST['username'];
				$password = $_POST['password'];
				$query="select * from user WHERE username='$username' AND password='$password'";
				$query_run = mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					//valid
					$_SESSION['username']=$username;
					header('location:page1.php');
				}
				else
				{
					//invalid
					echo'<script type="text/javascript"> alert("Invalid credentials!!")</script>';
				}
			}
		?>
	</div>

</body>
</html>