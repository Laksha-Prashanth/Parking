<html>
<head>
<title>Parking Lot</title>
</head>
<body>
<canvas id="canvas" width="1430px" height="700" style="border:1px solid black;"></canvas>

<script>
var c=document.getElementById("canvas");
var ctx=c.getContext("2d");
var Car=new Array();
var bike=new Array();
var Heavy=new Array();

function drawArrowAt(x,y,w,h)
{
ctx.strokeStyle="#ffcc00";
ctx.strokeRect(x,y,w,h);
}

function Box(x,y,w,h,t)
{
 this.type=t;
 this.x=x;
 this.y=y;
 this.width=w;
 this.height=h;
}

ctx.fillStyle="#000000";
ctx.fillRect(0,0,100,100);
ctx.fillRect(0,600,100,100);
ctx.fillStyle="#aa0000";
ctx.strokeStyle="#ffffff";
for(var i=0;i<16;i++)
{
 bike[i]=new Box(0,102+i*31,80,30,'2');
}
for(var i=0;i<16;i++)
{
 ctx.fillRect(bike[i].x,bike[i].y,bike[i].width,bike[i].height);
 ctx.strokeText("W ".concat(i+1),bike[i].x+30,bike[i].y+20);
}

ctx.fillStyle="#00aa00";
for(i=0;i<19;i++)
{ Car[i] = new Box(100+i*51,0,50,100,'4');
 ctx.fillRect(Car[i].x,Car[i].y,Car[i].width,Car[i].height);
 ctx.strokeText("C ".concat(i+1),Car[i].x+17,Car[i].y+50);
}
for(i=0;i<13;i++)
{ Car[i+19] = new Box(102+i*51,600,50,100,'4');
 ctx.fillRect(Car[i+19].x,Car[i+19].y,Car[i+19].width,Car[i+19].height);
 ctx.strokeText("C ".concat(i+20),Car[i+19].x+17,Car[i+19].y+50);
 }
for(i=0;i<5;i++)
{  Car[i+32] = new Box(970,220+i*51,100,50,'4');
 ctx.fillRect(Car[i+32].x,Car[i+32].y,Car[i+32].width,Car[i+32].height);
 ctx.strokeText("C ".concat(i+32),Car[i+32].x+40,Car[i+32].y+30);
}
for(i=0;i<10;i++)
{
  Car[i+37] = new Box(235+51*i,245,50,100,'4');
   ctx.fillRect(Car[i+37].x,Car[i+37].y,Car[i+37].width,Car[i+37].height);
   ctx.strokeText("C ".concat(i+37),Car[i+37].x+17,Car[i+37].y+50);
  Car[i+47] = new Box(235+51*i,365,50,100,'4');
   ctx.fillRect(Car[i+47].x,Car[i+47].y,Car[i+47].width,Car[i+47].height);
   ctx.strokeText("C ".concat(i+47),Car[i+47].x+17,Car[i+47].y+50);
}
ctx.fillStyle="#0000aa";
for(i=0;i<8;i++)
{
Heavy[i] = new Box(1285,2+i*76,140,75);
ctx.fillRect(Heavy[i].x,Heavy[i].y,Heavy[i].width,Heavy[i].height);
ctx.strokeText("H ".concat(i+1),Heavy[i].x+65,Heavy[i].y+45);
}

ctx.fillStyle="#000000";
ctx.fillRect(1070,0,10,500);
ctx.fillRect(220,350,550,10);
</script>
</body>
</html>