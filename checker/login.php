<?php
require_once('common.php');
$error='0';
if(isset($_POST['submitBtn'])){
$username=isset($_POST['username'])?$_POST['username']:'';
$password=isset($_POST['password'])?$_POST['password']:'';
$error=login($_POST['username'],$_POST['password']);
}
if(isset($_POST['submitBtn'])){	
header('Location: index.php');
exit;
}
?>
<title>Exec</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<br><br><br><br>
<style>
.text {
border-radius: 5px;
}
</style>
<center>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="loginform">
<input style="width:230px; height:40px;" class="text" name="username" type="text"/>
<br><br>
<input style="width:230px; height:40px;" class="text" name="password" type="password"/>
<br><br>
<input  class="btn btn-primary" style="width:230px; height:40px;" type="submit" name="submitBtn" value="Login"/>
</form>
</center>

