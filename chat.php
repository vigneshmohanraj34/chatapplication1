<html>
<head>
<style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th {
    text-align: center;
}
th, td {
    padding: 1px;
    text-align: center;
}

tr:hover {background-color:red;}
  </style>

<script> 
function submitchat()
{
var unname=form1.unname.value;
var msg=form1.nag.value;
var mloginid=form1.mloginid.value;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById('chatlogs').innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open('GET','insertoffline.php?loginid='+unname+'&msg='+msg+'&mloginid='+mloginid,true);
xmlhttp.send();
}
</script>
</head>
<body bgcolor="skyblue">
<?php
include('dbconnection.php');
include('session.php');
$mloginid=$_GET['loginid'];
?>
<center><h1>OFFLINE MESSAGE SECTION</h1>
<table border="0">
<form name="form1">
<input type="hidden"  name="mloginid" value=<?php echo $mloginid;?>>
<tr><td><h2>Send offline message</tr></h2></td>
<tr><td><input type="text" name="unname" placeholder="Enter the friend Login id"/><br>
<textarea name="nag" placeholder="Enter the Message"></textarea><br>
<input type="button" value="Send" onclick="submitchat()"><br></td></tr>
</form></table></center>
<?php
$result4=mysql_query("SELECT * FROM $mloginid"."offline order by id desc") or die('error3:'.mysql_error());
$sql="update $mloginid"."offline set `check`='old' where `check`='new'";
if(!mysql_query($sql,$con))
{
die('error5:'.mysql_error());
}
echo"<center><b><h2>Recieved offline message</h2><br>";
$i=0;
if(mysql_num_rows($result4)<=0)
{
echo "<h3> No Offline message</h3>";
}
else
{
echo"<table border='5'>";
echo"<tr><td>Sno</td><td>Friendid</td><td>Message</td><td>Time</td><td>Status</td></tr>";
while($row4=mysql_fetch_array($result4))
{
echo"<tr><td>".++$i."</td><td>".$row4[1]."</td><td>".$row4[2]."</td><td>".$row4[3]."</td><td>".$row4[4]."</td></tr>";
}
echo"</table></center></b>";
}
?>
<div id="chatlogs">
</div>
</body>
</html>