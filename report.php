<?php include 'cn.php';
      include 'top.php';
	  
	  if(!isset($_SESSION['NAME']) && empty($_SESSION['USER'])){ 
 		echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
        exit();
		}
		?>
 <link rel="stylesheet" type="text/css" href="css/styles.css">
  <!-- Page
  ================================================== -->
  
  
  <div class="row">
      <div class="span3 clearfix">
	   <div class="separator">	</div><!-- separator -->
	      
   <div class="widget widget-list well">
          
         <!-- <ul class="nav nav-list">
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
		$grade = "";
		if(isset($_SESSION['USER'])){
			$user = $_SESSION['USER'];
			list($uname , $uid ) = explode("/", $user);
			$con=mysqli_connect($hostname,$username, $password, $db);
			// Check connection
			if (mysqli_connect_errno())
			{
				echo 'Failed to connect to MySQL: ' , mysqli_connect_error();
			}
			if(isset($_POST["grade"]))
			{
			$grade = $_POST["grade"];
			
			$qry = "select * from report where USERID=$uid and GRADE='$grade'";
			}else{
			$qry = "select * from report where USERID=$uid and GRADE=(select GRADE from students where ID=$uid)";
			}
			//echo $qry;
			
			$result = mysqli_query($con,$qry);
			$row = mysqli_fetch_assoc($result);
			$checkuser = $result->num_rows;
			if($checkuser > 0){
			$grade = $row['GRADE'];
			}
			//echo "grade 1=" .$grade;
			?>
			
			<div id="element1"> 
			<form id="report-form" name="report-form" method="post">
		  <select name="grade" id="grade" tabindex="1" >
		  <option value="">Select Grade</option>
		  
			<option <?php if (trim($grade)==trim("Pre-K")){ echo "selected";} ?> value="Pre-K" >Pre-K</option>
			<option  <?php if (trim($grade)==trim("Grade-K")){ echo "selected";}?> value="Grade-K">Grade-K</option>
			<option  <?php if (trim($grade)=="Grade 1") {echo "selected";}?> value="Grade 1">Grade 1</option>
			<option <?php if (trim($grade)=="Grade 2"){ echo "selected";}?>  value="Grade 2">Grade 2</option>
			<option value="Grade 3" <?php if (trim($grade)=="Grade 3") {echo 'selected="selected"';}?>>Grade 3</option>
			<option value="Grade 4" <?php if (trim($grade)=="Grade 4"){ echo 'selected="selected"';}?>>Grade 4</option>
			<option value="Grade 5" <?php if (trim($grade)=="Grade 5") {echo 'selected="selected"';}?>>Grade 5</option>
			<option value="Grade 6" <?php if (trim($grade)=="Grade 6") {echo 'selected="selected"';}?>>Grade 6</option>
			</select>
			</form>
			</div><div id="element2">
			<h1 style="text-transform: uppercase;"><?php echo $grade . " Progress report&nbsp;&nbsp;"; ?></h1>
			</div>
			<form id="form1" name="form1" action="detailreport.php" method="POST">
			<input type="hidden" name="REPORTID" value="1">
			</form>
			<table class="table table-striped" align="left">
			<thead>
          <tr bgcolor="#f2dede">
            <th>Skill</th>
            <th>Score</th>
            <th>Percent</th>
            <th>Print Worksheets</th>
          </tr>
        </thead>
		<tbody>
			
	<?php
		mysqli_data_seek($result,0);
		if($checkuser == 0)
		{
		  echo "<tr><td colspan=4>you didn't earn any skill yet.</td></tr>";
		}
			
		while($row = mysqli_fetch_assoc($result))
		{
			$qry = "select Title from skills where Id=".$row['SKILLID'];
			$rs = mysqli_query($con,$qry);
			$list = mysqli_fetch_assoc($rs);
			$totalq =(int)$row['CORRECT'] + (int)$row['WRONG'];
			$percent = round( (($row['CORRECT'] / $totalq)) * 100 );
								
			    //echo $row['ID'];
			echo "<tr class='info'><td><a href='javascript:DoPost($row[ID]);'>". $list['Title'] ."</a></td>";
			echo "<td>". $row['CORRECT'] ."/". $totalq ."</td>";
			echo "<td width='30'><div class='progress progress-striped'><div class='bar' style='width: $percent%;'>$percent%</div></div></td>";
			echo "<td>worksheet</td></tr>";
			unset($list);
			mysqli_free_result($rs);	
				
           }
			unset($row);
			mysqli_free_result($result);	
			mysqli_close($con);
			echo  "</tbody> </table>";
			}
	
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
<script language="javascript"> 
$(function() {
    $('#grade').change(function() {
	    this.form.submit();
    });
});
  function DoPost(id){
	  $('input[name=REPORTID]').val(id);
     $('form#form1').submit();
  }
   
</script>

 <!-- Footer
================================================== -->
<?php include 'footer.html' ?>