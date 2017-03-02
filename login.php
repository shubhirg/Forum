<!DOCTYPE html>

<html lang = "en">

<head>
	<title>Log In | CONNECT </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel= "stylesheet" href= "bootstrap1.css" type= "text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="Bootstrap\bootstrap-3.3.7-dist\js\bootstrap.min.js"></script>
<?php
session_start();
if(isset($_SESSION['userid']))
{
    header('Location: home.php');
}
?>
</head>

<body class="full">
<div class="rcorners4 bg-1 text-center">
<h1><center>LOGIN</center></h1>

<form method= "post"  action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">     

<table align="center" >
	<tr>
		<td><input type="text" name="username" maxlength="50" autocomplete="username" placeholder="Username" style="color:black" required></td>
	</tr>
	<tr>
		<td><input type="password" name="password" maxlength="50" placeholder = "Password" style="color:black" required></td>
	</tr>
	<tr>
		<td><input type = "submit" name = "submit_login" value = "Log In"></td>
	</tr>
</table>

</form>
</div>

<?php
	
	include "connect.php";
	$flag = 0;
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql_user = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
		$res_user = mysqli_query($connect, $sql_user);  
		if( mysqli_num_rows( $res_user ) <=0 )
		{
			echo"<div class='rcorners2 bg-6 text-center'>";
			echo "Invalid Details.";
			echo '<br>';
			echo "Try Logging in Again";
			echo'<br>';
			echo"<a href='register.php' class='btn btn-default btn-lg'>Sign Up</a>";
		}
		else
		{
			 $row_user = mysqli_fetch_array($res_user);
			session_start();
			$_SESSION['userid'] = $row_user['userid'];
			$_SESSION['name'] = $row_user['name'];
			$_SESSION['username'] = $row_user['username'];
			header("Location: home.php");
		}
	
	} 
?>

</body>
</html>