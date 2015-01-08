<!DOCTYPE html>
<head>
<link type="text/css" rel="stylesheet" href="table.css" />
</head>

<body>

<table>
<tr>
<th>Customer Id</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
</tr>
<?php 
$link=mysqli_connect('localhost','root','laksha');
if(!$link)
{
 echo 'Could not connect to server.';
 exit();
}
if(!mysqli_select_db($link,'Parking'))
{
 echo 'Could not connect to database.';
 exit();
}

if($sort = $_POST['cust'])
$sql ="SELECT * FROM customers ORDER BY $sort";
else 
$sql = "SELECT * FROM customers";
$result = mysqli_query($link,$sql);

while($row=mysqli_fetch_array($result))
{
 echo '<tr>';
 echo '<td>'.$row['id'].'</td>';
 echo '<td>'.$row['name'].'</td>';
 echo '<td>'.$row['email'].'</td>';
 echo '<td>'.$row['mobile'].'</td>';
 echo '</tr>';
} 
?>
</table>
</body>
</html>