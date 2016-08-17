<?php session_start(); ?>
<body bgcolor="#FFD8B0">
<style>
#bank{
    border: 3px solid red;
    padding: 30px 40px; 
   
    width: 250px;
    border-radius: 25px;
}

#bank2{
    border: 3px solid red;
    padding: 30px 40px; 
   
    width: 110px;
    border-radius: 25px;
}


#bank3{
    border: 3px solid red;
    padding: 30px 40px; 
   
    width: 90px;
    border-radius: 25px;
}

</style>


<center>
<?php
if(!isset($_POST['ss']))

{

?>


<h2>Login</h2>
<form action="index.php" METHOD="post">
	Username:<input  style="color: black;width:300px;height:40px; background-color: #C0C0C0;;
border-radius: 4px;" name="u" id="submit" class="submitButton" type="text" value="" placeholder="Username" /><br><br>

    Password:<input  style="color: black;width:300px;height:40px; background-color: #C0C0C0;;
border-radius: 4px;" name="p" id="submit" class="submitButton" type="password" value=""  placeholder="Password" /><br><br>

	<input  style="color: black;width:150px;height:40px; background-color: #C0C0C0;;
border-radius: 4px;" name="ss" id="submit" class="submitButton" type="submit" value="Login" /><br><br>

<?php } 

else {
$l=$_GET['l'];
if($l==1){
?>
<table style="width:100%">
  <tr>
    <td><div style='padding-left:20px' ><a href='command.php'><img width='150'  src='command.png'></a></div></td>
      <td><div ><a href='read.php'><img width='170' src='mail.png'></a></div></td>
  </tr>
 
</table>

<br>
<br><br><br>

      <center><div > <td><a href='key_access.php'><img width='150' src='key.png'></a>
<br><br><br>
<br>
	  
<h4><a href="logout.php" style="text-decoration: none;">Logout</a></h4>



<?php
}
else{
$u=$_POST['u'];
$p=$_POST['p'];
$l=0;
if($u=='agent1' && $p=='abc#') {$l=1; $_SESSION["u"]=1; }
if($u=='agent2' AND $p=='def#') {$l=1; $_SESSION["u"]=2; }
if($u=='agent3' AND $p=='ghi#') {$l=1; $_SESSION["u"]=3; }
if($u=='agent4' AND $p=='jkl#') {$l=1; $_SESSION["u"]=4; }

if($l==1){


?>



<table style="width:100%">
  <tr>
    <td><div style='padding-left:20px' ><a href='command.php'><img width='150'  src='command.png'></a></div></td>
      <td><div ><a href='read.php'><img width='170' src='mail.png'></a></div></td>
  </tr>
 
</table>

<br>
<br><br><br>

      <center><div > <td><a href='key_access.php'><img width='150' src='key.png'></a>
<br><br><br>
<br>
	  
<h4><a href="logout.php" style="text-decoration: none;">Logout</a></h4>


<?php

}


else{echo "
<body bgcolor='black'><center><h2 style='color:red'> Wrong Username or Password</center></h2></body>";
}

 }
 }
?>
</body>