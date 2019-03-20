<?php
include 'cn.php'; 

if(isSet($_POST['username']))
{
$uname = strtolower($_POST['username']);

$con=mysqli_connect($hostname,$username, $password, $db);
 // Check connection
if (mysqli_connect_errno())
 {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

$sql = "SELECT ID FROM students WHERE LOWER(UserName) = '".$uname. "'";
$result = mysqli_query($con,$sql);
$count = $result->num_rows;

if($count > 0)
{
echo '<font color="red">The nickname <STRONG>'.$uname.'</STRONG> is already in use.</font>';
}
else
{
echo 'OK';
}

mysqli_free_result($result);
mysql_close();
}
 
?>
