<html>
<head></head>
<body>
<?php
include('dbconnection.php');
$mloginid=$_GET['mloginid'];
$result = mysql_query("SELECT photo,name FROM reg where loginid='$mloginid'");
    if(mysql_num_rows($result) > 0){
        $imgData = mysql_fetch_assoc($result); 
if(!$imgData[photo]=="")
{?>
<img src="data:image/jpeg;base64,<?php echo base64_encode($imgData[photo]); ?>" style="width:50px;border-radius:50%" />
<?php
}
else
{
?>
<img src="img_border.png" style="width:50px;border-radius:50%" />
<?php
}
echo "<font color='red'; size='4'>".strtoupper($imgData[name])."(Online)</font>";

}
?>
</body>
</html>
