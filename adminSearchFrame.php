<!DOCTYPE html>
<html>
<head>
<style>
div
{
border:1px solid black;
width:100%;
float:left;
}
#ID
{
 font-size:1.562em;
 margin-left:5%;
 float:left;
}
#type
{
 font-size:1.562em;
 float:right;
 margin-right:20%;
}
#details
{
 font-size:1.20em;
  margin-top:2%;
  margin-left:5%;
  float:left;
}
#time
{
 float:right;
 font-size:1.1em;
 margin-right:5%;
}
#date
{
 float:right;
 font-size:1.20em;
 margin-right:2%;
}
#exitDate
{
 float:right;
 font-size:1.20em;
 margin-right:3%;
}
</style>
</head>
<body>

<table style="width:100%;">

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

$sql = "SELECT slot.id,enterTime,exitTime,enterDate,exitDate,users.id,type,free FROM users,slot WHERE 1=1";

if($id=$_POST['id'])
 $sql.=" AND users.id='$id'";
if($_POST['enterHour'])
 $enterTime=$_POST['enterHour'];
else
 $enterTime='00';
if($_POST['enterMinute'])
 $enterTime.=':'.$_POST['enterMinute'];
else
 $enterTime.=':00';
if($_POST['enterSecond'])
 $enterTime.=':'.$_POST['enterSecond'];
else
 $enterTime.=':00';
$sql.=" AND enterTime>='$enterTime'";
if($_POST['exitHour'])
 $exitTime=$_POST['exitHour'];
else
 $exitTime='23';
if($_POST['exitMinute'])
 $exitTime.=':'.$_POST['exitMinute'];
else
 $exitTime.=':59';
if($_POST['exitSecond'])
 $exitTime.=':'.$_POST['exitSecond'];
else
 $exitTime.=':59';
$sql.=" AND exitTime<='$exitTime'";
if($_POST['enterYear'])
 $enterDate=$_POST['enterYear'];
else
 $enterDate='0000';
if($_POST['enterMonth']!='*')
 $enterDate.='-'.$_POST['enterMonth'];
else
 $enterDate.='-00';
if($_POST['enterDay']!='*')
 $enterDate.='-'.$_POST['enterDay'];
else
 $enterDate.='-00';
$sql.=" AND enterDate>='$enterDate'";
if($_POST['exitYear'])
 $exitDate=$_POST['exitYear'];
else
 $exitDate='2099';
if($_POST['exitMonth']!='*')
 $exitDate.='-'.$_POST['exitMonth'];
else
 $exitDate.='-12';
if($_POST['exitDay']!='*')
 $exitDate.='-'.$_POST['exitDay'];
else
 $exitDate.='-31';
$sql.=" AND exitDate<='$exitDate'";
$vehicleType=$_POST['vehicleType'];
if($vehicleType!='*')
 $sql.=" AND type='$vehicleType'";
if($slotId = $_POST['slotId'])
 $sql.=" AND slot.id='$slotId'";
$sql.=" AND users.slot=slot.id";
$result = mysqli_query($link,$sql);

while($row=mysqli_fetch_array($result))
{
 $id=$row['id'];
 $sql = "select customers.id,name,email,mobile,slot from users, customers where customers.id='$id'";
 $res=mysqli_query($link,$sql);
 $r=mysqli_fetch_array($res);
 echo $row['slot.id'];
 echo '<tr>';
 echo '<td>';
 echo '<div>';
 echo "<span id=\"ID\">";
 $id=$row['id'];
 echo "ID: $id";
 echo '</span>';
 echo "<span id=\"type\">";
 if($r['name'])
  $type='Customer';
 else
  $type='Guest';
 echo "Type: $type";
 echo '</span>';
 echo '<br><br>';
 echo "<span id=\"details\">";
 if($r['name'])
  $name=$r['name'];
 else
  $name='--';
 echo "Name: $name";
 echo '<br>';
 $slot=$row[0];
 echo "Slot: $slot";
 echo '<br>';
 $type=$row['type'];
 if($type=='H')
  $type='Heavy';
 else if($type=='2')
  $type='2 Wheeler';
 else
  $type='Car';
 echo "Vehicle Type: $type";
 echo '</span><br>';
 echo "<span id=\"time\">";
 echo $row['enterTime'];
 echo '</span>';
 echo "<span id=\"date\">";
 echo 'Enter Time: '.$row['enterDate'];
 echo '</span><br><br>';
 echo "<span id=\"time\">";
 echo $row['exitTime'];
 echo '</span>';
 echo "<span id=\"exitDate\">";
 echo 'Exit Date: '.$row['exitDate'];
 echo '</span>';
 echo '</div>';
 echo '</td>';
 echo '</tr>';
}

?>

</table>
</body>
</html>