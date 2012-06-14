<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
 mysql_select_db("movies", $con); //both database and table name is movies
 
 $sql="INSERT INTO movies (title, genre, director, release_date)
VALUES
('$_POST[title]','$_POST[genre]','$_POST[director]', '$_POST[release_date]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  
echo "1 record added";

mysql_close($con);
?>
