<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
$link=mysqli_connect('localhost','laksha','laksha');
if(!$link)
{
 echo 'Could not connect to server.';
 exit();
}
if(!mysqli_select_db($link,'Parking'))
{
 echo 'Could not connect to database';
 exit();
}

date_default_timezone_set('Asia/Kolkata');
$date=date("Y-m-d");
echo '<br>';
$time=localtime()[2].':'.localtime()[1].':'.localtime()[0];
$id=$_POST['exitTokenNo'];
$sql = "UPDATE users SET exitDate='$date', exitTime='$time' WHERE id='$id'";
mysqli_query($link,$sql);
?>
<script language="javascript">window.location.href = "finalExit.php"</script>
</body>
</html>
