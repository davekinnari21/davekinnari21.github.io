<?php include 'cn.php';
      include 'top.php' ;
?>
	
		<!--<link rel="stylesheet" type="text/css" href="css/styles.css">-->
		<link rel="stylesheet" type="text/css" href="css/responsiveform1.css">
<link rel="stylesheet" media="screen and (max-width: 1200px) and (min-width: 601px)" href="css/responsiveform2.css" />
<link rel="stylesheet" media="screen and (max-width: 600px) and (min-width: 351px)" href="css/responsiveform3.css" />
<link rel="stylesheet" media="screen and (max-width: 350px)" href="css/responsiveform4.css" />

		
<script src="js/jquery.validate.js"></script> 
<script src="js/script.js"></script> 

		
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
	   <div class="separator">	  </div><!-- separator -->
		<div class="row">

		<div id="envelope">
		<header id="formheader">
<h2>Become a Member</h2>
</header>
<form id="registration-form" name="registration-form" action="insertval.php" method="post">

<label>Full Name</label>
<input type="text" name="name" id="name" class="txt_field" tabindex="1" minlength="2" maxlength="40" required autocomplete="off" autofocus>
<label for="grade">Grade </label>
  <select name="grade" id="grade" tabindex="2" required>
		  <option value="" selected>Select Grade</option>
			<option value="Pre-K">Pre-K</option>
			<option value="Grade-K">Grade-K</option>
			<option value="Grade 1">Grade 1</option>
			<option value="Grade 2">Grade 2</option>
			<option value="Grade 3">Grade 3</option>
			<option value="Grade 4">Grade 4</option>
			<option value="Grade 5">Grade 5</option>
			<option value="Grade 6">Grade 6</option>
			</select>	
<label for="country">Country </label>			
<select id="country" name="country" tabindex='3' required>
<?php include 'country.html';  ?>
</select>

<label for="email">Email Address</label>
<input type="email" name="email" id="email" tabindex="4"  maxlength="50" required autocomplete="off">

<label for="username">UserName </label>
 <input type="text" name="username" id="username" class="username" tabindex="5" minlength="6" maxlength="18" required autocomplete="off">
  <div class="username_avail_result" id="username_avail_result"></div>

<label for="password">Password </label>
  <input type="password" name="password" id="password" class="txt_field" tabindex="6" minlength="6" maxlength="18" required autocomplete="off">
          
  <label for="confirm_password">Confirm Password </label>
  <input type="password" name="confirm_password" id="confirm_password" class="txt_field" tabindex="7" minlength="6" maxlength="18" required autocomplete="off">
		  
  <input type="submit" name="registerbtn" id="registerbtn" value="Sign Up" class="btn btn-info" tabindex="8">
      

</form>
</div>


</div> <!-- end of row -->
	</div>
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
		
 <!-- Footer
================================================== -->
<?php include 'footer.html' ?>