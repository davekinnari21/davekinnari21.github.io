<?php include 'cn.php';
      include 'top.php' ;
?>

  <!-- Page
  ================================================== -->

  <div class="row">
      <div class="span3 clearfix">
	   <div class="separator">	</div><!-- separator -->
	   <div class="widget widget-list well">
	   <ul class="nav nav-list">
		  <li><a href="gradeindex.php?grade=Pre-K"><i class="fa fa-edit fa-lg"></i> Pre-K</a></li>
		  <li><a href="gradeindex.php?grade=K"><i class="fa fa-edit fa-lg"></i> Grade K</a></li>
          <li><a href="gradeindex.php?grade=1"><i class="fa fa-edit fa-lg"></i> Grade 1</a></li>
          <li><a href="gradeindex.php?grade=2"><i class="fa fa-edit fa-lg"></i> Grade 2</a></li>
          <li><a href="gradeindex.php?grade=3"><i class="fa fa-edit fa-lg"></i> Grade 3</a></li>
          <li><a href="gradeindex.php?grade=4"><i class="fa fa-edit fa-lg"></i> Grade 4</a></li>
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
$ans1 = $row['answer1'];
$ans2= $row['answer2'];
$ans3= $row['answer3'];
$ans4= $row['answer4'];
$type= $row['type'];
$qid = $row['ID'];
unset($row);
mysqli_free_result($result);

	switch($type)
	{
		case "B":
			if (isset($_POST['answer1'])  && isset($_POST['answer2']) )
			{
				$an1 = trim($_POST['answer1']);
				$an2 = trim($_POST['answer2']);
				if(($an1 == $ans1) && ($an2== $ans2)){
					$showNotification = TRUE;
				}
				else
				{
					$showSolution = TRUE;
					$currentpage = $currentpage -1;
					$usrans = $an1 . " and " . $an2;
				}
			}
			break;
		case "C":
			if (isset($_POST['answer1'])  && isset($_POST['answer2'])&& isset($_POST['answer3']) )
			{
				$an1 = trim($_POST['answer1']);
				$an2 = trim($_POST['answer2']);
				$an3 = trim($_POST['answer3']);
				if(($an1 == $ans1) && ($an2== $ans2) && ($an3== $ans3)){
					$showNotification = TRUE;
				}
				else
				{
					$showSolution = TRUE;
					$currentpage = $currentpage -1;
					$usrans = $an1 . ",". $an2. " and " . $an3;
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
				if(($an1 == $ans1) && ($an2== $ans2) && ($an3== $ans3) && ($an4== $ans4)){
					$showNotification = TRUE;
				}
				else
				{
					$showSolution = TRUE;
					$currentpage = $currentpage -1;
					$usrans = $an1 . ",". $an2. ",". $an3. " and " . $an4;
				}
			}
			break;
				
		default:
		if (isset($_POST['answer']))
		{
			$an = trim($_POST['answer']);
			if($an == $ans){
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

unset($row);
 mysqli_free_result($result);

// get the info from the db 
if($showLas