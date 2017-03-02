<!DOCTYPE html>
<html>
<head> 
<title>HOME | CONNECT </title>

<?php
	include "header.php";
	include "layout.php";
	
	
	$userid = $_SESSION['userid'];
	$sql_question = "SELECT * FROM question WHERE userid = '".$userid."'";
	$res_question = mysqli_query($connect, $sql_question);

/*
	$sql_answer = "SELECT * FROM  answer  WHERE quesid IN ( SELECT quesid FROM question )";
	$res_answer = mysqli_query($connect, $sql_answer);
	$row_answer = mysqli_fetch_array($res_answer);
	
	$sql_user = "SELECT * FROM user WHERE userid IN ( SELECT answer.userid FROM answer,question WHERE question.quesid=answer.quesid )";
	$res_user = mysqli_query($connect, $sql_user);
	$row_user = mysqli_fetch_array($res_user);

*/
	

	echo " Your Questions :
	<center>
	<div class='table-responsive' style='width: 60%'>
    <table class='table table-bordered'>
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
		
	
		echo "<tr><td>Department:";
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
			echo '<tr>';
			echo "<td>";
			echo $row_user['username'];
			echo " Says : </td>";
			echo '</tr>';
			
			while($row_answer = mysqli_fetch_array($res_answer))
			{
				echo '<tr>';
				echo "<td>";
				echo $row_answer['content'];
				echo "</td>";
				echo '</tr>';
				break;
			}
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