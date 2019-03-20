<?php include 'cn.php'; 
if(isSet($_GET['username'])) 
{
$con=mysqli_connect($hostname,$username, $password, $db);
 // Check connection
if (mysqli_connect_errno())
 {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

$uname = strtolower($_GET['username']);

$sql = "SELECT UserName FROM students WHERE LOWER(UserName) = '".$uname. "' limit 1";
//echo $sql;
//exit();
$result = mysqli_query($con,$sql);
$count = $result->num_rows;
echo $count;
//exit();
mysqli_free_result($result);
mysql_close();
}
?>
