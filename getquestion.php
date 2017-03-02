<?php 
include "connect.php";
include "header.php";



$userid = $_SESSION["userid"];
$department = $_POST['department'];
$ta = $_POST['ta'];
$topic=$_POST['topic'];


/*$sql_topic = "SELECT topicid FROM  topic WHERE topicname ='".$topic."'";
$res_topic = mysqli_query($connect, $sql_topic);	
*/

$sql_question = "INSERT INTO question ( `topicid`,`content`,`userid`, `department`) VALUES ( '$topic','$ta','$userid', '$department')";
$res_question = mysqli_query($connect,$sql_question);



	
	if($res_question == true)
	{
		
		echo "Successful";
		header("Location: userquestions.php");
		
	}
	else
	{
		
		echo "Unsuccessful";
		echo "<a href='ask.php'>Try again</a>";
	}

?>
