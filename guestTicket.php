<!DOCTYPE html>
<html>
<head>
<title>Guest Ticket</title>
<style>
a:link,a:visited
{
display:block;
background-color:#eed000;
width:30%;
text-decoration:none;
text-align:center;
margin-left:35%;
margin-top:20%;
}
a:hover
{
background-color:#eec000;
}
</style>
</head>

<body>
<p style="margin-top:10%; font-size:24px;text-align:center;">
<?php 
$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789');
shuffle($seed);
$rand = '';
foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
echo "<img src=\"http://www.barcodes4.me/barcode/c128a/$rand.png\">";
echo "<br>Ticket number: $rand";
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
$t=$_POST["vehicle"];
$sql = "SELECT * FROM slot WHERE free='Y' AND type='$t'";
$result=mysqli_query($link,$sql);
if(!$result)
{
 echo 'Error retreiving values';
 exit();
}
$row=mysqli_fetch_array($result);
?>
</p>

<p style="margin-top:5%;font-size:26px;text-align:center;">
<?php 
if(!$row){
 echo 'No space. Please come later';
}
else{
date_default_timezone_set('Asia/Kolkata');
$etime=localtime()[2].':'.localtime()[1].':'.localtime()[0];
$edate=date("Y-m-d");
$id=$row['id'];
$sql = "INSERT INTO users VALUES('$rand','$etime','23:59:59','$edate','2099-12-31','$id')";
mysqli_query($link,$sql);
$sql = "UPDATE slot SET free='N' WHERE id='$id'";
mysqli_query($link,$sql);

$t=$_POST["vehicle"];
if($t==4)
$out = 'Car';
else if($t==2)
$out='2 Wheeler';
else if($t='H')
$out='Heavy';
echo 'You can park your '.$out.' at slot '.$row['id'];
}
?>
</p>


<center><form action="parking.php" method="get" id="parkingForm" >
<input type="text" name="id" value="<?php echo $row['id']; ?>" style="display:none" />
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
</script>
</body>
</html>