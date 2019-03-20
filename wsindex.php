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
$tempskillid = 1;
$grade= '1';
$con=mysqli_connect($hostname,$username, $password, $db);
 // Check connection
if (mysqli_connect_errno())
 {
   echo 'Failed to connect to MySQL: ' , mysqli_connect_error();
 }
 
 if (isset($_POST['catid']) && is_numeric($_POST['catid'])){
   $cat = $_POST['catid'];
}else {
	$cat = 1;
}

 ?>      

<H3><?php  echo 'Grade ' , $grade;   ?></h3>

<div style="float: left; width: 47%; margin-right:3%;">
<?php		


$qry ="select * from category where catid =$cat ";
$rs = mysqli_query($con,$qry);
$row = mysqli_fetch_row($rs);
 
$qry1 = "select * from skills where grade='" . $grade . "' and catid=$cat";  
//$result =mysqli_query($con,$qry1);

?>
 <h4><?php echo $row[1]; ?> Worksheets</h4>
	<form id="form1" name="form1" action="worksheet1.php" method="POST">
     <input type="hidden" name="skillid" value="1">
     </form>
	<ul>
	
	<?php 
	$rs1 = mysqli_query($con,$qry1);
	while($row1 = mysqli_fetch_array($rs1))
	{
	  $img = "img/document-icon.png";
	         	  
	?>
         
    <li class="listspacing">
     <img src="<?php echo $img ?>" style="vertical-align:middle" width="15" height="15"> 
	 <a  id="i_<?php echo $row1[0] ?>" href="javascript:DoPost('<?php echo $row1[0]; ?>');" ><?php echo $row1['Title'] ;    ?></a>
	<?php
	}  //end of innerwhile
	
	unset($row1);
	mysqli_free_result($rs1);
	unset($row);
	mysqli_free_result($rs);
	mysqli_close($con);
	?>

</div> <!-- end of margin -->
<div style="clear:both">
</div>
<p>&nbsp;</p>

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

    
	 function DoPost(skillid){
	  $('input[name=skillid]').val(skillid);
     $('form#form1').submit();
  }
  
   
</script>

 <!-- Footer
================================================== -->
<?php include 'footer.html' ?>