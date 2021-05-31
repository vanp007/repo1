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

  <link rel="stylesheet" type="text/css" href="Player/css/mycss.css">
</head>
<body>

<button><a href="index.php">Home</a></button>
<button><a href="pedit.php">Edit Profile</a></button>



<div align="center" style="background-color:;"><h3>REGISTERED PLAYERS</h3> <br>

<table border="1">
    <thead>
      <tr style="background-color:teal; color:#fff;">
      <th>PLAYER NAME</th>
      <th>PLAYER AGE</th>
      <th>PLAYER SCHOOL</th>
      <th>ACTION</th>
    </tr>
    </thead>
<?php
//view players
 $query2 = "SELECT * FROM players";
          $query_run2 = mysqli_query($con,$query2);
           if(mysqli_num_rows($query_run2)>0){
            while($row = mysqli_fetch_assoc($query_run2)){

            $pid  = $row['id'];
            $pname  = $row['pname'];
            $page   = $row['page']; 
            $pschool = $row['pschool'];
?>

  <tbody>
    <tr style="background-color:orange; color:#fff;">
      <td><?= $pname ?></td>
      <td><?= $page ?></td>
      <td><?= $pschool ?></td>
      <td><?= "<a href='pedit.php?id=".$pid."'>Edit</a>" ?></td>
    </tr>
  </tbody>
<?php }} ?>
</table>
</div>

<!--?php
//view players
 $query2 = "SELECT * FROM players";
          $query_run2 = mysqli_query($con,$query2);
           if(mysqli_num_rows($query_run2)>0)
           {
            while( $row = mysqli_fetch_assoc( $query_run2 ) ){
       
       
            $pname  = $row['pname'];
            $page   = $row['page']; 
            $pschool = $row['pschool']; 
        
        echo
         
              "
              Player Name: <b>$pname</b> <br/>
              Player Age: <b>$page</b> <br/>
              Player School: <b>$pschool</b> <br/><br/><br/>
            
              ";
            
           }
         } 
?-->


</body>
</html>