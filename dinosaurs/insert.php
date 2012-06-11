<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  
 mysql_select_db("kova0058", $con);
 
 $sql="INSERT INTO dinosaurs (dino_name, loves_meat, in_jurassic_park)
VALUES
('$_POST[dinoName]','$_POST[lovesMeat]','$_POST[jPark]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
  
echo "1 record added";

mysql_close($con);
?>
