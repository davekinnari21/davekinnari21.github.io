<?php include 'cn.php'; 

$con=mysqli_connect($hostname,$username, $password, $db);
 // Check connection
if (mysqli_connect_errno())
 {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
//$converter = new Encryption;
//$encoded = $converter->encode($_POST['password']);
 
$sql="INSERT INTO contactus(name, email, subject, message)
 VALUES(trim('$_POST[name]'),trim('$_POST[email]'),'$_POST[subject]',trim('$_POST[message]'))";
 //echo "sql=".$sql;
 mysqli_query($con,$sql);
 
 mysqli_close($con);
header("Location: thanks.php");
?>
