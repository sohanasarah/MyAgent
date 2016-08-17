<body bgcolor="FFF8E0">
<center>
<h1 style="color: black;"> Message Decryption </h1>

<form action='dec.php' method='POST'>
Command ID : <input style="color: black;width:350px;height:40px; background-color: #C0C0C0;;
border-radius: 4px;" type="text" name='id' value='<?php echo $id=$_GET['id']; ?>'><br><br>

Key 1 : <input style="color: black;width:350px;height:60px; background-color: #C0C0C0;;
border-radius: 4px;" type="password" name='k1'><br><br>
Key 2 : <input style="color: black;width:350px;height:60px; background-color: #C0C0C0;;
border-radius: 4px;" type="password" name='k2'><br><br>


<input style="color: black;width:150px;height:40px; background-color: #C0C0C0;;
border-radius: 4px;" type="submit" value='Next' name="submit" >
</form>


<?php
if(isset($_POST['submit'])){
$id=$_POST['id'];
$ki1=$_POST['k1'];

include"conn.php";
	$sl=1;

  			$sql="SELECT * FROM message WHERE id='$id'";
$result=mysql_query($sql);
while($row= mysql_fetch_array($result))
  {
   $m=$row['message'];
    $k1=$row['key1'];
    $k2=$row['key2'];
  }
  $k1=$_POST['k1'];

  $k2=$_POST['k2'];
  
  
  
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

$k1b = decbin(ord($k1));
$k2b = decbin(ord($k2));

$xor_key=_xor($k1b,$k2b);
$key_final=$k1.$k2;
$key_64=base64_url_encode($key_final);
$command=$m;
$compaction=$key_64.$xor_key;
    include 'class.php';
$inputText = $command;
 $inputKey = $compaction;
$blockSize = 256;
$aes = new DEK($inputText, $inputKey, $blockSize);

$enc = $inputText;
$aes->setData($enc);
$dec=$aes->decrypt();
 
echo "Secret Message : <input style='color: black;width:350px;height:90px; background-color: #C0C0C0;;
border-radius: 4px;' type='text' name='command' value='$dec'><br><br>";
echo "Required Time : ";
	echo $t=t_r();
}
?>

<form action="index.php?l=1" method="post">
<input style="color: black;width:150px;height:40px; background-color: #C0C0C0;;
border-radius: 4px;" type="submit" value='Back' name="ss" >
</form>