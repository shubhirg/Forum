<!DOCTYPE html>

<?php include 'connect.php';
      include 'message_bar.php';
	  include 'header.php';
	  ?>
	  <?php
	  $my_id=$_SESSION['userid'];
	  ?>
	  <br>
	  <body>
	  <div>
	  <?php
	  //hash used for scanning all the conversations
	  if(isset($_GET['hash'])&& !empty($_GET['hash'])){
		  $hash=$_get['hash'];
		  
		 $message_query = mysqli_query("SELECT 'id','from_id','message' FROM messages WHERE 'group_hash'='$hash'");
		  
		  while($run_message=mysql_fetch_array($message_query)){
			  $from_id=$run_message['from_id'];
			  $message=$run_message['message'];
			
			//diaplay the name of person who sends the message
			  $user_query=mysql_query("SELECT 'username' FROM user WHERE 'userid'='$from_id'");
			  $run_user=mysql_fetch_array($user_query);
			  $from_username=$run_user['username'];
			  
			  echo "<p><b>$from_username</b><br/>$message</p>";
	  }}
		  ?>
		  <form method='post'>
		  <?php
		    if(isset($_POST['message'])&& !empty($POST['message'])){
			$new_message=$_POST['message'];
		    mysqli_query("INSERT INTO messages VALUES('','$hash','$my_id','$new_message')");
            header('location: conversations.php?hash=$hash');
		    
			echo "Enter Message:<br/>
	       <textarea name='message' rows='6' cols='50' ></textarea>
	       <br><br>
	       <input type='submit' value='send message'/>
	       </form>";
		  
	  }else{
		  echo "select conversation";
		  $con = "SELECT * FROM message_group";				/* WHERE (`user_one`=`$my_id` OR  `user_two`=`$my_id`)*/
		  $get_con = mysqli_query($connect, $con);
		 while($run_con = mysqli_fetch_array($get_con))
		 {
			 $hash=$run_con['hash'];
			 $user_one=$run_con['user_one'];
			 $user_two=$run_con['user_two'];
//display name
              if($user_one==$my_id){
			  $select_id=$user_two;
			  }else{
				  $select_id=$user_one;
			  }
			  $user_get = mysqli_query("SELECT 'username' FROM user WHERE 'userid'='$select_
			  id')");
			  $run_user=mysql_fetch_array($user_get);
			  $select_username=$run_user['username'];
			  
			  echo "<p><a href='conversations.php?hash=$hash'>$select_username</p>";
	  }
	  }
	  ?>
	  </div>
	  </body>
	  </html>