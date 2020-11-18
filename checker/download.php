<?php
require_once('common.php');
if($_POST["key"]==file_get_contents("other/download/secretkey_".str_replace(":","_",$_POST["ip"]).".txt")){
$zip=new ZipArchive();
$filename="other/download/".str_replace(":","_",$_POST["ip"]).".zip";
if($zip->open($filename,ZipArchive::CREATE)!==TRUE){
exit("SASI");
}
$zip->addFromString($_POST["one"]."/".$_POST["two"],$_POST["tree"]);
$zip->close();
}
?>


