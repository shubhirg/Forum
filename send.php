<html>
<body>
<?php include 'connect.php';
      include 'message_bar.php';
?>
	  <div>
<?php
	     if(isset($_GET['username'])&& !empty($_GET['username'])){
?>
		<form method='post'>
	 <?php
	 //if convo has already started
	 if(isset($_POST['message'])&& !empty($POST['message'])){
		 $my_id=$_session['userid'];
		 $user=$_GET['username'];
		 $random_number =rand();
		 $message=$_POST['message'];
		 
		 $check_con = mysqli_query("SELECT 'hash' FROM 'message_group' WHERE ('user_one'='$my_id' AND 'user_two'='$user' OR ('user_one'='$user' AND 'user_two'='$my_id')");
		if(mysql_num_rows($check_con)==1){
			echo "<p>conversation already started</p>";
			}
			else{
		mysqli_query("INSERT INTO message_group VALUES('$my_id','$user','$random_number')");
        mysqli_query("INSERT INTO messages VALUES('','$random_number','$my_id','$message')");
        echo "<p>conversation started</p>";		
	    }
	 }
	echo " Enter Message:<br/>
	<textarea name='message' rows='7' cols='60' ></textarea>
	<br/><br/>
	<input type='submit' value='send message'/>
	</form>";
	
		 }
else {
	echo "<b>Select a user</b>";
	$user_list=mysqli_query($connect,("SELECT 'userid','username' FROM user"));
	while($run_user=mysqli_fetch_array($user_list)){
		$user=$run_user['userid'];
		$username=$run_user['username'];
		
		echo "<p><a href='send.php?user=$user'>".$username."</a></p>";
	}
}	 
?>
	 
</div>	 
	  </body>
	  </html>
	  
	