<!DOCTYPE html>
<html lang = "en">

<head>
<meta charset = "utf-8">
<meta name = "viewport" content = " width= device-width, initial-scale=1">

<?php 
if(!isset($_SESSION["userid"])){

	echo "<script type='text/javascript'>alert('Please Login first to see that page');</script>";
	header("refresh:0; url = index.php");	
	
}
?>
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}
</style>
</head>

<body>

        

        <h1>CONNECT</h1>
        <ul>
            <li><a href= "home.php">Read</a></li>
            <li><a href= "answer.php">Answer</a></li>
			<li><a href= "ask.php">Ask</a></li>
            <li><a href= "search.php">Search</li>
            <li><a href = "profile.php">Profile</li>
			<li><a href = "logout.php">Log Out</li>
        </ul>
	
    
        <h3>Feeds</h3>
        <ul>
            <li><a href="cultural.php">Cultural and Extra-Curricular</a></li>
            <br/>Technical : <br/>
            <li><a href="cs.php">Computer Science</a></li>
            <li><a href="it.php">Information Technology</a></li>
            <li><a href="mech.php">Mechanical</a></li>
            <li><a href="extc.php">Electronics and Communication</a></li>
			<li><a href="elec.php">Electronics</a></li>
			<li><a href="instru.php">Instrumentation</a></li>
        </ul>
		
		
	


</body>
</html>
