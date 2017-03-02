<!DOCTYPE html>

<?php 
include "header.php";
include "layout.php";
?>

	<script type="text/javascript">
	function check(f)
	{
		if(f.ta.value=="")
		{
			document.getElementById("b").innerHTML = "Please, Enter the question.";
			f.ta.focus();
			return false;
			}
			else
			return true;
		}
</script>


<body>
<div class="text-center">

<?php
	
	$sql_topic = "SELECT * FROM  topic ";
	$res_topic = mysqli_query($connect, $sql_topic);

	echo "<table class='table-maintable'>";
	echo '<form method= "Post"  action = "getquestion.php"  onsubmit="return check(this)">';

	echo '
		
		<tr><td>
			Category:</td></tr>
			<tr><td><select name="department
			<option>--Select one--</option>
			<option value = "Cultural and Extra-Curricular">Cultural and Extra-Curricular</option>
		    <option value="Computer Science">Computer Science</option>
		    <option value="Information Technology">Information Technology</option>
		    <option value="Instrumentation">Instrumentation</option>
		    <option value="Mechanical">Mechanical</option>
			<option value="Electronics and Communication">Electronics and Communication</option>
			<option value="Electrical">Electrical</option>
		  	</select>
		</td></tr>
		  
		<tr><td>
			Topic:</td>
			</tr>
			<tr><td><select name = "topic">
			<option>--Select one--</option>';
			while( $row_topic = mysqli_fetch_array($res_topic )){

			echo '<option value = '.$row_topic["topicid"].'>'.$row_topic["topicname"].'</option>';
			}
			echo '</select>
		</td></tr>';
		
		echo '<tr><td>
			Enter your question:</td>
			</tr>
			<tr>
			<td><textarea rows="3" cols="60" name="ta"></textarea><span id="b"></span>
			</td></tr>
			<tr><td>
			<input type="submit" value="Post">
			<input type="reset" value="Clear">
			</td></tr>
		</form>
		</table>
		
	';
?>
</body>