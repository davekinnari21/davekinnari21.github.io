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
		
		<?php
		$dir = "worksheets/". str_rot13($_GET['var']) ."/";
		
		$filecount = 0;
		$files = glob($dir . "*.jpg");
		if ($files){
			$filecount = count($files);
		}
		
		//if file more than 6 than display 3 columns instead 2
		$divclass = "ws-display2";
	  if($filecount >6)		
      {
		  $divclass ="ws-display3";
	  }		  
	
// Open a directory, and read its contents

if (is_dir($dir)){
	 if ($dh = opendir($dir)){
	   //$start = 0;		 
	   echo "<div class='". $divclass ."'>";
	   while (($file = readdir($dh)) !== false){
		   if (strpos($file, '.jpg') !== false) {
			 list($fname, $fext) = explode(".", $file);  
			 $file = $dir. $file;
			 $fpdf = $dir. $fname . ".pdf";
			 //echo "pdf =". $fpdf .  "file =" . $file;
			
			 echo "<a href=".$fpdf ." target='_blank'> <img src=".$file ." class='img-thumbnail' width='120' height='150'> <p></p></a>";
           
		}
	  }
	  echo "</div>";
    closedir($dh);
  }
}
?>
       </div><!-- end of row -->
		</div>
 
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