<!DOCTYPE html>
<html lang = "en">
<head>
<title> Search | CONNECT </title>
	<?php

		include "header.php";
		include "connect.php";
		include "layout.php";
		$userid = $_POST['user'];
	
	?>

<meta charset = "utf-8">
<meta name = "viewport" content = " width = device-width, initial-scale=1">
</head>

<body>
<?php
	
	$sql_user = "SELECT * FROM user WHERE userid = '".$userid."'";
	$res_user = mysqli_query($connect, $sql_user);
	$row_user = mysqli_fetch_array($res_user);
	$status = $row_user['status'];
	
	$sql_totalques = "SELECT count(userid) as totalques FROM question WHERE userid = '".$userid."'";
	$res_totalques = mysqli_query($connect, $sql_totalques);
	$row_totalques = mysqli_fetch_array($res_totalques);
	$totalques = $row_totalques['totalques'];
	
	$sql_totalans = "SELECT count(userid) as totalans FROM answer WHERE userid = '".$userid."'";
	$res_totalans = mysqli_query($connect, $sql_totalans);
	$row_totalans = mysqli_fetch_array($res_totalans);
	$totalans = $row_totalans['totalans'];
	
	
	if($status == "alumni"){
	
	$sql_type = "SELECT * FROM alumni WHERE userid = '".$userid."'";
	$res_type = mysqli_query($connect, $sql_type);
	$row_type = mysqli_fetch_array($res_type);
	
	echo "
	<center>
	<div class='table-responsive' style='width: 60%'>
    <table class='table table-bordered'>
	";
	while($row_type)
	{
		echo '<tr>';
		echo "<td>"; 
		echo "<img style='height: 140px; width: 140px'  src = 'Uploads/".$row_type['displaypic']."' alt = '".$row_type['displaypic']."' class = 'img-circle' />"; /*display pic*/
		echo "</td>";
		
		echo '<td>';
		echo $row_user['username'];								/*username*/
		echo "</td>";
		echo '</tr>';


		echo '<tr>';
		echo "<td>Full Name :"; 
		echo $row_user['fullname'];                   				/*full name*/
		echo "</td>";
		echo '</tr>';

		
		echo '<tr>';
		echo "<td>Location :"; 
		echo $row_type['location'];						/*location*/
		echo "</td>";
		echo '</tr>';
		

		echo '<tr>';
		echo "<td>College ( B.E ) :"; 
		echo $row_type['becollege'];						/*becollege*/
		echo "</td>";
		
		
		echo "<td>";
		
		echo "<table>";
		echo "<tr>";
		echo "<td>Number of Questions : "; 					/*Total questions*/
		echo $totalques;
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>Number of Answers : "; 					/*Total answers*/
		echo $totalans;
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>Knows About : "; 					/*knows about*/
		echo $row_type['knows'];
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		
		echo "</td>";
		echo "</tr>";
		
		echo '<tr>';
		echo "<td>College ( M.E ) :"; 
		echo $row_type['mecollege'];								/*mecollege*/
		echo "</td>";
		echo '</tr>';

		
		echo '<tr>';
		echo "<td>Department : "; 
		echo $row_type['department'];							/*department*/
		echo "</td>";
		echo '</tr>';

		
		echo '<tr>';
		echo "<td>Batch :"; 										/*Batch*/
		echo $row_type['batch'];
		echo "</td>";
		echo '</tr>';

		echo '<tr>';
		echo "<td>Current Position : "; 						/*current position*/
		echo $row_type['currentpos'];
		echo "</td>";
		echo '</tr>';
		
		   
			
		echo '<tr>';
		echo "<td>Description : "; 								/*description*/
		echo $row_type['description'];
		echo "</td>";
		echo '</tr>';
		
		break;
	}
	}
	
	else{
	
	$sql_type = "SELECT * FROM student WHERE userid = '".$userid."'";
	$res_type = mysqli_query($connect, $sql_type);
	$row_type = mysqli_fetch_array($res_type);
	
	echo "
	<center>
	<div class='table-responsive' style='width: 60%'>
    <table class='table table-bordered'>
	";
	while($row_type)
	{
		echo '<tr>';
		echo "<td>"; 
		echo "<img style='height: 140px; width: 140px'  src = 'Uploads/".$row_type['displaypic']."' alt = '".$row_type['displaypic']."' class = 'img-circle' />"; /*display pic*/
		echo "</td>";
		

		echo "<td>"; 
		echo $row_user['username'];								/*username*/
		echo "</td>";
		echo '</tr>';

		
		echo "<tr>";
		echo "<td>Full Name :"; 
		echo $row_user['fullname'];                   				/*full name*/
		echo "</td>";
		echo '</tr>';
		
	
		echo '<tr>';
		echo "<td>Location :"; 
		echo $row_type['location'];						/*location*/
		echo "</td>";
		echo '</tr>';
		
		
		echo '<tr>';
		echo "<td>College ( B.E ) :"; 
		echo $row_type['becollege'];						/*becollege*/
		echo "</td>";
		
		
		echo "<td>";
		
		echo "<table>";
		echo "<tr>";
		echo "<td>Number of Questions : "; 					/*Total questions*/
		echo $totalques;
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>Number of Answers : "; 					/*Total answers*/
		echo $totalans;
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>Knows About : "; 					/*knows about*/
		echo $row_type['knows'];
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		
		echo "</td>";
		echo "</tr>";
		
		echo '<tr>';
		echo "<td>College ( M.E ) :"; 
		echo $row_type['mecollege'];								/*mecollege*/
		echo "</td>";
		echo '</tr>';

		
		echo '<tr>';
		echo "<td>Department : "; 
		echo $row_type['department'];							/*department*/
		echo "</td>";
		echo '</tr>';

		
		echo '<tr>';
		echo "<td>Year :"; 										/*Year*/
		echo $row_type['year'];
		echo "</td>";
		echo '</tr>';

		   	
		echo '<tr>';
		echo "<td>Description : "; 								/*description*/
		echo $row_type['description'];
		echo "</td>";
		echo '</tr>';
		
		break;
	}
	}
?>
</body>
</html>
