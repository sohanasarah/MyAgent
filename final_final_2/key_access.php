<?php session_start(); ?>
<body bgcolor="#FFF8E0">
<center>

 <form action="key_generate.php" method="post">
<input style="color: #C00000 ;width:200px;height:60px; background-color: #C0C0C0;;
border-radius: 4px;" type="submit" value='Generate OneTimePassword' name="ss" >
</form>

  <form action="index.php?l=1" method="post">
<input style="color: black;width:150px;height:40px; background-color: #C0C0C0;;
border-radius: 4px;" type="submit" value='Go Back' name="ss" >
</form>
<?php if(!isset($_POST['otp'])){ ?>
<h3 style="color: black;"> Please Enter Your OTP :</h3>
<form action='key_access.php' method='POST'>
<input style="color: black;width:300px;height:40px; background-color: #D1D0CE;;
border-radius: 4px;" type="password" name='otp_user' placeholder="Enter OTP"><br><br>

<input style="color: black;width:150px;height:40px; background-color: #C0C0C0;;
border-radius: 4px;" type="submit" value='Next' name="otp" >
</form>


<?php } 
if(isset($_POST['otp'])){
$otp_user=$_POST['otp_user'];

include"conn.php";
	

  			$sql="SELECT * FROM otp where id=1";
$result=mysql_query($sql);
while($row= mysql_fetch_array($result))
  {
  $otp_main=$row['otp'];
  
  }
  
  
  
  if (strpos($otp_main,$otp_user) !== false) {
  
  ?>
  

  <table  border="2" style="border-radius:5px;border-color:white; padding:10px;">

  
  <tr>
     <th ><span>Command ID</span></th>
    <th ><span>Key 1</span></th>
   <th ><span>Key 2</span></th>
   
  </tr>
  
  <?php
include"conn.php";
	$u=$_SESSION['u'];

  			$sql="SELECT * FROM message where tox='$u' ";
$result=mysql_query($sql);
while($row= mysql_fetch_array($result))
  {
  ?>
   <tr>

    <td style="width:80%" ><?php echo $row['id']; ?></td>
  
  <td><?php echo $row['key1']; ?></td>
<td><?php echo $row['key2']; ?></td>
 
  </tr>
  
  <?php
  }
  echo "</table>";
     
}

  else{ echo " Invalid OTP ! Access Denied !"; }

 }?>
</center>