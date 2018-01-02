<html>
<head></head>
<body>
<center>OnChatting<center><br>
<?php
include('dbconnection.php');
$mloginid=$_GET['mloginid'];
$result = mysql_query("SELECT friendid,status FROM reg where loginid='$mloginid'");
$row2 = mysql_fetch_array($result);
if(strcmp($row2[0],"")==0)
echo"<h2>Offline</h2>";
$result = mysql_query("SELECT photo,name,mstatus FROM reg where loginid='$row2[0]'");
    if(mysql_num_rows($result) > 0){
        $imgData = mysql_fetch_assoc($result); 
if(!$imgData[photo]=="")
{
?>

<img src="data:image/jpeg;base64,<?php echo base64_encode($imgData[photo]); ?>" style="width:50px;border-radius:50%" />
<?php
}
else
{
?>
<img src="img_border.png" style="width:50px;border-radius:50%" />
<?php
}
echo"<font color='green'; size='4'><br>Friendname :</font><font color='red'; size='4'>".strtoupper($imgData[name])."</font><br><font color='green'; size='4'> status :</font><font color='red'; size='4'>".$imgData[mstatus]."</font>";
}

$result = mysql_query("SELECT status FROM reg where loginid='$row2[0]'");

$row3 = mysql_fetch_array($result);
if(strcmp("offline",$row3[0])==0)
{
$sql=mysql_query("UPDATE reg SET friendid ='' WHERE loginid ='$mloginid'");
}
?>
</body>
</html>
