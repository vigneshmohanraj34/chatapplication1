<!DOCTYPE html>
<head>
<style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th {
    text-align: center;
}
th, td {
    padding: 1px;
    text-align: center;
}

tr:hover {background-color:#DDD;}
  </style>
<body bgcolor="skyblue">
<h1><center> Profile updation</h1>

<table>
<tr><td>Details</td><td>New Detail</td><td>Profile details</td></tr>
<tr><td> Photo</td><td>
<form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image"/>
        <input type="submit" name="submit" value="UPLOAD"/>
    </form>
<?php

include('dbconnection.php');
$loginid=$_GET['loginid'];
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $insert = mysql_query("update reg set photo='$imgContent' where loginid='$loginid'");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
}}
echo"</td><td>";
$result = mysql_query("SELECT photo FROM reg where loginid='$loginid'");
    
    if(mysql_num_rows($result) > 0){
        $imgData = mysql_fetch_assoc($result); 
// header("Content-type: image/jpg"); 
//echo $imgData['photo'];?>

<img src="data:image/jpeg;base64,<?php echo base64_encode($imgData[photo]); ?>" style="width:100px;border-radius:50%" />
<?php    
}else{
        echo 'Image not found...';
    }

?></td>
</tr>
<tr>
<td> Status</td>
<td>
<form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="status" placeholder="Enter the Name" size="25" style="height: 30px;" required>
        <input type="submit" name="submit1" value="UPLOAD"/>
    </form>
<?php

include('dbconnection.php');
$loginid=$_GET['loginid'];
$status=$_POST['status'];
if(isset($_POST["submit1"])){
$insert=mysql_query("update `reg` set mstatus='$status' where loginid='$loginid'");
        if($insert){
            echo "status uploaded successfully.";
        }else{
            echo "status upload failed, please try again.";
        } 
}

echo"</td><td>";
$result = mysql_query("SELECT mstatus FROM reg where loginid='$loginid'");
    
    if(mysql_num_rows($result) > 0){
        $imgData = mysql_fetch_assoc($result);  
echo $imgData[mstatus];    
}
?></td>
</tr>
<tr>
<td> Name</td>
<td>
<form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Enter the Name" size="25" style="height: 30px;" required>
        <input type="submit" name="submit2" value="UPLOAD"/>
    </form>
<?php

include('dbconnection.php');
$loginid=$_GET['loginid'];
$name=$_POST['name'];
if(isset($_POST["submit2"])){
$insert = mysql_query("update reg set name='$name' where loginid='$loginid'");
        if($insert){
            echo "Name uploaded successfully.";
        }else{
            echo "Name upload failed, please try again.";
        } 

}
echo"</td><td>";
$result = mysql_query("SELECT name FROM reg where loginid='$loginid'");
    
    if(mysql_num_rows($result) > 0){
        $imgData = mysql_fetch_assoc($result);  
echo $imgData[name];    
}
?></td>
</tr>
<tr>
<td> PhoneNumber</td>
<td>
<form action="" method="post" enctype="multipart/form-data">
        <input type="number" name="phone" placeholder="Enter the Phoneno" size="25" style="height: 30px;" required>
        <input type="submit" name="submit3" value="UPLOAD"/>
    </form>
<?php

include('dbconnection.php');
$loginid=$_GET['loginid'];
$phone=$_POST['phone'];
if(isset($_POST["submit3"])){
$insert = mysql_query("update reg set phoneno='$phone' where loginid='$loginid'");
        if($insert){
            echo "Phoneno uploaded successfully.";
        }else{
            echo "Phoneno upload failed, please try again.";
        } 
}

echo"</td><td>";
$result = mysql_query("SELECT phoneno FROM reg where loginid='$loginid'");
    
    if(mysql_num_rows($result) > 0){
        $imgData = mysql_fetch_assoc($result);  
echo $imgData[phoneno];    
}
?></td>
</tr>
<tr>
<td> Emailid</td>
<td>
<form action="" method="post" enctype="multipart/form-data">
        <input type="email" name="mail" placeholder="Enter the emailid" size="25" style="height: 30px;" required>
        <input type="submit" name="submit4" value="UPLOAD"/>
    </form>
<?php

include('dbconnection.php');
$loginid=$_GET['loginid'];
$emailid=$_POST['mail'];
if(isset($_POST["submit4"])){
$insert = mysql_query("update reg set emailid='$emailid' where loginid='$loginid'");
        if($insert){
            echo "Emailid uploaded successfully.";
        }else{
            echo "Emailid upload failed, please try again.";
        } }
echo"</td><td>";
$result = mysql_query("SELECT emailid FROM reg where loginid='$loginid'");
    
    if(mysql_num_rows($result) > 0){
        $imgData = mysql_fetch_assoc($result);  
echo $imgData[emailid];    
}
?></td>
</tr>
</table>
</body>
</html> 
