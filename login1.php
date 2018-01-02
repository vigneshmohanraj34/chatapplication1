<html>
<head><title>Chatwindow</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
function submitchat()
{
var mloginid=form1.mloginid.value;
var msg=form1.nag.value;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById('chatlogs').innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open('GET','insert.php?in=1'+'&mloginid='+mloginid+'&msg='+msg,true);
xmlhttp.send();
}
function autoRefreshPage()
{
var mloginid=form1.mloginid.value;
var msg=form1.nag.value;
$("#chatlogs").load("autodisplay.php?mloginid="+mloginid);
$("#div4").load("setfriend.php?mloginid="+mloginid);
$("#div41").load("photosetfriend.php?mloginid="+mloginid);
$("#div0").load("profilephoto.php?mloginid="+mloginid);
}
setInterval('autoRefreshPage()',1000);

//specific button
var windowObjectReference;
var strWindowFeatures = "menubar=no,location=no,resizable=no,scrollbars=no,status=no";

function openRequestedPopup1() {
var mloginid=form1.mloginid.value;
  windowObjectReference = window.open("chat.php?loginid="+mloginid, "CNN_WindowName", strWindowFeatures);
}
function openRequestedPopup() {
var mloginid=form1.mloginid.value; 
 windowObjectReference = window.open("setting.php?loginid="+mloginid, "CNN_WindowName", strWindowFeatures);
}
</script>
<style type="text/css">
html, body { height: 100%; padding: 0; margin: 0; }
#div01 { background:#DDD;  width: 40%; height:  10%;float:right;}
#div0 { background: #DDD;  width: 60%; height:  10%;}
#div1 { background: #DDD; top: 0%; left: 0%; right: 0%; bottom: 0% }
#div41 { background: skyblue; width: 30%; height:  25%; float: right;}
#div4 { background: #DDD; width: 30%; height:75%; float: right;}
#div5 { background: #AAA; width: 70%; height: 100%; float: left;}


.imgcir
{
border-radius:50%;
}

</style>
</head>
<body>
<?php

include('dbconnection.php'); 
    $loginid = $_POST['loginid'];
    $password = $_POST['password'];

@session_start();
$result = mysql_query("SELECT id,loginid,name FROM reg WHERE loginid= '$loginid' and password='$password'");
$row=mysql_fetch_array($result);
if(mysql_num_rows($result) !=0)
{
$sql1=mysql_query("select * from $loginid"."offline where `check`='new'");
if(mysql_num_rows($sql1)>0)
echo "<script>alert(' you received ".mysql_num_rows($sql1)." offline Message')</script>";
$_SESSION['user_id']=$row[loginid];
$result = mysql_query("update reg set status='online' where loginid='$loginid'");
?>
<div id="div01">
<p align="right"><input type="button" onClick="openRequestedPopup1()" value="Send Offline message" /><input type="button" onClick="openRequestedPopup()" value="Setting" /><font color='red'; size='4'><a href="logout.php?loginid=<?php echo $loginid; ?>">Logout</a>
</font></p>
</div>
<div id="div0">
</div>
<div id="div1">
<center>
<form name="form1" method=POST>
<input type="hidden"  name="mloginid" value=<?php echo $loginid;?> required>
Your Message<br>
<textarea name="nag" cols="100" rows="6" placeholder="enter the message"></textarea>
<input type="button" name="send" value="Send" onclick="submitchat()"><br></form> 
</div>
</center>
<div id="div5">
<div id="chatlogs">
Loading chating
</div>
</div>
<div id="div41">
</div>
<div id="div4">
</div>
<?php
}
else
{
echo"<script>alert('your are not registed please signin')</script>";
echo '<meta http-equiv="refresh" content="0; URL=login.html" />';
}
?>
</body>
</html>