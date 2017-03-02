<!DOCTYPE html>
<html lang = "en">

<head>
<meta charset = "utf-8">
<meta name = "viewport" content = " width= device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap1.js"></script>

<?php 
if(!isset($_SESSION["userid"])){

	echo "<script type='text/javascript'>alert('Please Login first to see that page');</script>";
	header("refresh:0; url = index.php");	
	
}
?>
</head>

<body>
<nav class="navbar navbar-inverse1">
  <div class="container-fluid2">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><img src="user.png" width="90px"></a>
    </div>
	
    <ul class="nav navbar-nav navbar-right">
      <li><a href="home.php"><b>Read</b></a></li>
	 <li><a href="answer.php"><b>Answer</b></a></li>
      <li><a href="ask.php"><b>Ask</b></a></li>
	<li><a href="search.php"><b>Search</b></a></li>	

                    <script>
                    /* When the user clicks on the button,
                    toggle between hiding and showing the dropdown content */
                    function myFunction() {
                        document.getElementById("myDropdown").classList.toggle("show");
                    }

                    // Close the dropdown if the user clicks outside of it
                    window.onclick = function(event) {
                      if (!event.target.matches('.dropbtn')) {

                        var dropdowns = document.getElementsByClassName("dropdown-content");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                          var openDropdown = dropdowns[i];
                          if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                          }
                        }
                      }
                    }
                    </script>
            </li>
         <li><a href="profile.php"><b><span class="glyphicon glyphicon-cloud"></span>Profile</b></a></li>
      <li><a href="logout.php"><b><span class="glyphicon glyphicon-hourglass"></span>Log Out</b></a></li>
    </ul>
  </div>
</nav>
	
	<div class="list-group leftmenu1">
	   <center><h3 style="color:white">Feeds</h3></center>
	   <br>
	   <center>
	   <ul class="leftmenu">
	   
		<li class="leftmenulist"><a href="cultural.php"  style="color:white">Cultural and Extra-Curricular</a></li>
         <center><h3 style="color:white">TECHNICAL</h3></center>
 <li class="leftmenulist"><a href="cs.php"  style="color:white">Computer Science</a></li>
 <li class="leftmenulist"><a href="it.php"  style="color:white">Information Technology</a></li>
  <li class="leftmenulist"><a href="mech.php"  style="color:white">Mechanical Engineering</a></li>
  <li class="leftmenulist"><a href="extc.php"  style="color:white">Electronics and Communication</a></li>
  <li class="leftmenulist"><a href="elec.php"  style="color:white">Electronics</a></li>
  <li class="leftmenulist"><a href="instru.php"  style="color:white">Instrumentation</a></li>
  </ul>
  </center>
</div>
   
</body>
</html>



