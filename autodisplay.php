<html>
<head></head>
<body>
<h3>
<?php
include('dbconnection.php');
include('session.php');
$mloginid=$_GET['mloginid'];
$result=mysql_query("SELECT friendid FROM reg WHERE loginid='$mloginid'");
$row=mysql_fetch_array($result);
$result2=mysql_query("SELECT name FROM reg WHERE loginid='$row[0]'");
$row2=mysql_fetch_array($result2);
if(!strcmp($row[0],"")==0)
{
$result1=mysql_query("SELECT msg,time FROM `$row[0]` WHERE loginid ='$mloginid' order by id desc") or die('');
while($row1=mysql_fetch_array($result1))
{
echo "<font color='red'; size='5'>".$row2[0]."(".$row1[1].")"."  :  ".$row1[0]."</font><br>";
}}
?>

</h3>
</body>
</html>
