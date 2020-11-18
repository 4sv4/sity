<?php 
require_once('common.php');
checkUser();
echo '<title>Exec</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<br>
<center>
<p class="font-weight-normal"><a href="logout.php">LOGOULT</a></p>
<style type="text/css">
.color{
background-color:#ccc;
font:16px verdana, arial, helvetica, sans-serif; color : #fff;font-weight:700;
}
</style>
<table border="1" cellpadding="5" cellspacing="0" width="70%">
<tr>
<th width="20%" class="color">Ip</th>
<th width="50%" class="color">Host Name</th>
<th width="22%" class="color">Map</th>
<th width="22%" class="color">Online</th>
<th width="22%" class="color">Logs</th>
<th width="22%" class="color">Run</th>
</tr>
';
foreach (glob("other/servers/*") as $filename) {
$tmp=explode('`',file_get_contents($filename));
if($tmp[0]==date('jnYhi')){
echo "<tr>
<td>".$tmp[1]."</td>
<td>".$tmp[2]."</td>
<td>".$tmp[3]."</td>
<td>".$tmp[4]."</td>
<td><a href='runonserver.php?run=list&ip=".str_replace("other/servers/","",$filename)."'>set</a></td>
</tr>";
}else{
unlink($filename);
}
}
echo '</table></center><br><br>';
?>

