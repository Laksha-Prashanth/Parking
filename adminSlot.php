<!DOCTYPE html>
<head>
<link type="text/css" rel="stylesheet" href="table.css" />
</head>

<body>
<center>
<table style="float:left;">
<tr>
<th>Slot ID</th>
<th>Vehicle Type</th>
<th>Vacant</th>
</tr>

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
if($_POST["sort"]=='slot')
$sql = "SELECT * FROM slot ORDER BY id";
else if($_POST["sort"]=='vehicle')
$sql = "SELECT * FROM slot ORDER BY type";
else
$sql = "SELECT * FROM slot ORDER BY free";
$result = mysqli_query($link,$sql);
while($row=mysqli_fetch_array($result))
{
 if($row['id'][0]=='W')
 echo "<tr style=\"background-color:#eaffe0;\">";
 else if($row['id'][0]=='S')
 echo "<tr style=\"background-color:#fff0f0;\">";
 else if($row['id'][0]=='N')
 echo "<tr style=\"background-color:#f0f0ff;\">";
 $id=$row['id'];
 echo '<td>'.$row['id'].'</td>';
 echo '<td>'.$row['type'].'</td>';
 echo '<td>'.$row['free'].'</td>';
 echo '</tr>';
}
?>
</table>
</center>
</body>
</html>
