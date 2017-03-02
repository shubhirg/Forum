<?php 

	require("header.php");
	require("layout.php")
?>

<?php 

	$userid = $_SESSION["userid"];
	$ata = $_POST['ata'];
	$quesid = $_POST['quesid'];

	$sql="INSERT INTO answer (quesid,content,userid) VALUES('$quesid','$ata','$userid')";
	$result=mysqli_query($connect,$sql);
	if($result)
	{
		$questionupdate = "UPDATE question SET answered = '1' WHERE quesid = '".$quesid."' ";
		$resultupdate = mysqli_query($connect,$questionupdate);
		if($resultupdate){
			echo "<script type='text/javascript'>alert('Answer completed successfully !');</script>";
			header("location:viewalluseranswer.php?allquesid=$quesid");
		}}
		else
		{
			echo "<script type='text/javascript'>alert('Answer submission was unsuccessful. Try again. !');</script>";
			header("location:answer.php");
			}
?>


