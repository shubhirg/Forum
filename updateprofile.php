<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Profile | Connect</title>
</head>

<body>
<?php

	include('header.php'); 
	$userid = $_SESSION['userid'];
	$status = $_POST['status'];

	if(isset($_POST['submit']) )	/* && move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile) */
	{

		$fullname = $_POST["fullname"]; 	
		$email = $_POST["email"];
		$password = $_POST["password"];
		$location = $_POST["location"];
		$becollege = $_POST["becollege"];
		$mecollege = $_POST["mecollege"];
		$department = $_POST["department"];
		$knows = $_POST["knows"];
		$description = $_POST["description"];
		
		$new_filename = $_FILES['displaypic']['name'];
		$uploaddir = "Uploads/";
		$uploadfile = $uploaddir . basename($new_filename);
		$uploadOk = 1;
		$imageFileType = pathinfo($uploadfile, PATHINFO_EXTENSION);
	
		if(($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") && !empty($_FILES['displaypic']['name'])) {
			echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
			$uploadOk = 0;
			header( "refresh:0 ;url=profile.php" );
		}
		
		else{
		if($status == "alumni"){
			
			$batch = $_POST["batch"];
			$currentpos = $_POST["currentpos"];
			move_uploaded_file($_FILES['displaypic']['tmp_name'], $uploadfile);

			$sql_update = 'UPDATE `user` SET `fullname`="'.$fullname.'", `password`="'.$password.'", `email` = "'.$email.'" WHERE userid = "'.$userid.'" ';
			$sql_alumni = 'UPDATE `alumni` SET `displaypic`="'.$new_filename.'", `location`= "'.$location.'", `becollege`="'.$becollege.'", `mecollege`="'.$mecollege.'", `department`="'.$department.'", `batch`="'.$batch.'", `currentpos`="'.$currentpos.'", `knows`="'.$knows.'", `description`="'.$description.'"  WHERE userid = "'.$userid.'" ';
			
			
			if(mysqli_query($connect,$sql_update) && mysqli_query($connect,$sql_alumni))
			{
				echo "<script type='text/javascript'>alert('Update Successful!');</script>";
				header( "refresh:0 ;url=profile.php" );
			}
			else
			{
				echo "<script type='text/javascript'>alert('Update Not Successful.. Please Try Again');</script>";
				header( "refresh:0 ;url=profile.php" );
			}
		}
		
		else {
			
			$year = $_POST["year"];
			$sql_update = 'UPDATE `user` SET `fullname`="'.$fullname.'", `password`="'.$password.'", `email` = "'.$email.'" WHERE userid = "'.$userid.'" ';
			$sql_student = 'UPDATE `student` SET `displaypic`="'.$new_filename.'", `location`= "'.$location.'",  `becollege`="'.$becollege.'", `mecollege`="'.$mecollege.'", `department`="'.$department.'", `year`="'.$year.'", `knows`="'.$knows.'", `description`="'.$description.'"  WHERE userid = "'.$userid.'" ';
			
			if(mysqli_query($connect,$sql_update) && mysqli_query($connect,$sql_student))
			{
				echo "<script type='text/javascript'>alert('Update Successful!');</script>";
				header( "refresh:0 ;url=profile.php" );
			}
			else
			{
				echo "<script type='text/javascript'>alert('Update Not Successful.. Please Try Again');</script>";
				header( "refresh:0 ;url=profile.php" );
			}
		}
	}
}
?>
</body>
</html>

