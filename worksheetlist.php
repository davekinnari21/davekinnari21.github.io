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
<div class="row">
<div class="span8">
 
   

<font size=3><b>Printable Worksheets </b></font>
<?php

$con=mysqli_connect($hostname,$username, $password, $db);
 // Check connection
if (mysqli_connect_errno())
 {
   echo 'Failed to connect to MySQL: ' , mysqli_connect_error();
 }
 $grade= '1';
  ?>      

<H3><?php  echo 'Grade ' , $grade;   ?></h3>


	 
<div style="float: left; width: 47%; margin-right:3%;">
<?php		


$qry1 ="select * from category where CatID in (SELECT distinct catid FROM `skills` WHERE grade=1) ";


?>
 	<form id="form1" name="form1" action="wsindex.php" method="POST">
     <input type="hidden" name="catid" value="1">
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
	 <a  id="i_<?php echo $row1[0] ?>" href="javascript:DoPost('<?php echo $row1[0]; ?>');" ><?php echo $row1['CatName'] ;    ?></a>
	<?php
	}  //end of innerwhile
	
	unset($row1);
	mysqli_free_result($rs1);
	
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


	 function DoPost(catid){
	  $('input[name=catid]').val(catid);
     $('form#form1').submit();
  }
  
   
</script>

 <!-- Footer
================================================== -->
<?php include 'footer.html' ?>