<html>
<head><title>password</title>
</head>
<body bgcolor="green"><center>
<form action="#" method="post">
        <input name="newpass" type="password"  placeholder="NewPassword" required="" />
        <input name="conpass" type="password" placeholder="ConfirmPassword" required=""/>
        <input type="submit" value="Change" name="k">
</center>
</form>
<?php
if(isset($_POST['k']))
{
$pass=$_POST['newpass'];
$pass1=$_POST['conpass'];
if($pass==$pass1)
{
include('dbconnection.php');
$loginid=$_GET['loginid'];
$insert = mysql_query("update reg set password='$pass' where loginid=".$loginid);
        if($insert){
            echo "password changed successfully.";
        }

}
else
{
echo "password is not match";
}
?>
</body>
</html>