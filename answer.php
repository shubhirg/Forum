<script type="text/javascript">
	function check(f)
	{
		if(f.ata.value=="")
		{
			document.getElementById("spuid").innerHTML = "Please, Enter Answer.";
			//alert("Please,Enter The Answer")
			f.ata.focus();
			return false;
			}
			else
			return true;
		}
</script>

<?php
	include "header.php";
	include "layout.php";
	
	
	$userid = $_SESSION['userid'];
	$sql_question = "SELECT * FROM question";
	$res_question = mysqli_query($connect, $sql_question);
	
	echo "
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
		
		echo "<td>Department:";
		echo $row_question['department'];
		echo "</td>";
		echo '</tr>';
		
		echo '<tr>';
		echo "<td>QUESTION :";
		echo $row_question['content'];
		echo "</td>";
		echo '</tr>';
		
		
		$quesid = $row_question['quesid'];
		
		echo '<tr><td>';
		  		echo '<tr><td>
		  		Answer :
		  		<form action="getanswer.php" method="POST" onsubmit="return check(this)">
				<textarea rows="4" cols="38" name="ata"></textarea><span id="spuid"></span>	
				<input type = "hidden" value = "'.$quesid.'" name = "quesid">
				<input type="submit" class="btn btn-primary" value = "Save">
				</form>
			</td></tr>';	
			echo'</td></tr>';																															
	}
	echo " 
	</table>
	</div>
	</center>";

?>
