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
        <!--<ul class="nav nav-list">
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
<h2>Contact Us</h2>
</header>
<p style="margin-left:10px; margin-right:10px;font-size:14px;">If you have a question or comment on our website, or if you’d like someone to contact you, please complete the following information
 so we can put you in touch with the right person. We value feedback from our users — we’re happy to listen and respond as soon as possible.</p>
<form id="registration-form" name="registration-form" action="insertcontact.php" method="post">
 
<label>Your Name</label>
<input type="text" name="name" id="name" class="txt_field" tabindex="1" minlength="2" maxlength="40" required autocomplete="off" autofocus>

<label for="email">Email Address</label>
<input type="email" name="email" id="email" tabindex="2"  maxlength="50" required autocomplete="off">
<label>Subject</label>
<select id="subject" name="subject" tabindex="3"> 
      <option value="General comment">General Comment</option>
      <option value="suggestion/problem">Website Suggestion/Problem</option>
      <option value="Thank you">Thank you</option>
    </select>
	
 <label>Message</label>
  <textarea id="message" name="message" rows="7" cols="50" tabindex="4"></textarea>		  
  <input type="submit" name="registerbtn" id="registerbtn" value="Send Your Message" class="btn btn-info" tabindex="5">
      

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