<?php include 'cn.php';
      include 'top.php' ;
?>

<script type="text/javascript">


$(function(){ 
			
		// jQuery UI Dialog     
        $('#dialog').dialog({ 
            autoOpen: false, 
            width: 300, 
            modal: true, 
            resizable: false, 
            buttons: { 
               "Submit": function() { 
                    document.form1.submit(); 
				
                }, 
                "Cancel": function() { 
                    $(this).dialog("close"); 
                } 
            } 
        }); 
		
		$('#bsubmit').click(function(e){ 
            e.preventDefault(); 
			var type=$(this).data('type');
			switch (type) { 
				case 'R': 
				if (!$('input:radio[name=answer]:checked').val()) {
				$('#dialog').dialog('open'); 
				}else
				{
				document.form1.submit(); 
				}
 				break;
			case '2T': 
				 if($("input#answer1").val().trim() == "" || $("input#answer2").val().trim() == "")
				{
					$('#dialog').dialog('open'); 
				}else
				{
				document.form1.submit(); 
				}
				break;
			case '3T': 
				 if($("input#answer1").val().trim() == "" || $("input#answer2").val().trim() == "" || $("input#answer3").val().trim() == "")
				{
					$('#dialog').dialog('open'); 
				}else
				{
				document.form1.submit(); 
				}
				break;      
			case '4T': 
				 if($("input#answer1").val().trim() == "" || $("input#answer2").val().trim() == "" || $("input#answer3").val().trim() == "" || $("input#answer4").val().trim() == "" )
				{
					$('#dialog').dialog('open'); 
				}else
				{
				document.form1.submit(); 
				}
				break;
			case 'T':
			default:
				if($("input#answer").val().trim() == "")
				{
				$('#dialog').dialog('open'); 
				}else
				{
				document.form1.submit(); 
			    }
			}
           
        });
	
}); 

function clickme(qID){
	//alert(qID);
 
	  var tag = $("<div></div>");
		$.ajax({
		 type: 'get',
         url: 'questionajax.php',
         data: 'var='+qID,
         success: function(data) {
		tag.html(data).dialog({
		title:'Question',
		 autoOpen: false,
        resizable: false,
        modal: true,
        width:'auto',
		buttons: { 
               "Ok": function() { 
                    $(this).dialog("close"); 
				}
                }, }).dialog('open');
		}
		});
	 
}
</script>

  <!-- Page
  ================================================== -->

  <div class="row">
      <div class="span3 clearfix">
	   <div class="separator">	</div><!-- separator -->
	   <div class="widget widget-list well">
	   <ul class="nav nav-list">
	   <!--
		  <li><a href="gradeindex.php?grade=Pre-K"><i class="fa fa-edit fa-lg"></i> Pre-K</a></li>
		  <li><a href="gradeindex.php?grade=K"><i class="fa fa-edit fa-lg"></i> Grade K</a></li>
          <li><a href="gradeindex.php?grade=1"><i class="fa fa-edit fa-lg"></i> Grade 1</a></li>
          <li><a href="gradeindex.php?grade=2"><i class="fa fa-edit fa-lg"></i> Grade 2</a></li>
          <li><a href="gradeindex.php?grade=3"><i class="fa fa-edit fa-lg"></i> Grade 3</a></li>
          <li><a href="gradeindex.php?grade=4"><i class="fa fa-edit fa-lg"></i> Grade 4</a></li>
		  -->
		   <li><a href="gradeindex.php?cat=1"><i class="fa fa-edit fa-lg"></i>Counting</a></li>
		  <li><a href="gradeindex.php?cat=2"><i class="fa fa-edit fa-lg"></i> Addition</a></li>
          <li><a href="gradeindex.php?cat=3"><i class="fa fa-edit fa-lg"></i> Subtraction</a></li>
          <li><a href="gradeindex.php?cat=6"><i class="fa fa-edit fa-lg"></i> Fraction</a></li>
          <li><a href="gradeindex.php?cat=10"><i class="fa fa-edit fa-lg"></i> Time</a></li>
          <li><a href="gradeindex.php?cat=11"><i class="fa fa-edit fa-lg"></i> Number Sense</a></li>
		  <li><a href="gradeindex.php?cat=13"><i class="fa fa-edit fa-lg"></i> Measurement</a></li>
		  <li><a href="gradeindex.php?cat=17"><i class="fa fa-edit fa-lg"></i> Comparing Numbers</a></li>
        </ul>
	   </div><!-- widget -->   		         
	  </div><!-- span3 -->
   
	  <div class="span9">
	   <div class="separator">	 
        </div><!-- separator -->
	
