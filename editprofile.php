<!doctype html>
<html>
<head>
<title>Edit Profile | Connect </title>
<?php

	include 'connect.php';
	include 'header.php';
	if(!isset($_SESSION["userid"])){

	echo "<script type='text/javascript'>alert('Please Login first to see that page');</script>";
	header("refresh:0; url = index.php");	
	
	}
?> 
</head>
<body>
<?php   
    
	$userid = $_SESSION['userid'];
	$sql_entry = "SELECT * FROM user WHERE userid = '$userid'";
	$res_entry = mysqli_query($connect,$sql_entry);
	$row_entry = mysqli_fetch_array($res_entry);
	$status = $row_entry['status'];
	
	
	

	if(mysqli_num_rows($res_entry)>0)
	{
		echo '<center><div style="width:60%">';
		echo '<table class="table table-striped" border="0">';
		echo '<form action="updateprofile.php" method="post" enctype="multipart/form-data" class="form-horizontal" >';
			
		
		echo '<input type="hidden" name="status" value="'.$status.'">';
		if($status == "alumni"){
			
			$sql_type = "SELECT * FROM alumni WHERE userid = '$userid'";
			$res_type = mysqli_query($connect,$sql_type);
			$row_type = mysqli_fetch_array($res_type);
			
			echo '<tr>';
			echo "<td>"; 
			$displaypic= $row_type['displaypic'];
			echo "<img  style='height: 140px; width: 140px' src = 'Uploads/".$row_type['displaypic']."' alt = '".$row_type['displaypic']."' class = 'img-circle' />"; /*display pic*/
			echo "</td>";
			
			echo '<td>';
			$username= $row_entry['username'];
			echo '<input type= "text" value= "'.$username.'" name= "name" readonly/> ';			/*Username*/
			echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<td>';
			echo 'Select a display picture to upload :';
			echo '<input type="file" name="displaypic" id="displaypic">';												/*displaypic*/
			echo '</td>';
			echo '</tr>';

			echo '<tr>';
			echo '<td>Email-id : ';
			echo '</td>';
			echo '<td>';
			$email = $row_entry['email'];
			echo '<input type= "email"  name= "email" placeholder = "New Email-id" value= "'.$email.'"/> ';				/*email*/
			echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<td>Password : ';
			echo '</td>';
			echo '<td>';
			$password= $row_entry['password'];
			echo '<input type="password" name="password" value="'.$password.'" id="password" placeholder = "New Password"/>';		/*password*/
			echo '</td>';
			echo '</tr>';
			
			while($row_type)
			{
				echo '<tr>';
				echo '<td>Full Name : ';
				echo '</td>';
				echo "<td>"; 
				$fullname = $row_entry['fullname']; 
				echo '<input type="text" name="fullname" value="'.$fullname.'" id="fullname"/>';				/*full name*/
				echo "</td>";
				echo '</tr>';
				
				echo '<tr>';
				echo '<td>Location : ';
				echo '</td>';
				echo "<td>"; 
				$location = $row_type['location']; 
				echo '<input type="text" name="location" value="'.$location.'" id="location"/>';				/*location*/
				echo "</td>";
				echo '</tr>';

				echo '<tr>';
				echo '<td>College of Bachelor of Enginnering : ';
				echo '</td>';
				echo "<td>"; 
				$becollege = $row_type['becollege'];
				echo '<input type="text" name="becollege" value="'.$becollege.'" id="becollege"/>';					/*becollege*/
				echo "</td>";
				echo '</tr>';
				
			
				echo '<tr>';
				echo '<td>College of Master of Enginnering : ';
				echo '</td>';
				echo "<td>"; 
				$mecollege = $row_type['mecollege'];								/*mecollege*/
				echo '<input type="text" name="mecollege" value="'.$mecollege.'" id="mecollege" />';
				echo "</td>";
				echo '</tr>';

				
				echo '<tr>';
				echo '<td>Department : ';
				echo '</td>';
				echo "<td>";
				$department = $row_type['department'];
				echo '<input type="text" name="department" value="'.$department.'" id="department" />';			/*department*/
				echo "</td>";
				echo '</tr>';

				
				echo '<tr>';
				echo '<td>Batch of (B.E)';
				echo '</td>';
				echo "<td>"; 																						/*Batch*/
				$batch = $row_type['batch'];
				echo '<input type="text" name="batch" value="'.$batch.'" id="batch" />';
				echo "</td>";
				echo '</tr>';

				echo '<tr>';
				echo '<td>Current Position';
				echo '</td>';
				echo "<td>"; 																							/*current position*/
				$currentpos = $row_type['currentpos'];
				echo '<input type="text" name="currentpos" value="'.$currentpos.'" id="currentpos" placeholder = ""/>';
				echo "</td>";
				echo '</tr>';
				
				echo "<tr>";
				echo '<td>Tell us what Topics you know about!';
				echo '</td>';
				echo "<td>"; 																								/*knows about*/
				$knows = $row_type['knows'];
				echo '<input type="text" name="knows" value="'.$knows.'" id="knows" placeholder = ""/>';
				echo "</td>";
				echo "</tr>";
				   
					
				echo '<tr>';
				echo '<td>Give us a description of Yourself';
				echo '</td>';
				echo "<td>"; 																									/*description*/
				$description = $row_type['description'];
				echo '<input type="text" name="description" value="'.$description.'" id="description" placeholder = ""/>';
				echo "</td>";
				echo '</tr>';
				
				break;
			}
		}
		
		else {																									/*student*/
			
			$sql_type = "SELECT * FROM student WHERE userid = '$userid'";
			$res_type = mysqli_query($connect,$sql_type);
			$row_type = mysqli_fetch_array($res_type);
			
			echo '<tr>';
			echo "<td>"; 
			echo "<img style='height: 140px; width: 140px'  src = 'Uploads/".$row_type['displaypic']."' alt = '".$row_type['displaypic']."' class = 'img-circle' />"; /*display pic*/
			echo "</td>";
			
			
			echo '<td>';
			$username= $row_entry['username'];
			echo '<input type= "hidden" value= "'.$username.'" name= "name" readonly/> ';			/*Username*/
			echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<td>';
			echo 'Select a display picture to upload :
				 <input type="file" name="displaypic" id="displaypic">';												/*displaypic*/
			echo '</td>';
			echo '</tr>';

			echo '<tr>';
			echo '<td>Email-id : ';
			echo '</td>';
			echo '<td>';
			$email = $row_entry['email'];
			echo '<input type= "email" value= "'.$email.'" name= "email" placeholder = ""/> ';				/*email*/
			echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<td>Password : ';
			echo '</td>';
			echo '<td>';
			$password= $row_entry['password'];
			echo '<input type="password" name="password" value="'.$password.'" id="password" />';		/*password*/
			echo '</td>';
			echo '</tr>';
			
			while($row_type)
			{
				echo '<tr>';
				echo '<td>Full Name : ';
				echo '</td>';
				echo "<td>"; 
				$fullname = $row_entry['fullname']; 
				echo '<input type="text" name="fullname" value="'.$fullname.'" id="fullname" />';				/*full name*/
				echo "</td>";
				echo '</tr>';
				
				echo '<tr>';
				echo '<td>Location : ';
				echo '</td>';
				echo "<td>"; 
				$location = $row_type['location']; 
				echo '<input type="text" name="location" value="'.$location.'" id="location"/>';				/*location*/
				echo "</td>";
				echo '</tr>';

				
				echo '<tr>';
				echo '<td>College of Bachelor of Enginnering : ';
				echo '</td>';
				echo "<td>"; 
				$becollege = $row_type['becollege'];
				echo '<input type="text" name="becollege" value="'.$becollege.'" id="becollege" />';					/*becollege*/
				echo "</td>";
				echo '</tr>';
				
			
				echo '<tr>';
				echo '<td>College of Master of Enginnering : ';
				echo '</td>';
				echo "<td>"; 
				$mecollege = $row_type['mecollege'];																			/*mecollege*/
				echo '<input type="text" name="mecollege" value="'.$mecollege.'" id="mecollege"/>';
				echo "</td>";
				echo '</tr>';

				
				echo '<tr>';
				echo '<td>Department : ';
				echo '</td>';
				echo "<td>";
				$department = $row_type['department'];
				echo '<input type="text" name="department" value="'.$department.'" id="department" />';				/*department*/
				echo "</td>";
				echo '</tr>';

				
				echo '<tr>';
				echo '<tr>';
				echo '<td>Year of college : ';
				echo '</td>';			
				echo "<td>"; 																							/*year*/
				$year = $row_type['year'];
				echo '<input type="text" name="year" value="'.$year.'" id="year"/>';
				echo "</td>";
				echo '</tr>';

				
				echo "<tr>";
				echo '<td>Tell us what Topics you know about : ';
				echo '</td>';
				echo "<td>"; 																									/*knows about*/
				$knows = $row_type['knows'];
				echo '<input type="text" name="knows" value="'.$knows.'" id="knows" />';
				echo "</td>";
				echo "</tr>";
				   
					
				echo '<tr>';
				echo '<td>Give us a description of Yourself';
				echo '</td>';
				echo "<td>"; 																									/*description*/
				$description = $row_type['description'];
				echo '<input type="text" name="description" value="'.$description.'" id="description" />';
				echo "</td>";
				echo '</tr>';
				
				break;
			}
		}
		
		echo '<tr>';
		echo '<td colspan="2">';
		echo '<center><input type="submit" class="button" name="submit"/>';
		echo '</td>';
		echo '</tr>';
		
		
		echo '</table></form>';
		echo '</div></center>';
		
	}

	
?>

</body>

</html>