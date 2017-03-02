<?php 
require("header.php");
require("layout.php");
?>


<?php 

	
$str="SELECT * from question, user where  user.userid=question.userid AND quesid=$_GET[quesid]";
	$result=mysqli_query($str);
	
	$no_rows = mysql_num_rows($result);
	$topic="";
	
	if ($no_rows > 0)
	{	
		while($row = mysql_fetch_array($result))
		{
			
			
			$head = $row_question['topic'];
			echo "<h4>";
			echo $topic;	
			echo "</h4>";
			
			
			echo "<table>";
			echo "<tr><td valign='top' width='100px'>
				
				<br/>
			$row_user['username']
			<td valign='top'>
			<b>$topic</b><br/>
			
			$row_question['content']</tr>";
			
			
			echo "</table>";
		}
		
	}
?>

<?php
	$sql="select * from answer,user where quesid=$_GET[quesid] and answer.userid=user.userid";

	$result=mysqli_query($sql);
	$no_rows = mysql_num_rows($result);
	
	if ($no_rows > 0)
	{	
		
		while($row1 = mysql_fetch_array($result))
		{
			
			
			echo "<a href='answer.php?id=$_GET[quesid]'>REPLY</a>"
	
			echo "<table>";
						echo "<tr><td valign='top' width='100px'>
			                  <br/>
			                  $row_user['username']<td valign='top'><b>TOPIC : $topic</b><br/>$row_answer['content']</tr>";
			
			echo "</table>";	
			
		}
	}
		
?>