<div id="dialog" title="Confirm?"> 
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 0 0;"></span> You did not answer the question<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Are you sure to submit?</p> 
</div>  


<div class="row">

<div class="span9">
<?php  
$showNotification = FALSE;
$showSolution = FALSE;
$showLastRec = FALSE;
$currentpage = 1;
$qid ="";
$usrans ="";

// number of rows to show per page
$rowsperpage = 1;

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

// get the current page or set a default
if (isset($_POST['currentpage']) ) {
  // cast var as int
   $currentpage = (int) $_POST['currentpage'];
   $probvar = $_POST['probatt'];
   $report = $_SESSION['REPORT'];
   list($rightprob , $probatt ) = explode("/", $probvar);
   if($currentpage == 0)
   {
      	$showLastRec = TRUE;
   }elseif( $currentpage > 1 ){
	  	$prevpage = $currentpage - 2;
	}else{
	  	$currentpage = 1;
		$prevpage =0;
   } 
if($showLastRec == TRUE)
{
	$sql = "SELECT * FROM questions where skillid=$skillid  order by id DESC LIMIT 1";
}else{   
	$sql = "SELECT * FROM questions where skillid=$skillid  order by id ASC LIMIT $prevpage, 1";
}
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$ans = $row["answer"];
$ans1 = $row["answer1"];
$ans2= $row["answer2"];
$ans3= $row["answer3"];
$ans4= $row["answer4"];
$type= $row["type"];
$qid = $row["ID"];
unset($row);
mysqli_free_result($result);

	switch($type)
	{
		case "B":
			if (isset($_POST['answer1'])  && isset($_POST['answer2']) )
			{
				$an1 = trim($_POST['answer1']);
				$an2 = trim($_POST['answer2']);
				if($an1 ==""){
					$an1 = "<em class='muted'>blank</em>";}
				if($an2 ==""){
					$an2 = "<em class='muted'>blank</em>";}

				if(($an1 == $ans1) && ($an2== $ans2)){
					$showNotification = TRUE;
				}
				else
				{
					$showSolution = TRUE;
					$currentpage = $currentpage -1;
					$usrans = $an1 . " and " . $an2;
					$ans = $ans1 . " and " . $ans2;
				}
			}
			break;
		case "C":
			if (isset($_POST['answer1'])  && isset($_POST['answer2'])&& isset($_POST['answer3']) )
			{
				$an1 = trim($_POST['answer1']);
				$an2 = trim($_POST['answer2']);
				$an3 = trim($_POST['answer3']);
				if($an1 ==""){
					$an1 = "<em class='muted'>blank</em>";}
				if($an2 ==""){
					$an2 = "<em class='muted'>blank</em>";}
				if($an3 ==""){
					$an3 = "<em class='muted'>blank</em>";}

				if(($an1 == $ans1) && ($an2== $ans2) && ($an3== $ans3)){
					$showNotification = TRUE;
				}
				else
				{
					$showSolution = TRUE;
					$currentpage = $currentpage -1;
					$usrans = $an1 . ",". $an2. " and " . $an3;
					$ans = $ans1 . ",". $ans2. " and " . $ans3;
				}
			}
			break;
		case "D":
			if (isset($_POST['answer1'])  && isset($_POST['answer2'])&& isset($_POST['answer3']) && isset($_POST['answer4']) )
			{
				$an1 = trim($_POST['answer1']);
				$an2 = trim($_POST['answer2']);
				$an3 = trim($_POST['answer3']);
				$an4 = trim($_POST['answer4']);
				if($an1 ==""){
					$an1 = "<em class='muted'>blank</em>";}
				if($an2 ==""){
					$an2 = "<em class='muted'>blank</em>";}
				if($an3 ==""){
					$an3 = "<em class='muted'>blank</em>";}
				if($an4 ==""){
					$an4 = "<em class='muted'>blank</em>";}

				if(($an1 == $ans1) && ($an2== $ans2) && ($an3== $ans3) && ($an4== $ans4)){
					$showNotification = TRUE;
				}
				else
				{
					$showSolution = TRUE;
					$currentpage = $currentpage -1;
					$usrans = $an1 . ",". $an2. " ,". $an3. " and " . $an4;
					$ans = $ans1 . ",". $ans2. " ," . $ans3 . " and " . $an4;
				}
			}
			break;
				
		default:
		if (isset($_POST['answer']))
		{
			$an = trim($_POST['answer']);
			if(strcasecmp($an,$ans) == 0){
				$showNotification = TRUE;
			}
			else
			{
				$showSolution = TRUE;
				$usrans = $an;
				$currentpage = $currentpage -1;
			}
		}
	}


}else
{
   $probatt = 0;   //initialize problemattend and right problem 0 for first problem
   $rightprob = 0;
   $report = array();
   $_SESSION['REPORT']=$report;
}   

  if($showNotification == TRUE){
    $report[$qid]='T';
	$_SESSION['REPORT']=$report;
       $rightprob = (int) $rightprob + 1;
	   
        echo "<div id='theParent'><div id='theChild' class='notification'>
		 <span class='label label-success'><i class='icon-ok icon-white' ></i>  Correct ! + 1 Point added  </span> 
		</div></div>";
        echo '<script type="text/javascript">
                 $(document).load(
                 $(function() {
					$("div.notification").hide().fadeIn().delay(2000).fadeOut("slow")
										
					}));  
              </script>';
    }else{
	if($probatt !=0){
		$report[$qid]='F';
		$_SESSION['REPORT']=$report;
	}
	}
	
	 
