<!DOCTYPE html>
<head>
<title>Admin</title>
</head>

<body style="background-color:#f9f9f9;">

<center><img src="http://snu.edu.in/images/home/shiv-nadar-logo.gif" /></center>
<h2 style="text-align:center;color:#306ab0;">Parking Managment</h2>

<!--Side slot div-->
<div id="slot" style="width:15%;margin-left:5%;border:1px solid black;float:left;text-align:center;background-color:#33c0ee;">
<p style="height:20px;font-size:23px;">
Slot
</p>
</div>

<!-- Slot Form -->
<div id="slotSortFormDiv" style="width:74%;padding-top:8px;padding-bottom:8px;margin-right:5%;float:right;border:1px solid black;">
<form id="slotForm" action="adminSlot.php" method="POST" target="iframe">
<p style="padding-left:5%;">Sort by 
<input type="radio" class="slotForm" id="slotId" name="sort" value="slot" style="margin-left:9%;">Slot ID
<input type="radio" class="slotForm" id="slotVehicle" name="sort" value="vehicle" style="margin-left:23%;">Vehicle Type
<input type="radio" class="slotForm" id="slotVacancy" name="sort" value="vacant" style="margin-left:21%;">Vacancy
</p>
</form>
</div>

<!-- Customer Form div-->
<div id="customerSortFormDiv" style="width:74%;padding-top:8px;padding-bottom:8px;margin-right:5%;float:right;border:1px solid black;display:none;">
<form id="customerSortForm" action="adminCustomer.php" method="POST" target="iframe">
<p style="padding-left:5%;">Sort by 
<input type="radio" class="customerForm" name="cust" value="id" style="margin-left:5%;">Customer ID
<input type="radio" class="customerForm" name="cust" value="name" style="margin-left:15%;">Name
<input type="radio" class="customerForm" name="cust" value="email" style="margin-left:20%;">Email id
<input type="radio" class="customerForm" name="cust" value="mobile" style="margin-left:15%;">Mobile
</p>
</form>
</div>

<!-- Current Users div-->
<div id="currentUsersDiv" style="width:74%;padding-top:8px;padding-bottom:8px;margin-right:5%;float:right;border:1px solid black;display:none;">
<p style="padding-left:5%;">
This list displays the current users
</p>
</div>

<!-- Iframe -->
<div style="width:74%;height:100%;margin-right:5%;float:right;">
<iframe id="iframe" frameborder="0" width="100%" height="70%" name="iframe"></iframe>
</div>

<!--Side customers div-->
<div id = "customer" style="width:15%;margin-left:5%;height:5%;border:1px solid black;clear:left;text-align:center;background-color:#33b0dd;">
<p style="height:20px;font-size:23px;">Customers</p>
</div>
<!--Side users div-->
<div id="currentUsers" style="width:15%;margin-left:5%;height:5%;border:1px solid black;clear:left;text-align:center;background-color:#33a0cc;">
<p style="height:20px;font-size:23px;">Current Users</p>
</div>

<script>

document.getElementById("slot").onclick = function(){
 document.getElementById("slotSortFormDiv").style.display='inline';
 document.getElementById("customerSortFormDiv").style.display='none';
 document.getElementById("currentUsersDiv").style.display='none';
 document.getElementById("iframe").src="adminSlot.php";
}
document.getElementById("customer").onclick = function(){
 document.getElementById("slotSortFormDiv").style.display='none';
 document.getElementById("customerSortFormDiv").style.display='inline';
 document.getElementById("currentUsersDiv").style.display='none';
 document.getElementById("iframe").src="adminCustomer.php";
}
document.getElementById("currentUsers").onclick = function(){
 document.getElementById("currentUsersDiv").style.display='inline';
 document.getElementById("slotSortFormDiv").style.display='none';
 document.getElementById("customerSortFormDiv").style.display='none';
 document.getElementById("iframe").src="adminCurrentUsers.php";
}

var slotButton=document.getElementsByClassName("slotForm");
var slotForm=document.getElementById("slotForm");
for(var i=0;i<slotButton.length;i++)
 slotButton[i].onclick=function(){
  slotForm.submit();
}
 var custButtons=document.getElementsByClassName("customerForm");
var customerForm=document.getElementById("customerSortForm");
for(var i=0;i<custButtons.length;i++)
 custButtons[i].onclick=function(){
  customerForm.submit();
}
</script>

</body>
</html>