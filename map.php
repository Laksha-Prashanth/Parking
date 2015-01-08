<!DOCTYPE html>
<head>
<title>Map</title>
</head>

<body>

<canvas id="map" width="900" height="500" style="border:1px solid black;"></canvas>
<?php echo 'hello';
?>
<script>
var c=document.getElementById("map");
var ctx=c.getContext("2d");
ctx.fillStyle="#000000";
ctx.fillRect(200,200,250,250);
<?php
 echo 'hello';
?>
</script>
</body>
</html>