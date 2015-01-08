<!DOCTYPE html>
<head>
<title>Hello</title>
</head>

<body>

Hello
<?php
$slots=$_POST['slot'];
$count=count($slots);
for($i=0;$i<$count;$i++)
{
 echo $slots[$i];
}
?>
</body>
</html>