<html>
<head>
<script>
function naveen(name)
{
var num=name.indexOf("(");
if(num!=-1)
{
name=name.substring(0,name.indexOf("("));
}
var mloginid=form1.mloginid.value;
/*document.writeln("<?php include('session.php'); echo $session_id;?>");*/
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById('chatlogs').innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open('GET','insert.php?floginid='+name+'&mloginid='+mloginid+'&in=2',true);
xmlhttp.send();
}

</script>
<body>
<?php
include('dbconnection.php');
$mloginid=$_GET['mloginid'];
?>
<form name="form1" >
<input type="hidden"  name="mloginid" value=<?php echo $mloginid;?>>
<?php
$result4=mysql_query("SELECT loginid FROM `reg` WHERE status='online' and loginid!='$mloginid'");
echo"ONLINE USERS<br>";
if(mysql_num_rows($result4)==0)
echo"<h2>No Online User</h2>";
else
while($row4=mysql_fetch_array($result4))
{
$sql=mysql_query("select  * from `$row4[0]` WHERE loginid ='$mloginid' && `check`='new'");
$k=$row4[0];
if(mysql_num_rows($sql)!=0)
$k=$k."(".mysql_num_rows($sql).")";
echo '<input type="button" value='.$k.' onClick=naveen(value)>';
}
?>
</body>
</html>
