<html>
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = " width= device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap1.js"></script>
	</head>
	<body class="full">
	<div class="rcorners2 bg-6 text-center">
<?php
	
	include "connect.php";
	
	$username = $_POST["username"];  
	$fullname = $_POST["fullname"]; 	/*value of name="" in form, Taking value from the form & storing in new var */
	$email = $_POST["email"];
	$password = $_POST["password"];
	$dob = $_POST["dob"];
	$gender = $_POST["gender"];
	$status = $_POST["status"];
	
	$sql_user = "Insert into user (username, password, fullname, email, dob, gender, status) values ('$username', '$password', '$fullname', '$email', '$dob', '$gender', '$status')";
	$res_user = mysqli_query($connect, $sql_user);
	
	$sql_userid = "SELECT * FROM user where username = '".$username."'";
	$res_userid = mysqli_query($connect, $sql_userid);
	$row_userid = mysqli_fetch_array($res_userid);
	
	if($status == "alumni"){
		
		
		$sql_type = "Insert into alumni (userid) values ('".$row_userid['userid']."')";
		$res_type = mysqli_query($connect, $sql_type);
	}
	else{
		
		$sql_type = "Insert into student (userid) values ('".$row_userid['userid']."')";
		$res_type = mysqli_query($connect, $sql_type);
	}
	
	if($res_user == true)
	{
		
		echo "Your Sign Up was Successful.";
		echo'<br>';
		echo"<a href='index.php' class='btn btn-default btn-lg'>Lets Get Started! Continue with Login.</a>";
		
	}
	else
	{
		
		echo "Registration Unsuccessful.";
		echo'<br>';
		echo"<a href='register.php' class='btn btn-default btn-lg'>Try signing up again.</a>";
	}
	
?>
</body>
</html>