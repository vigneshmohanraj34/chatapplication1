<html>
<head><title>Registration page</title>
<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 15px;
}
#divlr { background:white;  width: 50%; height:  7%; float:right;}
#divll { background:#DDD;  width: 50%; height:  7%;float:left;}
#divp { background:#DDD;  width: 100%; height:  7%;float:left;}
#divt { background:#DDD;  width: 100%; height:  7%;float:left;}
#dive { background:#DDD;  width: 100%; height:  7%;float:left;}
#divp{ background:#DDD;  width: 100%; height:  7%;float:left;}
#divb{ background:#DDD;  width: 100%; height:  7%;float:left;}
</style>
</head>
<body bgcolor="skyblue">
<center><h1>REGISTRATION FOR CHAT APPLICATION</h1>
<h2>
<div id="divll">
<center>
<form action="" method=POST>
LOGIN ID:<input type="text" name="LOGINID" style="height: 30px;" required>
<input type="submit"  name="run1" value="Check Availability">
</center></div>
</form>
<?php
include('dbconnection.php');
if(isset($_POST['run1']))
{
$mloginid=$_POST['LOGINID'];
$result4=mysql_query("SELECT loginid FROM `reg` WHERE loginid='$mloginid'") or die(0);
if(mysql_num_rows($result4)==1)
{
echo"<div id='divlr'>NOT AVAILABLE</div>";
}
else
{
echo"<div id='divlr'>AVAILABLE</div>";
$mlo=$mloginid;
}}
?>
<br><br><br><br><br><br><br><br><br>
<table border="0">
<form action="redirect.php" method=POST>
<input type="hidden"  name="LOGINID" value=<?php echo $mlo;?>><tr><td>
PASSWORD:</td><td><input type="password" name="PASSWORD" style="height: 30px;" required></td></tr>
<tr>
<td>NAME:</td><td><input type="text" name="NAME"  style="height: 30px;" required></td></tr>
<tr>
<td>EMAIL ID:</td><td><input type="email" name="EMAILID" style="height: 30px;"  required></td></tr>
<tr>
<td>PHONE NO:</td><td><input type="text" name="PHONENO" style="height: 30px;" required></td></tr>
</table><br>
<input type="submit" class="button" value="Register">
</h2><br>
</form>
</body>
</html>
