<!DOCTYPE html>
<html>
<head>
   <link rel= "stylesheet" href= "question.css" type= "text/css"> 
<title>HOME | CONNECT </title>

<?php
	include "header.php";
	include "layout.php";

	
	$userid = $_SESSION['userid'];
	$sql_question = "SELECT * FROM question WHERE answered = '1'";
	$res_question = mysqli_query($connect, $sql_question);

	/* class='table-responsive'class='table-maintable1' */
	echo "
	<center>
	<div   class='table-responsive' style='width: 70%'>
    <table class='table-maintable1' style='width: 70%  height:100%'>
	";
	
	while($row_question = mysqli_fetch_array($res_question))
	{

		$sql_topic = "SELECT * FROM  topic  WHERE topicid IN ( SELECT topicid FROM question WHERE quesid='".$row_question['quesid']."')";  
		$res_topic = mysqli_query($connect, $sql_topic);

		while($row_topic = mysqli_fetch_array($res_topic)){

			echo "<tr><td>Topic:"; 
			echo $row_topic['topicname'];
			echo "</td></tr>";
			break;
		}
		
		echo "<td>Department:";
		echo $row_question['department'];
		echo "</td>";
		echo '</tr>';
		
		echo '<tr>';
		echo "<td>QUESTION :";
		echo $row_question['content'];
		echo "</td>";
		echo '</tr>';
		
	
		$sql_answer = "SELECT * FROM  answer  WHERE quesid='".$row_question['quesid']."'";  
		$res_answer = mysqli_query($connect, $sql_answer);
		
		$sql_user = "SELECT * FROM user  WHERE userid IN ( SELECT userid FROM answer WHERE quesid='".$row_question['quesid']."')"; 
		$res_user = mysqli_query($connect, $sql_user);
		while($row_user = mysqli_fetch_array($res_user))
		{
		
			$status = $row_user['status'];
			if($status == "alumni"){
			
				$sql_type = "SELECT * FROM alumni WHERE userid = '".$userid."'";
				$res_type = mysqli_query($connect, $sql_type);
				$row_type = mysqli_fetch_array($res_type);
			}

			else{
			
				$sql_type = "SELECT * FROM student WHERE userid = '".$userid."'";
				$res_type = mysqli_query($connect, $sql_type);
				$row_type = mysqli_fetch_array($res_type);
			}
			
			/* echo '<tr><td>'; */
			$viewprofileid = $row_user["userid"];
			echo '<div id = "user"><tr colspan= 2 ><td>	<img style="height: 50px; width: 50px"  src = "Uploads/'.$row_type["displaypic"].'" alt = "Image not loaded" class = "img-circle" /></td>
					<form  method = "post" action = "viewprofile.php">
					<input type= "hidden" name= "viewprofileid" value= "'.$viewprofileid.'" >
					<td><input type = "submit" name = "viewprofile" value= "'.$row_user['username'].'" id = "viewprofile"></td></tr>
					</form>
					<tr><td>Status : '.$row_user['status'].'</td></tr></div>
					<tr><td>Says :</td></tr>';
			/* echo '</td></tr>'; */	

			break;
		} 

			while($row_answer = mysqli_fetch_array($res_answer))
			{
				echo '<tr>';
				echo "<td>";
				echo $row_answer['content'];
				echo "</td>";
				echo '</tr>';
				break;
			}
					
			
		$allquesid = $row_question['quesid'];
		echo '<tr><td>
			<form  method = "post" action = "viewall.php">
			<input type= "hidden" name= "allquesid" value= "'.$allquesid.'">
			<input type = "submit" name = "viewall" value= "View all Answers" id = "viewallanswers">
			</form></td></tr>';

		echo '<tr><td><br></td></tr>';
	}
	echo " 
	</table>
	</div>
	</center>";

	?>
	
