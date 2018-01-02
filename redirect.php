<?php
include('dbconnection.php');
$sql="INSERT INTO reg(loginid,password,name,emailid,phoneno)VALUES('$_POST[LOGINID]','$_POST[PASSWORD]','$_POST[NAME]','$_POST[EMAILID]','$_POST[PHONENO]')";
if(!mysql_query($sql,$con))
{
die('error1:'.mysql_error());
}
$sql="CREATE TABLE `$_POST[LOGINID]` (`id` INT( 30 ) NOT NULL AUTO_INCREMENT ,`loginid` VARCHAR( 30 ) NOT NULL ,`msg` text NOT NULL ,`time` TIMESTAMP( 30 ) NOT NULL,`check` VARCHAR( 30 ) NOT NULL, PRIMARY KEY (`id` ) )";
if(!mysql_query($sql,$con))
{
die('error:'.mysql_error());
}
$sql="CREATE TABLE `$_POST[LOGINID]offline` (`id` INT( 30 ) NOT NULL AUTO_INCREMENT ,`loginid` VARCHAR( 30 ) NOT NULL ,`msg` text NOT NULL ,`time` TIMESTAMP( 30 ) NOT NULL ,`check` VARCHAR(30) NOT NULL,PRIMARY KEY (`id` ) )";
if(!mysql_query($sql,$con))
{
die('error:'.mysql_error());
}

echo"<h1>REGISTER SUCCESSFULLY REDIRECTING</h1>";
echo '<meta http-equiv="refresh" content="4; URL=register.html" />';
?>