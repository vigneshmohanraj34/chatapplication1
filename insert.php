<html>
<head><title></title>
</head>
<body>
<?php
include('dbconnection.php');
$in=$_GET[in];
$mloginid=$_GET[mloginid];
if($in==1)
{
$msg=$_GET[msg];
$result2 = mysql_query("SELECT friendid FROM reg where loginid= '$mloginid'");
$row2=mysql_fetch_array($result2);
$sql="INSERT INTO `chat`.`$mloginid` (`id`, `loginid`, `msg`,`check`) VALUES (NULL,'$row2[0]','$msg','new')";
echo "<h2><font color='red'; size='6'>sent successfully you:".$msg."</h2></font><br><h3>";
$result21=mysql_query("SELECT name FROM reg WHERE loginid='$row2[0]'");
$row21=mysql_fetch_array($result21);
if(!mysql_query($sql,$con))
{
die('error3:'.mysql_error());
}
if(!strcmp($row2[0],"")==0)
{
$result=mysql_query("SELECT msg,time FROM `$row2[0]` WHERE loginid ='$mloginid' order by id desc");
$sql=mysql_query("UPDATE `$row2[0]` SET `check` ='old' WHERE `check`='new' && loginid ='$mloginid'");
if(!$sql)
{
echo mysql_error();
}

while($row=mysql_fetch_array($result))
{
echo "<font color='red'; size='5'>".$row21[0]."(".$row[1].")".":".$row[0]."</font><br>";
}}}
else
{
$floginid=$_GET[floginid];
$sql="UPDATE reg SET friendid ='$floginid' WHERE loginid ='$mloginid'";
if(!mysql_query($sql,$con))
{
die('error5:'.mysql_error());
}}
echo"</h3>";
?>
</body>
</html>