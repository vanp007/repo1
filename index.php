<?php
$con = mysqli_connect("localhost", "root" , "");
mysqli_query($con,"CREATE DATABASE IF NOT EXISTS players_db");
$db = mysqli_select_db($con,"players_db");

        mysqli_query($con,"CREATE TABLE IF NOT EXISTS players (
                                      id INT(100) NOT NULL AUTO_INCREMENT,
                                      pname VARCHAR(200) DEFAULT NULL,
                                      page VARCHAR(200) DEFAULT NULL,
                                      pschool VARCHAR(200) DEFAULT NULL,

                                      PRIMARY KEY (id)) ENGINE=InnoDB;");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Player Registration</title>

	<link rel="stylesheet" type="text/css" href="css/mycss.css">
</head>
<body style="background-color: silver;">

<div id="mainwraper">
<center><h2>PLAYER REGISTRATION FORM</h2></center>


	<form class="myform" method="post" action="index.php">
		<label><b>Name:</b></label> <br>
			<input class="inputvalues" type="text" name="pname" required> <br>

		<label><b>Age:</b></label> <br>
			<input class="inputvalues" type="number" name="page" required> <br>

		<label><b>School Name:</b></label> <br>
			 <input class="inputvalues" type="text" name="pschool" required> <br><br>
		<input type="submit" id="rgster_btn" value="Register" name="submit_btn"/>
	</form> <br>
	<button id="regplayer_title"><a href="players.php">Registered Players</a></button>


<?php
if(isset($_POST['submit_btn']))
			 {
				 $pname = $_POST['pname'];
				 $page = $_POST['page'];
				 $pschool = $_POST['pschool'];
				 
				
			
					 $query = "INSERT INTO players VALUES(id,'$pname','$page','$pschool')";
					 $query_run = mysqli_query($con,$query);
					 
					 if($query_run)
					 {
						 echo '<script type="text/javascript"> alert("User Registered Successful!!!")</script>';
					 }
					 else
					 {
						  echo '<script type="text/javascript"> alert("error")</script>';
					 }
				
			 }


?>


</div>


</body>
</html>