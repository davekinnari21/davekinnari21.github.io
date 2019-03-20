<?php include 'cn.php';
      

if (isset($_POST['skillid']) && is_numeric($_POST['skillid'])){
   $skillid = $_POST['skillid'];
}else {
	$skillid = 1;
}
$filename = 'worksheet\WORKSHEET'. $skillid .'.html';

$con=mysqli_connect($hostname,$username, $password, $db);
 // Check connection
if (mysqli_connect_errno())
 {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 
 //CHECK FILE EXIST OR NOT
 
 if (!file_exists ( $filename))
 { 

$fileHandle = fopen($filename, 'w') or die("file could not be accessed/created");
$textInsert = "<html><tbody><h1>WorkSheet</h1><br><h2>counting up to 10<h2><br><table>";

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
	$textInsert = $textInsert .'<TR><TD>';
   	 switch($template)
		{
		case "2":
			$textInsert = $textInsert . '<h2><small>'. $question . '</small></h2>';   
			$textInsert = $textInsert ."<label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A disabled>$choice1</label>";
			$textInsert = $textInsert ."<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B disabled>$choice2</label>";
			break;
			
	    case "3":
			$textInsert = $textInsert .'<h2><small>'. $question . '</small></h2>'; 
			$textInsert = $textInsert ." <label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A disabled>$choice1</label>";
			$textInsert = $textInsert ."<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B disabled>$choice2</label>";
			$textInsert = $textInsert ." <label for=radio3><span class='cir'>C</span><input type=radio name=answer id=radio3 value=C disabled>$choice3</label>";
			break;
		 case "R":
			$textInsert = $textInsert .'<h2><small>'. $question . '</small></h2>'; 
			$textInsert = $textInsert ." <label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A disabled>$choice1</label>";
			$textInsert = $textInsert ."<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B disabled>$choice2</label>";
			$textInsert = $textInsert ." <label for=radio3><span class='cir'>C</span><input type=radio name=answer id=radio3 value=C disabled>$choice3</label>";
			$textInsert = $textInsert ." <label for=radio4><span class='cir'>D</span><input type=radio name=answer id=radio4 value=D disabled>$choice4</label>";
			break;
						
			case "B":
				$search = array("TEXTBOX1","TEXTBOX2");
				$replace = array("<input id=answer1 name=answer1 type=text maxlength=10 disabled>","<input id=answer2 name=answer2 type=text maxlength=10 disabled>"); 
				$newq = str_replace($search, $replace, $question);
				$textInsert = $textInsert ."<h2><small>$newq</small></h2>";
				break;
			
			case "C":
				$search = array("TEXTBOX1","TEXTBOX2","TEXTBOX3");
				$replace = array("<input id=answer1 name=answer1 type=text maxlength=10 disabled>","<input id=answer2 name=answer2 type=text maxlength=10 disabled>"
				,"<input id=answer3 name=answer3 type=text maxlength=10 disabled>"); 
				$newq = str_replace($search, $replace, $question);
				$textInsert = $textInsert ."<h2><small>$newq</small></h2>";
				break;
			
			case "D":
				$search = array("TEXTBOX1","TEXTBOX2","TEXTBOX3","TEXTBOX4");
				$replace = array("<input id=answer1 name=answer1 type=text maxlength=10 disabled>","<input id=answer2 name=answer2 type=text maxlength=10 disabled>",
				"<input id=answer3 name=answer3 type=text maxlength=10 disabled>","<input id=answer4 name=answer4 type=text maxlength=10 disabled>"); 
				$newq = str_replace($search, $replace, $question);
				$textInsert = $textInsert ."<h2><small>$newq</small></h2>";
				break;
			case "A":
				$search = array("TEXTBOX1","TEXTBOXmini");
				$replace = array("<input id=answer name=answer type=text  disabled>","<input id='answer' name='answer' type='text' style='width: 30px;height:22px;padding: 1px;background-color: #FFFF00;'  disabled>"); 
				$newq = str_replace($search, $replace, $question);
				$textInsert = $textInsert ."<h2><small>$newq</small></h2>";
				break;
			
			default:
				
				$textInsert = $textInsert .'<h2><small>'. $question . '</small></h2> ';   
				$textInsert = $textInsert ."<input id=answer name=answer type=text disabled>";
		}
		$textInsert = $textInsert .'</TD></TR>';
	 }
    unset($list);
	mysqli_free_result($result);
	
$textInsert = $textInsert .'</TABLE></tbody></HTML>';
fwrite($fileHandle, $textInsert);
fclose($fileHandle);
 }
mysqli_close($con);

/**
  * HTML => PDF converter
 */
//to get the html    
    ob_start();
	$fname = dirname(__FILE__).DIRECTORY_SEPARATOR. $filename;
	//echo $fname;
	
    include($fname);
    $content = ob_get_clean();
    $flname = dirname(__FILE__).DIRECTORY_SEPARATOR.'html2pdf.class.php';
	
	
    // convert in PDF
    require_once($flname);
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr');
//      $html2pdf->setModeDebug();
        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('worksheet\WORKSHEET'. $skillid .'.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

?>