<!DOCTYPE html>
<html>
<head>
<title>New Administrator</title>
</head>
<body>

<?php
$link=mysqli_connect('localhost','laksha','laksha');
if(!$link)
{
 echo 'Could not connect to the server.';
 exit();
}
if(!mysqli_select_db($link,'Parking'))
{
 echo 'Could not connect to database.';
 exit();
}
$username=$_POST['adminUsername'];
$password=$_POST['adminPassword'];
$sql = "SELECT * FROM administrator WHERE username='$username' AND  password='$password'";
$result=mysqli_query($link,$sql);
if(!($row=mysqli_fetch_array($result)))
{
 echo "<script language=\"javascript\">window.location.href = \"adminLogin.html\"</script>";
}
$username=$_POST['username'];
$password=$_POST['password'];
$sql = "SELECT * FROM administrator WHERE username='$username'";
$result=mysqli_query($link,$sql);
if($row=mysqli_fetch_array($result))
{
 echo "An administrator with that username already exists";
 exit();
}
$sql= "INSERT INTO administrator VALUES('$username','$password')";
mysqli_query($link,$sql);
?>
<center><h2>New Administrator created!</h2></center>
</body>
</html>
