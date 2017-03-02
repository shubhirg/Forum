<?php
	
	include "connect.php";
	include "header.php";
	include "layout.php";
	
	$all = $_GET['allquesid'];
	$userid = $_SESSION['userid'];
	
	$sql_answer = "SELECT * FROM answer WHERE quesid='".$all."' AND userid= '".$userid."'";
	$res_answer = mysqli_query($connect, $sql_answer);

	$sql_question = "SELECT * FROM question WHERE quesid='".$all."'";
	$res_question = mysqli_query($connect, $sql_question);

	echo "
	<center>
	<div class='table-responsive' style='width: 60%'>
    <table class='table table-bordered'>
	";
	
	while($row_question = mysqli_fetch_array($res_question))
	{

		echo '<tr>';
		echo "<td>Question:";
		echo $row_question['content'];
		echo "</td>";
		echo '</tr>';
	}


	while($row_answer = mysqli_fetch_array($res_answer))
	{

		
			echo '<tr>';
			echo "<td>";
			echo $row_answer['content'];
			echo "</td>";
			echo '</tr>';
		
	} 

	echo '<tr>';
	echo "<td>";
		
	
	echo '
		<form  method = "post" action = "viewall.php">
		<input type= "hidden" name= "allquesid" value= "'.$all.'">
		<input type = "submit" name = "viewall" value= "View all Answers to this Question.">
		</form>';
	echo "</td>";
	echo '</tr>';

		
	echo " 
	</table>
	</div>
	</center>";

	?>
	
	