<!DOCTYPE html>
<head>
<link type="text/css" rel="stylesheet" href="table.css" />
</head>

<body>

<table>
<tr>
<th>ID</th>
<th>Entry time</th>
<th>Exit time</th>
<th>Entry Date</th>
<th>Exit Date</th>
<th>Slot used</th>
</tr>
<?php 
$link=mysqli_connect('localhost','root','laksha');
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
date_default_timezone_set('Asia/Kolkata');
$time=localtime()[2].':'.localtime()[1].':'.localtime()[0];
$date=date("Y-m-d");
$sql="select * from users WHERE enterTime<='$time' and enterDate<='$date' AND exitTime>='$time' and exitDate>='$date'";
$result=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($result))
{
 echo '<tr>';
 echo '<td>'.$row['id'].'</td>';
 echo '<td>'.$row['enterTime'].'</td>';
 echo '<td>'.$row['exitTime'].'</td>';
 echo '<td>'.$row['enterDate'].'</td>';
 echo '<td>'.$row['exitDate'].'</td>';
 echo '<td>'.$row['slot'].'</td>';
 echo '</tr>';
}

?>
</table>
</body>
</html>