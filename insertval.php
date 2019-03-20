<?php include 'cn.php'; 

//function for encode and decode
class Encryption {
    var $skey = "yourSecretKey"; // you can change it

    public  function safe_b64encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }

    public function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }

    public  function encode($value){ 
        if(!$value){return false;}
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
        return trim($this->safe_b64encode($crypttext)); 
    }

    public function decode($value){
        if(!$value){return false;}
        $crypttext = $this->safe_b64decode($value); 
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }
}

$con=mysqli_connect($hostname,$username, $password, $db);
 // Check connection
if (mysqli_connect_errno())
 {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
//$converter = new Encryption;
//$encoded = $converter->encode($_POST['password']);
 
$sql="INSERT INTO students(FirstName, country, Grade, Email, UserName, Password)
 VALUES(trim('$_POST[name]'),'$_POST[country]','$_POST[grade]',trim('$_POST[email]'),'$_POST[username]','$_POST[password]')";
 //echo "sql=".$sql;

  mysqli_query($con,$sql);
  mysqli_close($con);

   if (isset($_POST['email']) ) {
    //change this to your email. 
    $to = trim($_POST['email']);
    $from = "support@BigMathBook.com"; 
    $subject = "Welcome to BigMathBook.com"; 

    //begin of HTML message 
    $message = "<html> 
  <p><span style='font-size: 11.0pt; line-height: 125%'>Hi $_POST[name],</span></p>
<p><span style='font-size: 11.0pt; line-height: 125%'>Welcome 
to BigMathBook!&nbsp; <br>
Thanks for signing up to improve your math skills at BigMathBook.com. <br>
To access your BigMathBook account you will need to first log in.&nbsp; Please 
find your log in information below:<br>
<br>
&nbsp; UserName =  $_POST[username]<br>
&nbsp; Password = $_POST[password]</span></p>
<p><span style='font-size: 11.0pt; line-height: 125%'>We look 
forward to hearing about your success with BigMathBook.com and if there are 
ever any questions, feel free to email us at
<a mailto='mailto:support@BigMathBook.com.' style='color: blue; text-decoration: underline; text-underline: single' href='mailto:support@BigMathBook.com.'>
support@BigMathBook.com.</a> <br>
<br>
Thank you for being a valued BigMathBook Member.<br>
www.BigMathBook.com</span></p>
<p><span style='font-size: 11.0pt; line-height: 125%'>&nbsp;</span></p>
<p><span style='font-size: 11.0pt; line-height: 125%'>If you 
did not sign up for BigMathBook.com someone probably mistyped their email 
address so just ignore this message.</span></p>

  </body> 
</html> ";

//end of message 
  //end of message 
   $headers = 'From: BigMathBook.com <support@BigMathBook.com>';
    $headers .= "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // now lets send the email. 
 
	mail($to, $subject, $message, $headers); 
    //echo 'Message has been sent....!'; 
}
header("Location: thankyou.php");
?>
