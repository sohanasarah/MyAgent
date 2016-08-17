<?php session_start(); 
$u=$_SESSION['u'];
echo "<h6>Logged in as agent " . $u . "</h6>";
?>
<body bgcolor="#FFF8E0">
<center>


<h3 style="color: black;"> Choose a Secret Message </h3>
<br>

<table  border="2" style="border-radius:5px;border-color:black; padding:10px;">

  
  <tr>
    <th><span>Command ID</span></th>
    <th align="left"><span>Encrypted Text</span></th>
   
   
  </tr>




<?php 

include"conn.php";
	$sl=1;

  			$sql="SELECT * FROM message where tox='$u' ";
$result=mysql_query($sql);
while($row= mysql_fetch_array($result))
  {

  
  
  ?>
  
  
  
  <tr>

    <td><a href="dec.php?id=<?php echo $row['id']; ?>"><?php echo $row['id']; ?></a></td>
    <td align="justify"><a href="dec.php?id=<?php echo $row['id']; ?>"><?php echo $row['message']; ?></a></td>
  

 
  </tr>


  
<?php 
}
echo "</table>";

?>





</body>
<br>
<form action="index.php?l=1" method="post">
<input style="color: black;width:150px;height:40px; background-color: #C0C0C0;;
border-radius: 4px;" type="submit" value='Back' name="ss" >
</form>