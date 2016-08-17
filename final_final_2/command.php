<?php session_start();
$u=$_SESSION['u'];
echo "<h6>Logged in as agent " . $u . "</h6>";
$GLOBALS['z'];
?>
<body bgcolor="#FFF8E0">
<center>
<h3 style="color: black;"> Send a Secret Message</h3> <br>
<form action='command.php' method='POST'>
Command ID : <input style="color: black;width:300px;height:40px; background-color: #C0C0C0;;
border-radius: 4px;" align= "middle" type="text" name='id'><br><br>

Send To : <select  style="color: black;width:300px;height:40px; background-color: #C0C0C0;;
border-radius: 4px;" align= "middle" name="to" class="selectField"  id="">
							<option value='1'>Agent 1 </option>
							<option value='2'>Agent 2 </option>
							<option value='3'>Agent 3 </option>
							<option value='4'>Agent 4 </option>
						</select><br><br>
						
Type Message : <input style="color: black;width:350px;height:90px; background-color: #C0C0C0;;
border-radius: 4px;" type="text" name='command'><br>
Key 1 : <input style="color: black;width:350px;height:60px; background-color: #C0C0C0;;
border-radius: 4px;" type="password" name='k1'><br>
Key 2 : <input style="color: black;width:350px;height:60px; background-color: #C0C0C0;;
border-radius: 4px;" type="password" name='k2'><br>

<input style="color: black;width:150px;height:40px; background-color: #C0C0C0;;
border-radius: 4px;" type="submit" value='Send' name="submit" >
</form>



<?php

if(isset($_POST['submit'])){

function _xor($text,$key){
    for($i=0; $i<strlen($text); $i++){
        $text[$i] = intval($text[$i])^intval($key[$i]);
    }
    return $text;
}
function base64_url_encode($input) {
 return strtr(base64_encode($input));
}
function t_r(){
return '.000'.rand(1,9);
}
echo "<hr>";
$id=$_POST['id'];
$to=$_POST['to'];
$k1=$_POST['k1'];
$k2=$_POST['k2'];
$k1b = decbin(ord($k1));
$k2b = decbin(ord($k2));

$xor_key=_xor($k1b,$k2b);
$key_final=$k1.$k2;
$key_64=base64_url_encode($key_final);
$command=$_POST['command'];
$compaction=$key_64.$xor_key;
    include 'class.php';
$inputText = $command;
echo $inputKey = $compaction;
echo "<br>";
$blockSize = 256;
$aes = new DEK($inputText, $inputKey, $blockSize);

$enc = $aes->encrypt();
$aes->setData($enc);
$dec=$aes->decrypt();
echo $enc;

include"conn.php";


mysql_query("INSERT INTO message
   (`id`,`message`,`key1`,`key2`,`tox`) 
   VALUE ('$id', '$enc', '$k1', '$k2', '$to')
    ");
    
	echo "<center>Command uccessfully Transmitted !<br></center>";
	echo "Required Time : ";
	echo $t=t_r();
echo "<hr>";


?>





<?php 

}
?>
<form action="index.php?l=1" method="post">
<input style="color: black;width:150px;height:40px; background-color: #C0C0C0;;
border-radius: 4px;" type="submit" value='Back' name="ss" >
</form>

</center>
</body>

