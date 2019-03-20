<?php
include 'cn.php';
?>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/userdesign.css" rel="stylesheet">	
</head>
<body>
	      
<?php

$con=mysqli_connect($hostname,$username, $password, $db);
 // Check connection
if (mysqli_connect_errno())
 {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
$qid = mysqli_real_escape_string($con,$_GET['var']);
$sql = "SELECT * FROM questions where ID=$qid LIMIT 1";

$result = mysqli_query($con,$sql) or trigger_error("SQL", E_USER_ERROR);
// while there are rows to be fetched...
while ($list = mysqli_fetch_assoc($result)) {
   // echo data
$ans = $list['answer'];   
$solution = $list['solution'];
$template = $list['type'];
$choice1 = $list['answer1'];
$choice2 = $list['answer2'];
$choice3 = $list['answer3'];
$choice4 = $list['answer4'];
$question = $list['question'];
} // end while

switch($template)
{
  case "B":
       $ans = $choice1 . " , ". $choice2;
      break;
  case "C":
		$ans = $choice1 . " , ". $choice2. " and " . $choice3;
     break;
  case "D":
		$ans = $choice1 . " , ". $choice2. " , " . $choice3 . " and " . $choice4;
     break;
}


 switch($template)
	 {
		 case "2":
			echo "<p class='font-style'>". $question. "</p>";   
			echo "<input type=hidden name=answer value=''> ";
			echo " <label for='radio1'><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A disabled>$choice1</label>";
			echo  "<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B disabled>$choice2</label>";
			break;
			
	    case "3":
			echo "<p class='font-style'>". $question. "</p>";   
			echo "<input type=hidden name=answer value=''><label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A disabled>$choice1</label>";
			echo  "<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B disabled>$choice2</label>";
			echo  "<label for=radio3><span class='cir'>C</span><input type=radio name=answer id=radio3 value=C disabled>$choice3</label>";
			break;
		
	   case "R":
			echo "<p class='font-style'>". $question. "</p>";   
			echo "<input type=hidden name=answer value=''><label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A disabled>$choice1</label>";
			echo  "<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B disabled>$choice2</label>";
			echo  "<label for=radio3><span class='cir'>C</span><input type=radio name=answer id=radio3 value=C disabled>$choice3</label>";
			echo  "<label for=radio4><span class='cir'>D</span><input type=radio name=answer id=radio4 value=D disabled>$choice4</label>";
			break;
			
		case "B":
			echo "<input type=hidden name=answer value=$ans>";
			$search = array("TEXTBOX1","TEXTBOX2");
			$replace = array("<input id=answer1 name=answer1 type=text maxlength=10 disabled>","<input id=answer2 name=answer2 type=text maxlength=10 disabled>"); 
			$newq = str_replace($search, $replace, $question);
			echo "<p class='font-style'>". $newq. "</p>";   
			break;
		case "C":
			$search = array("TEXTBOX1","TEXTBOX2","TEXTBOX3");
			$replace = array("<input id=answer1 name=answer1 type=text maxlength=10 disabled>","<input id=answer2 name=answer2 type=text maxlength=10 disabled>","<input id=answer3 name=answer3 type=text maxlength=10 disabled>"); 
			$newq = str_replace($search, $replace, $question);
			echo "<p class='font-style'>". $newq. "</p>";   
			break;
		case "D":
			$search = array("TEXTBOX1","TEXTBOX2","TEXTBOX3","TEXTBOX4");
			$replace = array("<input id=answer1 name=answer1 type=text maxlength=10 disabled>","<input id=answer2 name=answer2 type=text maxlength=10 disabled>",
			"<input id=answer3 name=answer3 type=text maxlength=10 disabled>","<input id=answer4 name=answer4 type=text maxlength=10 disabled>"); 
			$newq = str_replace($search, $replace, $question);
			echo "<p class='font-style'>". $newq. "</p>";
			break;
		case "A":
			$search = array("TEXTBOX1");
			$replace = array("<input id=answer name=answer type=text disabled>"); 
			$newq = str_replace($search, $replace, $question);
			echo "<p class='font-style'>". $newq. "</p>";   
			break;
		default:
			echo '<table><tr><td><p class=font-style>'. $question . '</p></td> </tr>';   
			echo "<tr><td><input id=answer name=answer type=text maxlength='10' disabled></td></tr>";
			echo "</table>";
	 }
	 echo "<br><font color='red'>Right Answer is : ". $ans . "</font>";
 unset($list);
 mysqli_free_result($result);
 mysqli_close($con);
	?>
	 
 
</body>
</html>