<!doctype html>
<html>
<head>
<title>Welcome back!</title>
<style>
a:link,a:visited
{
display:block;
background-color:#eed000;
width:50%;
float:left;
text-decoration:none;
text-align:center;
margin-left:25%;
}
a:hover
{
background-color:#eec000;
}
</style>
</head>
<body>
<?php
$link = mysqli_connect('localhost','laksha','laksha');
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
$id=$_POST['loginNo'];
$pwd=$_POST['loginPin'];
$sql="SELECT * FROM customers WHERE id='$id' AND pin='$pwd'";
$result=mysqli_query($link,$sql);
if(!$result)
{
 echo "<script language=\"javascript\">window.location.href = \"home.html\"</script>";
}
$row=mysqli_fetch_array($result);
$t=$_POST['vehicle'];
$sql="SELECT * FROM slot WHERE type='$t' AND free='Y'";
$result=mysqli_query($link,$sql);
$slot=mysqli_fetch_array($result);
$id=$slot['id'];
$sql = "UPDATE slot SET free='N' WHERE id='$id'";
mysqli_query($link,$sql);
$id=$_POST['loginNo'];
$slotId=$slot['id'];
date_default_timezone_set('Asia/Kolkata');
$etime=localtime()[2].':'.localtime()[1].':'.localtime()[0];
$edate=date("Y-m-d");
$id=$row['id'];
$sql = "INSERT INTO users VALUES('$id','$etime','23:59:59','$edate','2099-12-31','$slotId')";
mysqli_query($link,$sql);
?>
<div style="border:1px solid black;width:80%;margin-left:10%;margin-top:12%;float:left;">

<h1 style="text-align:center;margin-top:2%;">
Welcome back Mr./Ms.<?php echo $row['name']; ?>
</h1>

<div style="width:26.5%;float:left;margin-left:10%;">
<p style="font-size:1.875em;">
Card Number:
<?php echo $_POST["loginNo"];?>
</p>
</div>
<div style="width:40%;float:right;margin-right:0%;">
<p style="font-size:1.875em;">
Email ID:
<?php echo $row['email']; ?>
</p>
</div>
<br>

<center><p style="clear:both;font-size:1.875em;">
You can park your <?php 
$vehicle=$_POST["vehicle"];
if($vehicle=='4')
 $vehicle='Car';
else if($vehicle=='2')
 $vehicle='2 Wheeler';
else
 $vehicle='Heavy vehicle';
echo $vehicle.' at '.$slot['id'];
?>
</p></center>
<center><form action="parking.php" method="get" id="parkingForm" >
<input type="text" name="<?php echo $row['id']; ?>" style="display:none" />
<div id="link">
<p style="font-size:28px;color:#008b45;">
Show me the Parking Lot
</p>
</div>
</form>
</center>
<script>
document.getElementById("link").onclick=function()
{
 document.getElementById("parkingForm").submit();
}
</script></div>

</body>
</html>
