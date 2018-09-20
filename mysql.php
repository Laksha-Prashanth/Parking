<!DOCTYPE html>
<head>
<title>Mysql</title>
</head>

<body>
Hello
<?php echo 'World';
 $link = mysqli_connect('localhost','laksha','laksha');
 if(!$link)
 {
	echo '<br>could not connect';
  exit();
 }
if(!mysqli_select_db($link,'Parking'))
{
 echo '<br>could not connect to database';
 exit();
}
$c='W';
$t='4';
for($i=0;$i<3;$i++)
{
 if($i==1)
 {$c='S';$t='2';}
 if($i==2)
 {$c='N';$t='H';}
 for($count = 1;$count<=30;$count++)
 {
  $sql = "INSERT INTO slot VALUES('$c$count','$t','Y')";
  mysqli_query($link,$sql);
  
 }
}
$output = mysql_affected_rows($link).' rows updated';
echo '<br>'.$output;
?>
</body>
</html>
