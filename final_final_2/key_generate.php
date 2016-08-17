<?php session_start();
function pp($u)
{

if($u==1){
$pp="8801988329821";
return $pp;
}

if($u==2){
$pp="8801763754615";
return $pp;
}


if($u==3){
$pp="8801988329821";
return $pp;
}

if($u==4){
$pp="8801791981040";
return $pp;
}

}



include"conn.php";
$randx=rand(11111,99999);
 mysql_query("Update otp set otp='$randx' where id=1");
 
 $u=$_SESSION['u'];
echo $p=pp($u);


$otp_s="Myagent OTP code is ".$randx;

$data = array("from" => "Myagent", "to" => $p, "text" =>$otp_s);                                                                    
$data_string = json_encode($data);                                                                                   
                                                                                                                     
$ch = curl_init('https://api.infobip.com/sms/1/text/single');  
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);                                                                    
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'accept: application/json',                                                                                
    'authorization: Basic a2hhbGlkZXg6eWQ4anduWHM=',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
echo $result;

?>
<body bgcolor="#FFF8E0">
<form action="key_access.php" method="post">
<input style="color: black;width:350px;height:40px; background-color: #C0C0C0;;
border-radius: 4px;" type="submit" value='Back' name="ss" >
</form>
<body>