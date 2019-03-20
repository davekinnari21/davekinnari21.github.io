<?php
$message=array();
include 'cn.php'; 

if(isset($_GET["email"]))
{
$con=mysqli_connect($hostname,$username, $password, $db);
 // Check connection
if (mysqli_connect_errno())
 {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
$email = $_GET['email'];

  $query="select FirstName,Password from students where email='$email'";
//echo $query;

    
	$result = mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($result);
	$pw = $row['Password'];
	$name = $row['FirstName'];
	$checkUser = $result->num_rows;
	
	unset($row);
	mysqli_free_result($result);
	mysqli_close($con);

    if($checkUser > 0){
	   $to = $email;
	   $subject = "BigMathBook Password"; 

    //begin of HTML message 
    $message = 	"<html><p><span style='font-size: 11.0pt; line-height: 125%'>
	Hi $name ,</span></p><p><span style='font-size: 11.0pt; line-height: 125%'>
	We have received a request to send the password associated with your email address on file to you.
Please find the password listed below.<br><br>&nbsp; Password =  $pw<br></span></p>
<p><span style='font-size: 11.0pt; line-height: 125%'>Thank you for using BigMathBook.com
</span></p> </body> </html> ";

   //end of message 
     $headers = 'From: BigMathBook.com <support@BigMathBook.com>';
    $headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // now lets send the email. 
    mail($to, $subject, $message, $headers); 
	  echo "1";
    }else{
        // echo ucwords('Not Exist');
		echo "1";
    }
}
?>

