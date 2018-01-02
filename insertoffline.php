<html>
<body>
<?php
include('dbconnection.php');
$mloginid=$_GET[mloginid];
$loginid=$_GET[loginid];
$msg=$_GET[msg];
$sql="INSERT INTO $loginid"."offline (`id`, `loginid`, `msg`,`check`) VALUES (NULL,'$mloginid','$msg','new')";
if(!mysql_query($sql,$con))
{
die('error3:'.mysql_error());
}
?>
</body>
</html>