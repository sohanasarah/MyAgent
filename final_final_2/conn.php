<?php
$username = "myagent";
$password = "123456789a";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");

?>
<?php
//select a database to work with
$selected = mysql_select_db("myagent",$dbhandle) 
  or die("Could not select Database");
?>