<!DOCTYPE html>
<html>
<head>
<title>New Customer</title>
</head>
<body>

<?php
$link = mysqli_connect('localhost','root','laksha');
if(!$link)
{
 echo 'There seems to be some problem with connecting to our servers.<br> Please try again later';
 exit();
}
if(!mysqli_select_db($link,'Parking'))
{
 echo 'Could not connect to database.';
 exit();
}
$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789');
shuffle($seed);
$rand = '';
foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
$seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789');
shuffle($seed);
$pin = '';
foreach (array_rand($seed, 4) as $k) $pin .= $seed[$k];

$name=$_POST['newName'];
$email=$_POST['newEmail'];
$mobile=$_POST['newMobile'];
$sql="INSERT INTO customers VALUES('$rand','$name','$email','$mobile','$pin')";
mysqli_query($link,$sql);
?>


<center><h2>New Customer created</h2></center>
<div style="border:1px solid black;width:70%;margin-left:15%;">
<p style="font-size:1.25em;margin-left:10%;">
Name:<?php echo $name;?>
<span style="float:right;margin-right:10%;">Email ID:<?php echo $email;?></span><br><br>
Mobile No:<?php echo $mobile;?>
</p>
<p style="font-size:1.40em;margin-left:10%;margin-top:5%;">
Your new ID:<?php echo $rand;?>
<span style="margin-left:10%;">Your Pin:<?php echo $pin;?></span><br>
</p>
</div>
<p>
<a href="home.html" style="text-decoration:none;font-size:1.25em;margin-left:15%;">Go back to Home</a>
</p>
</body>
</html>