$sql ="select * from questions where skillid = " . $skillid . " order by id" ;
 //echo $sql;
// find out how many rows are in the table 

$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$count = $result->num_rows;
$grade = $row['Grade'];
$cat = $row['Category'];

// find out total pages
$totalpages = $count;
if($totalpages == 0)
{
   die("No questions available");
 }
unset($row);
 mysqli_free_result($result);

// get the info from the db 
if($showLastRec == TRUE)
{
$sql = "SELECT * FROM questions where skillid=$skillid  order by id DESC LIMIT 1";
$currentpage = $totalpages;
}else
{
// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;
$sql = "SELECT * FROM questions where skillid=$skillid  order by id ASC LIMIT $offset, $rowsperpage";
}
//echo $sql;
$result = mysqli_query($con,$sql) or trigger_error("SQL", E_USER_ERROR);
if (!isset($offset)){
   $offset = $currentpage;}
$percent = round( ($offset / $totalpages) * 100 );
echo "<div class='progress'><div class='bar' style='width: $percent%;'>$percent%</div></div>";

//$str = "<H4><a href=gradeindex.php?grade=$grade> Grade $grade </a> -> $cat </H4>";
$str = "<H4> Grade $grade -> $cat </H4>";
echo $str;
?>


<table align='right'>
<tr><td align=center><b>Score</b></td></tr>
<tr ><td   width=98 height=98 style="background-image:url(img/b1.png);
 background-repeat:no-repeat;" align=center>
       <font color=red><b><?php echo $rightprob .'/'.$probatt   ?></b></font>
