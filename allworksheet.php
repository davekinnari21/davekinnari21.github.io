<?php include 'top.php' ;
 if(!isset($_SESSION['NAME']) && empty($_SESSION['USER'])){ 
 		echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
        exit();
		}
		?>
  <!-- Page
  ================================================== -->
  
  
  <div class="row">
      <div class="span3 clearfix">
	   <div class="separator">	</div><!-- separator -->
	      
   <div class="widget widget-list well">
          
      <!--    <ul class="nav nav-list">
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
<h2>Grade 1 Printable Worksheets</h2>

<div class="row">
 <div class="span3" >
     <div class="panel panel-danger">
    <div class="panel-heading">Language Arts</div>
    <div class="panel-body">

<h5>Counting </h3>
                  <ul style="list-style: disc;padding-left: 40px;">
                    <li>
                      <a href='#unorderd-lists'>Unordered Lists</a>
                    </li>
                    <li>
                      <a href='#ordered-lists'>Ordered Lists</a>
                    </li>
                    <li>
                      <a href='#description-lists'>Description Lists</a>
                    </li>
                    <li>
                      <a href='#nested-lists'>Nesting Lists</a>
                    </li>
                  </ul>

	</div>
  </div>
  </div>
 <div class="span3">
    <div class="panel panel-danger">
    <div class="panel-heading">Math-Skills</div>
    <div class="panel-body">

                  <ul style="list-style: disc;padding-left: 40px;">
                    <li>
					  <a href='worksheetdisplay.php?var=<?php echo str_rot13("counting") ?>'>Counting</a>
                    </li>
					<li>
					  <a href='worksheetdisplay.php?var=<?php echo str_rot13("greaterthan") ?>'>Greater than less than</a>
                    </li>
                    <li>
					<a href='worksheetdisplay.php?var=<?php echo str_rot13("tens") ?>'>Tens and Ones</a>
                    </li>
                    <li>
                      <a href='worksheetdisplay.php?var=<?php echo str_rot13("shape") ?>'>Shapes</a>
                    </li>
                    <li>
                      <a href='worksheetdisplay.php?var=<?php echo str_rot13("time") ?>'>Time</a>
                    </li>
					<li>
                      <a href='worksheetdisplay.php?var=<?php echo str_rot13("sequencing") ?>'>Sequencing</a>
                    </li>
					<li>
                      <a href='worksheetdisplay.php?var=<?php echo str_rot13("addsub") ?>'>Add and Subtract</a>
                    </li>
                  </ul>

	
  </div>
  </div>
  </div> 
</div>
 </div>

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