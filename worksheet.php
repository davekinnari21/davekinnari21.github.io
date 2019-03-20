<?php include 'cn.php';
      //include 'top.php' ;

if (isset($_POST['skillid']) && is_numeric($_POST['skillid'])){
   $skillid = $_POST['skillid'];
}else {
	$skillid = 1;
}

$con=mysqli_connect($hostname,$username, $password, $db);
 // Check connection
if (mysqli_connect_errno())
 {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

require('WriteHTML.php');

$pdf=new PDF_HTML();

$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true, 15);

$pdf->AddPage();
//$pdf->Image('logo.png',18,13,33);
$pdf->SetFont('Arial','B',14);
$pdf->WriteHTML('<para><h1>Math Printable Worksheet</h1><br> <u>Counting 1 to 10</u></para><br><br>');

$pdf->SetFont('Arial','B',7); 
$pdf->WriteHTML('<TABLE>');

$sql = "SELECT * FROM questions where skillid=$skillid order by type";
$result = mysqli_query($con,$sql);
	
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
	$pdf->WriteHTML('<TR><TD>');
   	 switch($template)
		{
		case "2":
			$pdf->WriteHTML2('<h2><small>'. $question . '</small></h2>');   
			$pdf->WriteHTML2("<label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A disabled>$choice1</label>");
			$pdf->WriteHTML2("<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B disabled>$choice2</label>");
			break;
			
	    case "3":
			$pdf->WriteHTML2('<h2><small>'. $question . '</small></h2>'); 
			$pdf->WriteHTML2(" <label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A disabled>$choice1</label>");
			$pdf->WriteHTML2("<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B disabled>$choice2</label>");
			$pdf->WriteHTML2(" <label for=radio3><span class='cir'>C</span><input type=radio name=answer id=radio3 value=C disabled>$choice3</label>");
			break;
		 case "R":
			$pdf->WriteHTML2('<h2><small>'. $question . '</small></h2>'); 
			$pdf->WriteHTML2(" <label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A disabled>$choice1</label>");
			$pdf->WriteHTML2("<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B disabled>$choice2</label>");
			$pdf->WriteHTML2(" <label for=radio3><span class='cir'>C</span><input type=radio name=answer id=radio3 value=C disabled>$choice3</label>");
			$pdf->WriteHTML2(" <label for=radio4><span class='cir'>D</span><input type=radio name=answer id=radio4 value=D disabled>$choice4</label>");
			break;
		
				
			case "B":
				$search = array("TEXTBOX1","TEXTBOX2");
				$replace = array("<input id=answer1 name=answer1 type=text maxlength=10 disabled>","<input id=answer2 name=answer2 type=text maxlength=10 disabled>"); 
				$newq = str_replace($search, $replace, $question);
				$pdf->WriteHTML2("<h2><small>$newq</small></h2>");
				break;
			
			case "C":
				$search = array("TEXTBOX1","TEXTBOX2","TEXTBOX3");
				$replace = array("<input id=answer1 name=answer1 type=text maxlength=10 disabled>","<input id=answer2 name=answer2 type=text maxlength=10 disabled>"
				,"<input id=answer3 name=answer3 type=text maxlength=10 disabled>"); 
				$newq = str_replace($search, $replace, $question);
				$pdf->WriteHTML2("<h2><small>$newq</small></h2>");
				break;
			
			case "D":
				$search = array("TEXTBOX1","TEXTBOX2","TEXTBOX3","TEXTBOX4");
				$replace = array("<input id=answer1 name=answer1 type=text maxlength=10 disabled>","<input id=answer2 name=answer2 type=text maxlength=10 disabled>",
				"<input id=answer3 name=answer3 type=text maxlength=10 disabled>","<input id=answer4 name=answer4 type=text maxlength=10 disabled>"); 
				$newq = str_replace($search, $replace, $question);
				$pdf->WriteHTML2("<h2><small>$newq</small></h2>");
				break;
			case "A":
				$search = array("TEXTBOX1","TEXTBOXmini");
				$replace = array("<input id=answer name=answer type=text  disabled>","<input id='answer' name='answer' type='text' style='width: 30px;height:22px;padding: 1px;background-color: #FFFF00;'  disabled>"); 
				$newq = str_replace($search, $replace, $question);
				$pdf->WriteHTML2("<h2><small>$newq</small></h2>");
				break;
			
			default:
				
				$pdf->WriteHTML2('<h2><small>'. $question . '</small></h2> ');   
				$pdf->WriteHTML2("<input id=answer name=answer type=text disabled>");
		}
		$pdf->WriteHTML('</TD></TR>');
	 }
    unset($list);
	mysqli_free_result($result);
	mysqli_close($con);
	
$pdf->WriteHTML("</TABLE>");
$pdf->SetFont('Arial','B',6);
$pdf->Output(); 

?>


