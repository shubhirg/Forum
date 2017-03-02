
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Sign Up | Connect </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap1.js"></script>
</head>


<?php

?>

	<body class="full">
 <nav class="navbar navbar-inverse">
  <div class="container-fluid2">
    <div class="navbar-header">
      <a href="index.php"><img src="user.png" width=90px></a>
    </div>
	 <ul class="nav navbar-nav try1 h1">
           <li><a href="register.php"><b>Sign Up</b></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right h1">
      <li><a href="login.php"><b>Login</b></a></li>
    </ul>
  </div>
</nav>
	<center>
	<form method="post" action="register_success.php" onsubmit="return checkq(this)">
		<div class="rcorners3">          
		  <table class="table">
		 
			    <tr>
					<td><input type="text" name="username" maxlength="50" autocomplete="username" placeholder="Username" style="color:black" required>
				</tr>	
			   
		      <tr>
		        <td><input type="password" name="password" maxlength="50" placeholder = "Password" style="color:black" required></td>
		      </tr>
			  
		      <tr>
		        <td><input type="text" name="fullname" maxlength="50" autocomplete="fullname" placeholder = "Fullname" style="color:black" required></td>
		      </tr>
			  
			   <tr>
		        <td> <input type="email" name="email" autocomplete= "email" placeholder = "Email" style="color:black" required></td>
		      </tr>
			  
			   <tr>
			   <td style="color:white">Birthday:</td>
			   </tr>
			   <tr>
				<td><input type = "date" name ="dob" style="color:black" required></td>
		      </tr>
			  
			  <tr>
						<td style="color:white">Gender:</td>
						</tr>
						<tr>
						<td><select type = "list" name = "gender" required>
						<option></option>
						<option value= "male" style="color:black">Male</option>
						<option value= "female" style="color:black">Female</option>
						</td>
				</tr>

				<tr>
					<td style="color:white">Status:</td>
					</tr>
					<tr>
					<td style="color:white"><input type = "radio" name = "status" value = "alumni" required>Alumni</td>
					<td style="color:white"><input type = "radio" name = "status" value = "student">Student</td>
				</tr>
							
				<tr>
				<center><td><input type = "submit" name = "submit" class="btn btn-default btn-lg" value= "Sign Up" style="color:black"></center></td>
				
				</tr>	
				
		  	</table>
		</div>
	</form>
</center>
</body>
</html>