</td></tr></table>
<form id='form1'  name=form1 method=POST>
<?php
if ($showSolution == FALSE){
$probatt = (int)$probatt + 1;
}
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

switch($template)
{
  case "B":
       $ans = $choice1 . " , ". $choice2;
      break;
  case "C":
		$ans = $choice1 . " ,". $choice2. " and " . $choice3;
     break;
  case "D":
		$ans = $choice1 . " ,". $choice2. " , " . $choice3 . " and " . $choice4;
     break;
}

} // end while

//echo "currentpage=".$currentpage . "totalpage=" .$totalpages;
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
}else{
   $nextpage = 0;
}   
    // echo forward link for next page 
   
   echo "<input type=hidden name=currentpage value=$nextpage>";
   echo "<input type=hidden name=skillid value=$skillid>";
   echo "<input type=hidden name=probatt value='$rightprob/$probatt'>";
   
   if($showSolution == TRUE)
    {
	 switch($template)
		{
			/*case "2":
				echo '<h2><small>'. $question . '</small></h2>';   
				echo "<table><tr><td><label for=radio1><span class='cir'>A</span></label><input type=radio name=answer id=radio1 value=A disabled></td><td >$choice1</td></tr>";
				echo "<tr><td><label for=radio2><span class='cir'>B</span></label><input type=radio name=answer id=radio2 value=B disabled></td><td>$choice2</td></tr></table><br>";
				break;
		
           	case "3":
				echo '<h2><small>'. $question . '</small></h2>';   
				echo "<table><tr><td><span class='cir'>A</span><input type=radio name=answer id=answer value=A disabled></td><td >$choice1 </td></tr>
				<tr><td><span class='cir'>B</span><input type=radio name=answer id=answer value=B disabled></td><td >
				$choice2</td></tr><tr><td><span class='cir'>C</span><input type=radio name=answer id=answer value=C disabled></td><td >$choice3</td></tr></table><br>";
				break;
				
			case "R":
				echo '<h2><small>'. $question . '</small></h2>';   
				echo "<table><tr><td><span class='cir'>A</span><input type=radio name=answer id=answer value=A disabled></td><td class='border'>$choice1</td></tr>
				<tr><td><span class='cir'>B</span><input type=radio name=answer id=answer value=B disabled></td><td class='border'>
				$choice2</td></tr><tr><td><span class='cir'>C</span><input type=radio name=answer id=answer value=C disabled></td><td class='border'>$choice3</td></tr>
				<tr><td><span class='cir'>D</span><input type=radio name=answer id=answer value=D disabled></td><td class='border'>$choice4</td></tr>
				</table><br>";
				break;
				*/
		case "2":
			echo '<h2><small>'. $question . '</small></h2>';   
			echo " <label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A disabled>$choice1</label>";
			echo  "<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B disabled>$choice2</label>";
			break;
			
	    case "3":
			echo '<h2><small>'. $question . '</small></h2>'; 
			echo " <label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A disabled>$choice1</label>";
			echo  "<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B disabled>$choice2</label>";
			echo " <label for=radio3><span class='cir'>C</span><input type=radio name=answer id=radio3 value=C disabled>$choice3</label>";
			break;
		 case "R":
			echo '<h2><small>'. $question . '</small></h2>'; 
			echo " <label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A disabled>$choice1</label>";
			echo  "<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B disabled>$choice2</label>";
			echo " <label for=radio3><span class='cir'>C</span><input type=radio name=answer id=radio3 value=C disabled>$choice3</label>";
			echo " <label for=radio4><span class='cir'>D</span><input type=radio name=answer id=radio4 value=D disabled>$choice4</label>";
			break;
		
				
			case "B":
				$search = array("TEXTBOX1","TEXTBOX2");
				$replace = array("<input id=answer1 name=answer1 type=text maxlength=10 disabled>","<input id=answer2 name=answer2 type=text maxlength=10 disabled>"); 
				$newq = str_replace($search, $replace, $question);
				echo  "<h2><small>$newq</small></h2>";
				break;
			
			case "C":
				$search = array("TEXTBOX1","TEXTBOX2","TEXTBOX3");
				$replace = array("<input id=answer1 name=answer1 type=text maxlength=10 disabled>","<input id=answer2 name=answer2 type=text maxlength=10 disabled>"
				,"<input id=answer3 name=answer3 type=text maxlength=10 disabled>"); 
				$newq = str_replace($search, $replace, $question);
				echo  "<h2><small>$newq</small></h2>";
				break;
			
			case "D":
				$search = array("TEXTBOX1","TEXTBOX2","TEXTBOX3","TEXTBOX4");
				$replace = array("<input id=answer1 name=answer1 type=text maxlength=10 disabled>","<input id=answer2 name=answer2 type=text maxlength=10 disabled>",
				"<input id=answer3 name=answer3 type=text maxlength=10 disabled>","<input id=answer4 name=answer4 type=text maxlength=10 disabled>"); 
				$newq = str_replace($search, $replace, $question);
				echo  "<h2><small>$newq</small></h2>";
				break;
			case "A":
				$search = array("TEXTBOX1","TEXTBOXmini");
				$replace = array("<input id=answer name=answer type=text  disabled>","<input id='answer' name='answer' type='text' style='width: 30px;height:22px;padding: 1px;background-color: #FFFF00;'  disabled>"); 
				$newq = str_replace($search, $replace, $question);
				echo  "<h2><small>$newq</small></h2>";
				break;
			
			default:
				
				echo'<h2><small>'. $question . '</small></h2> ';   
				echo "<input id=answer name=answer type=text disabled>";
		}
		if($usrans == "")
		{
		   $usrans = "<em class='muted'>blank</em>";
		}
		
		echo "<H3>Sorry, incorrect.<br>Your answer was : $usrans <br>  The right answer is : $ans ";
		echo "</h3><input type=submit value='Next Question' class='btn btn-info'> <div class=admonition><div class=admonition-title>Explanation</div><p>
				 $solution </p></div>";
	 }
     else
	 {
	 if($showLastRec == FALSE){
	 switch($template)
	 {
		
		case "2":
			echo "<p class='font-style'>". $question. "</p>";   
			echo "<input type=hidden name=answer value=''> ";
			echo " <label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A >$choice1</label>";
			echo  "<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B >$choice2</label>";
			echo "<input type=button id=bsubmit  class='btn btn-info'  data-type='R'  value=Submit> ";
			break;
			
	    case "3":
			echo "<p class='font-style'>". $question. "</p>";   
			echo "<input type=hidden name=answer value=''>";
			echo " <label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A >$choice1</label>";
			echo  "<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B >$choice2</label>";
			echo " <label for=radio3><span class='cir'>C</span><input type=radio name=answer id=radio3 value=C >$choice3</label>";
			echo "<input type=button id=bsubmit  class='btn btn-info' data-type='R' value=Submit>";
			break;
			
			/*case "R":
			echo "<p class='font-style'>". $question. "</p>";   
			echo "<input type=hidden name=answer value=''><table><tr><td><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A></td><td class='border'>$choice1</td></tr>";
			echo  "<tr><td><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B></td><td class='border'>$choice2</td></tr>";
			echo  "<tr><td><span class='cir'>C</span><input type=radio name=answer id=radio3 value=C></td><td class='border'>$choice3</td></tr>";
			echo  "<tr><td><span class='cir'>D</span><input type=radio name=answer id=radio4 value=D></td><td class='border'>$choice4</td></tr></table>";
			echo "<input type=button id=bsubmit  class='btn btn-info' data-type='R' value=Submit>";
			break;*/
			case "R":
			echo "<p class='font-style'>". $question. "</p>"; 
			echo "<input type=hidden name=answer value=''>";
			echo " <label for=radio1><span class='cir'>A</span><input type=radio name=answer id=radio1 value=A >$choice1</label>";
			echo  "<label for=radio2><span class='cir'>B</span><input type=radio name=answer id=radio2 value=B >$choice2</label>";
			echo " <label for=radio3><span class='cir'>C</span><input type=radio name=answer id=radio3 value=C >$choice3</label>";
			echo " <label for=radio4><span class='cir'>D</span><input type=radio name=answer id=radio4 value=D >$choice4</label>";
			echo "<input type=button id=bsubmit  class='btn btn-info' data-type='R' value=Submit>";
			break;
			
		
			
		case "B":
			echo "<input type=hidden name=answer value=$ans>";
			$search = array("TEXTBOX1","TEXTBOX2");
			$replace = array("<input id=answer1 name=answer1 type=text maxlength=10 autofocus>","<input id=answer2 name=answer2 type=text maxlength=10>"); 
			$newq = str_replace($search, $replace, $question);
			echo "<p class='font-style'>". $newq. "</p>";   
			echo "<input type=button class='btn btn-info' id=bsubmit data-type='2T' value=Submit>";
			break;
		case "C":
			$search = array("TEXTBOX1","TEXTBOX2","TEXTBOX3");
			$replace = array("<input id=answer1 name=answer1 type=text maxlength=10 autofocus>","<input id=answer2 name=answer2 type=text maxlength=10>","<input id=answer3 name=answer3 type=text maxlength=10>"); 
			$newq = str_replace($search, $replace, $question);
			echo "<p class='font-style'>". $newq. "</p>";   
			echo "<input type=button class='btn btn-info' id=bsubmit data-type='3T' value=Submit>";
			break;
		case "D":
			$search = array("TEXTBOX1","TEXTBOX2","TEXTBOX3","TEXTBOX4");
			$replace = array("<input id=answer1 name=answer1 type=text maxlength=10 autofocus>","<input id=answer2 name=answer2 type=text maxlength=10>",
			"<input id=answer3 name=answer3 type=text maxlength=10>","<input id=answer4 name=answer4 type=text maxlength=10>"); 
			$newq = str_replace($search, $replace, $question);
			echo "<p class='font-style'>". $newq. "</p>";
			echo "<input type=button class='btn btn-info' id=bsubmit data-type='4T' value=Submit>";
			break;
		case "A":
			$search = array("TEXTBOX1","TEXTBOXmini");
			$replace = array("<input id=answer name=answer type=text maxlength=10 autofocus>","<input id='answer' name='answer' type='text' maxlength='10' style='width: 30px;height:22px;padding: 1px;background-color:#FFFF00;'  autofocus>"); 
			$newq = str_replace($search, $replace, $question);
			echo "<p class='font-style'>". $newq. "</p>";   
			echo "<input type=button class='btn btn-info' id=bsubmit data-type='T' value=Submit>";
			break;
	
		default:
			echo '<table><tr><td><p class=font-style>'. $question . '</p></td> </tr>';   
			echo "<tr><td><input id=answer name=answer type=text maxlength='10' autofocus></td></tr>";
			echo "<tr><td><input type=button class='btn btn-info btn-lg' id=bsubmit data-type='T' value='Submit'></td></tr></table>";
	 }
	 }else
	 {
	 //display report at end of questions round
	 $query="select Title from skills where Id=$skillid";
	 //echo $query;
	$rs = mysqli_query($con,$query);
	$row = mysqli_fetch_assoc($rs);
	mysqli_free_result($rs);
	$skillname = $row['Title'];
	unset($row);
	
	 $report = $_SESSION['REPORT'];
	 $totalq = count($report);
	 $percent = round( (($rightprob / $totalq)) * 100 );
	 echo "<div class='note' style='width: 300px;'>";
	 
	 echo "<table align='center'><tr><td align='center' height='30'><font color='red'>Report: $skillname</font></td></tr>";
	 echo "<tr><td><hr style='border-top: 1px solid red;'></td></tr>";
	 echo "<tr><td align='center' height='30'>Total Questions : $totalq</td></tr>";
	 echo "<tr><td align='center' height='30'>Correct Answers : $rightprob </td></tr>";
	 echo "<tr><td align='center' height='30'><font style='color:red;'>Result:  $percent% correct</font></td></tr>";
	 if($percent < 65){
		echo "<tr><td align='center' height='30'><font size='2' style='color:red;'>(you need at-least 65% to earn skill)</font></td></tr>";
	}else{
	//echo "in else";
	//insert in to
	if(isset($_SESSION['USER'])){
	$user = $_SESSION['USER'];
	list($uname , $uid ) = explode("/", $user);
	$wrong = (int)$totalq - (int)$rightprob;
	
	 $query="select ID from report where USERID=$uid and SKILLID=$skillid and GRADE='$grade'";
//echo $query;
    
	$rs1 = mysqli_query($con,$query);
	$num = $rs1->num_rows;
	mysqli_free_result($rs1);
	$areport = serialize($report);	
	//echo $areport;
	//echo "<br>";
	//$array= unserialize($areport);
	//var_dump($array);

	if($num == 0){
	$sql="Insert INTO report(USERID,GRADE,SKILLID,CORRECT,WRONG,RESULT) VALUES($uid,'Grade $grade',$skillid,$rightprob,$wrong ,'$areport');";
	}else
	{
	$sql ="UPDATE report SET CORRECT = $rightprob,WRONG = $wrong, RESULT= '$areport' WHERE USERID=$uid AND SKILLID=$skillid;";
	}
		
	//echo "sql=".$sql;
	mysqli_query($con,$sql);
	}
	}	 
    $i =1;
	foreach($report as $key => $value) {
	echo "<tr><td align='center' height='30'><h4 class='liketext'><a  onclick='javascript:clickme($key);return false;'  href='#' >Question ".$i."</a></h4>";
	
	$i=$i+1;
	if ($value=="T")
	{
	  echo "&nbsp;<img src='img/tick.png'></td></tr>";
	}else{
		echo "&nbsp;<img src='img/cross.png'></td></tr>";
	}
    }
	 echo "</table>";
	 echo "<br><a href='gradeindex.php?grade=$grade' class='btn btn-danger btn-mini' >Practice more</a></div>";
	
	unset($report);
	 }   
	}
	echo "</form>";

 unset($list);
 mysqli_free_result($result);
 mysqli_close($con);
?>


 </div>
		  <!-- span8 end -->
    </div> <!-- row end-->

	  </div><!-- span9 -->
	</div><!-- row entry-page -->
	
	
	    <!-- DIVIDER -->
      	<div class="row margin10-40">
      	  <div class="span3"><div class="border-5-1"></div></div>
      	  <div class="span9"><div class="border-5-1 hide-border"></div>
		  <!-- <ul class="social-icons">
	      <li class="pinterest" ><a href="http://pinterest.com/zergev/"></a></li>      
          <li class="twitter"><a href="http://twitter.com"></a></li>
	      <li class="dribbble"><a href="http://dribbble.com"></a></li>
	      <li class="facebook"><a href="http://facebook.com"></a></li>
	      <li class="google"><a href="http://plus.google.com"></a></li>
	      <li class="linkedin"><a href="http://linkedin.com"></a></li>
	      <li class="behance"><a href="http://behance.net"></a></li>
	      <li class="rss"><a href="#"></a></li>
	    </ul>-->
		  
		  </div>
    	</div><!-- row -->	
	<!-- ============================================================================================= -->

 <!-- Footer
================================================== -->

 
<?php include 'footer.html' ?>