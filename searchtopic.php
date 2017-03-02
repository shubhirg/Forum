<!DOCTYPE html>
<html>
<head> 
<title>SEARCH | CONNECT </title>

<?php
	include "header.php";
	include "layout.php";
	
	
	$userid = $_SESSION['userid'];
	$topicid = $_POST['topic'];
	$sql_question = "SELECT * FROM question WHERE topicid = '".$topicid."'";
	$res_question = mysqli_query($connect, $sql_question);

	
	echo "
	<center>
	<div class='table-responsive' style='width: 60%'>
    <table class='table table-bordered'>
	";
	
	while($row_question = mysqli_fetch_array($res_question))
	{
		
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
			
			echo '<tr>';
			echo "<td>";
			echo '<tr><td>';
			$viewprofileid = $row_user["userid"];
			echo '	<img style="height: 50px; width: 50px"  src = "Uploads/'.$row_type["displaypic"].'" alt = "'.$row_type['displaypic'].'" class = "img-circle" />
				 	<br>
					<form  method = "post" action = "viewprofile.php">
					<input type= "hidden" name= "viewprofileid" value= "'.$viewprofileid.'">
					<input type = "submit" name = "viewprofile" value= "'.$row_user['username'].'">
					</form>
					Status : '.$row_user['status'].'<br>
					Says :';
			echo '</td></tr>';	
			echo '</tr>';

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
					echo '<tr>';
		echo "<td>";
			
		$allquesid = $row_question['quesid'];
		echo '
			<form  method = "post" action = "viewall.php">
			<input type= "hidden" name= "allquesid" value= "'.$allquesid.'">
			<input type = "submit" name = "viewall" value= "View all Answers">
			</form>';
		echo "</td>";
		echo '</tr>';

	}
	echo " 
	</table>
	</div>
	</center>";

	?>
	
