<?php include 'cn.php';
      include 'top.php' ;
	  
	  if(isset($_SESSION['NAME']) && !empty($_SESSION['USER'])){
		  echo "now set";
	  }
	  
?>
<?php
 if(isset($_SESSION['NAME']) && !empty($_SESSION['USER'])){
header("Location: worksheetlist.php");
		exit();
	   } 
	   
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
	   
 
   <font size=5>Free Printable Worksheets</font><br><br>
<p><font size=3>Every lesson has printable worksheets with and without answers.</font></p>
<font size=3><b>Printable Worksheets are members only feature.</b> Please signup for a free account. Or login if you already have an account. </font>
<br><br>

<p class="btn-toolbar">
  <span class="btn-group">
    <a href="signup.php" class="btn btn-info">Become a Free Member</a>
  </span>
  <span class="btn-group">
       <a class="btn btn-info" href="login.php">Login</a>
  </span>
  
</p>

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