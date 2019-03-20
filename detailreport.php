<?php include 'cn.php';
      include 'top.php' ;
?>

  <!-- Page
  ================================================== -->
    
  <div class="row">
      <div class="span3 clearfix">
	   <div class="separator">	</div><!-- separator -->
	      
   <div class="widget widget-list well">
          
       <!--   <ul class="nav nav-list">
		  <li><a href="gradeindex.php?grade=Pre-K"><i class="fa fa-edit fa-lg"></i> Pre-K</a></li>
		  <li><a href="gradeindex.php?grade=K"><i class="fa fa-edit fa-lg"></i> Grade K</a></li>
          <li><a href="gradeindex.php?grade=1"><i class="fa fa-edit fa-lg"></i> Grade 1</a></li>
          <li><a href="gradeindex.php?grade=2"><i class="fa fa-edit fa-lg"></i> Grade 2</a></li>
          <li><a href="gradeindex.php?grade=3"><i class="fa fa-edit fa-lg"></i> Grade 3</a></li>
          <li><a href="gradeindex.php?grade=4"><i class="fa fa-edit fa-lg"></i> Grade 4</a></li>
        </ul>-->
		   <ul class="nav nav-list">
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
		<div class="row">
		<div class="span8">
 	<?php
		
		if(!isset($_SESSION['USER'])){
		header('Location: index.php');
		}
		if(!isset($_POST["REPORTID"]))
		{
			header('Location: index.php');
		}
		
		$user = $_SESSION['USER'];
		list($uname , $uid ) = explode("/", $user);
		$con=mysqli_connect($hostname,$username, $password, $db);
		// Check connection
		if (mysqli_connect_errno())
		{
			echo 'Failed to connect to MySQL: ' , mysqli_connect_error();
		}
			
		$reportid = $_POST["REPORTID"];
		$qry = "select * from report where USERID=$uid and ID=$reportid";
			
		//echo $qry;
			
		$result = mysqli_query($con,$qry);
		$row = mysqli_fetch_assoc($result);
		$checkuser = $result->num_rows;
		if($checkuser > 0){
		$grade = $row['GRADE'];
		$report = unserialize($row['RESULT']);
		$totalq = (int)$row['CORRECT'] + (int) $row['WRONG'];
		$rightprob = $row['CORRECT'];
		$percent = round( (($rightprob / $totalq)) * 100 );
		
		$qry = "select Title from skills where Id=".$row['SKILLID'];
		$rs = mysqli_query($con,$qry);
		$row1 = mysqli_fetch_assoc($rs);
		$skillname = $row1['Title'];
		unset($row1);
		mysqli_free_result($rs);
			
			
		//echo "grade 1=" .$grade;
		?>
		<form id="form1" name="form1" action="report.php" method="POST">
			<input type="hidden" name="grade" value="1">
		</form>
			
		<h3><a href="javascript:<?php echo "DoPost('$grade');" ?>"><img src="img/list.png">&nbsp;Back to progress report</a></h3>
					
		<div class="note" style="width: 300px;">
	 <?php
	 echo "<table align='center'><tr><td align='center' height='30'><font color='red'>Report: $skillname</font></td></tr>";
	 echo "<tr><td><hr style='border-top: 1px solid red;'></td></tr>";
	 echo "<tr><td align='center' height='30'>Total Questions : $totalq</td></tr>";
	 echo "<tr><td align='center' height='30'>Correct Answers : $rightprob </td></tr>";
	 echo "<tr><td align='center' height='30'><font style='color:red;'>Result:  $percent% correct</font></td></tr>";
	 
	 	 
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
	 echo "</div>";
	}
	unset($row);
	unset($report);
	mysqli_free_result($result);
	mysqli_close($con);
	?>
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
<script language="javascript"> 

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
 function DoPost(grade){
	  $('input[name=grade]').val(grade);
     $('form#form1').submit();
  }
  
   
</script>

 <!-- Footer
================================================== -->
<?php include 'footer.html' ?>