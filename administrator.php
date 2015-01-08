<!DOCTYPE html>
<head>
<style>
a:link,a:visited
{
display:block;
color:#000000;
background-color:#00bbee;
text-decoration:none;
text-align:center;
float:left;
width:49%;
}
a:hover
{
background-color:#00aaee;
}
</style>
<title>
Administrator
</title>
</head>

<body style="background-color:#f9f9f9;">
<center><img src="http://snu.edu.in/images/home/shiv-nadar-logo.gif" /></center>
<h2 style="text-align:center;">Parking Management Administrator</h2>

<?php
$link = mysqli_connect('localhost','root','laksha');
if(!$link)
{
 echo 'Could not connect to the database';
 exit();
}
if(!mysqli_select_db($link,'Parking'))
{
 echo 'Could not connect';
 exit();
}
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM administrator WHERE username='$username' AND password='$password'";
$result=mysqli_query($link,$sql);
if(!($row=mysqli_fetch_array($result)))
{
 echo 'Wrong Password Entered.';
 exit();
}
else
{
}
?>
<p style="float:right;width:15%;margin-right:10%;">
Number of Parked vehicles:
<?php
$sql = "SELECT COUNT(id) FROM slot WHERE free='n'";
$result=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($result))
 echo $row['COUNT(id)'];
?>
</p>
<p style="float:left;width:16%;margin-left:10%;">
Total number of vehicles today:
<?php
$date=date("Y-m-d",time());
$sql = "SELECT COUNT(id) FROM users WHERE enterDate<'$date'";
$result=mysqli_query($link,$sql); 
while($row=mysqli_fetch_array($result))
 echo $row['COUNT(id)'];
?>
</p>
<div style="float:left;width:80%;margin-left:10%;margin-top:20%;text-align:center;">
<a href="admin.php" style="border-right:1px solid black;border-left:1px solid black;">
<p>View All Details</p>
</a>
<a href="adminSearch.html" style="border-right:1px solid black;">
<p>Advanced Search</p>
</a>
</div>

</body>
</html>
