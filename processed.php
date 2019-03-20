<?php
session_start();
$message=array();

include 'cn.php'; 

if(isset($_POST["uname"]) && isset($_POST["password"]))
{
$con=mysqli_connect($hostname,$username, $password, $db);
 // Check connection
if (mysqli_connect_errno())
 {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
$username = $_POST['uname'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string( $con, $password);

  $query="select * from students where username='$username' and password='$password'";
//echo $query;
    
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($result);
	$checkUser = $result->num_rows;
	mysqli_free_result($result);
	mysqli_close($con);

    if($checkUser > 0){
		 $_SESSION['NAME']=$row['FirstName'];
         $_SESSION['USER']=$username."/".$row['ID'];
		 		 
         echo 'correct';
    }else{
         echo ucwords('Invalid username/password');
    }
	unset($row);
}
?>

