<?php
$directoria="https://".$_SERVER["HTTP_HOST"].dirname($_SERVER["SCRIPT_NAME"]);

session_start();
function random($length=100){
$characters='QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm';
$charactersLength=strlen($characters);
$randomString='';
for($i=0;$i<$length;$i++){
$randomString.=$characters[rand(0,$charactersLength-1)];
}
return $randomString;
}
function login($user,$pass){
$pfile=fopen("other/users.txt","r");
rewind($pfile);
while(!feof($pfile)){
$tmp=explode(':',fgets($pfile));
if($tmp[0]==$user){
if(trim($tmp[1])==trim($pass)){
$validUser=true;
$_SESSION['userName']=$user;
}
break;
}
}
fclose($pfile);
if($validUser==true){
$_SESSION['validUser']=true;
}else{ 
$_SESSION['validUser']=false;
}
}
function logoutUser(){
unset($_SESSION['validUser']);
unset($_SESSION['userName']);
}
function checkUser(){
if((!isset($_SESSION['validUser']))||($_SESSION['validUser']!=true)){
header('Location:login.php');
}
}
if(strpos(file_get_contents("other/users.txt"),$_SESSION['userName'])===false){
logoutUser();
}
?>

