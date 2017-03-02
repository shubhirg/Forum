<!DOCTYPE html>
<head>
	<style>
		* {
		  box-sizing: border-box;
		}

		#myInput {
		  background-image: url('/css/searchicon.png');
		  background-position: 10px 12px;
		  background-repeat: no-repeat;
		  width: 100%;
		  font-size: 16px;
		  padding: 12px 20px 12px 40px;
		  border: 1px solid #ddd;
		  margin-bottom: 12px;
		}

		#myUL {
		  list-style-type: none;
		  padding: 0;
		  margin: 0;
		}

		#myUL li a {
		  border: 1px solid #ddd;
		  margin-top: -1px; /* Prevent double borders */
		  background-color: #f6f6f6;
		  padding: 12px;
		  text-decoration: none;
		  font-size: 18px;
		  color: black;
		  display: block
		}

		#myUL li a.header {
		  background-color: #e2e2e2;
		  cursor: default;
		}

		#myUL li a:hover:not(.header) {
		  background-color: #eee;
		}
</style>
<?php 
include "header.php";
include "layout.php";
?>

	<script type="text/javascript">
	function checku(f)
	{
		if(f.user.value=="")
		{
			document.getElementById("u").innerHTML = "<br/>Please, Select a Username.";
			f.user.focus();
			return false;
			}
			else
			return true;
		}

		function checkq(f)
		{
			if(f.question.value=="")
			{
				document.getElementById("q").innerHTML = "<br/>Please, Enter a keyword.";
				f.question.focus();
				return false;
				}
				else
				return true;
		}

		function checkt(f)
		{
			if(f.topic.value=="")
			{
				document.getElementById("t").innerHTML = "<br/>Please, Select a Topic.";
				f.topic.focus();
				return false;
				}
				else
				return true;
		}
</script>


<body>
	

<?php
	
	$sql_topic = "SELECT * FROM  topic ";
	$res_topic = mysqli_query($connect, $sql_topic);


	$sql_user = "SELECT * FROM  user ";
	$res_user = mysqli_query($connect, $sql_user);


	echo '<table class="table-maintable">';
	echo '<form method= "Post"  action = "searchquestion.php"  onsubmit="return checkq(this)">';

		echo '
				<tr> 
				<td><input type="text" name="question" maxlength="50" placeholder = "Search a Question by a Keyword " style="color:black; margin-left:15%; width:70%;"></td>
				<span id="q"></span>
				</tr>';
			
			
			echo'	<tr><td>
				<input type="submit" value="Go"  style="margin-left:30%" >
				<input type="reset" value="Clear">
				</td></tr>
			</form>';

	echo '<form method= "Post"  action = "searchuser.php"  onsubmit="return checku(this)">';

	echo '
		
		<tr><td><span id="u"></span><br/>
			<center>Search a Alumni/Student :</center></td></tr>
			<tr><td><select name = "user" style="margin-left:30%">
			
			<option></option>';
			while( $row_user = mysqli_fetch_array($res_user )){

			echo '<option value = '.$row_user["userid"].'>'.$row_user["username"].'</option>';
			}
			echo '</select>
		</td></tr>';
		
		
		echo'	<tr><td>
			<input type="submit" value="Go" style="margin-left:30%">
			<input type="reset" value="Clear">
			</td></tr>
		</form>';
	echo '<form method= "Post"  action = "searchtopic.php"  onsubmit="return checkt(this)">';

	echo '
		
		<tr><td><span id="t"></span><br/>
			<center>Search a topic you found Interesting :</center></td></tr>
			<tr><td><select name = "topic" style="margin-left:30%">
			
			<option></option>';
			while( $row_topic = mysqli_fetch_array($res_topic )){

			echo '<option value = '.$row_topic["topicid"].'>'.$row_topic["topicname"].'</option>';
			}
			echo '</select>
		</td></tr>';
		
		
		echo'	<tr><td>
			<input type="submit" value="Go" style="margin-left:30%">
			<input type="reset" value="Clear">
			</td></tr>
		</form>';

		
		echo '</table>
		
	';
?>
