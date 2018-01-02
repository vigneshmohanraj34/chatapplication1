<?php
include('session.php');
include('dbconnection.php');
$result = mysql_query("update reg set status='offline' where loginid='$_GET[loginid]'");
@session_start();
if(session_destroy())
{
header("Location: login.html");
}
?>