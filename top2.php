<?php 
$name = "";
  session_start();
  //session timeout setting for 20 minutes
  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1200)) {
    
    session_destroy();   // destroy session data in storage
    session_unset();     // unset $_SESSION variable for the runtime
	header('Location: index.php');
}
$_SESSION['LAST_ACTIVITY'] = time(); 
  
  
  if(isset($_SESSION['NAME']) && !empty($_SESSION['USER'])){
    $name = $_SESSION['NAME'];
  }
?>	
<html lang="en">
  <head>
  <title>DaveMathSchool.com</title>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<meta name="author" content="kinnari dave">
	<meta name="keywords" content="math, maths, word problem,arithmetic,grade, school, homework, multiplication, subtraction, addition, quiz, number, shape, statistics, algebra, education,fractions,pi, mathematician, fraction, geometry,numbers, equation, equations, math anxiety, homeschool math, math problems, math games, mental math, math puzzles, decimal, percent, mathematics, math magic, mathmagic, math homework, pre-algebra, converter, convert, prime number, ratio, probability, statistics, calculate, calculator, statistic, calculus, circle, trigonometry, tessellation, tesellation, tesselation, teselation, fractal, fractol, word problems, math problem, Pythagorean Theorem, multiply, divide, division, multiplication, quadratic, square, circle, triangle, trapezoid, polygon, solve, formula, area, perimeter, volume, unit, unit conversion, conversion, measure, measurement, change units, math resources, math history, mathematical, maths, maths problem, maths problems, converting, calculating,free math">
	<meta name="description" content="Free math word problem and homework help from basic math to algebra, geometry and beyond. for all Students, teachers, parents can find solutions to their math problems.">
	
    <!-- Styles -->
    	
   <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link type="text/css" href="css/jquery-ui-1.10.4.custom.css" rel="stylesheet"> <!-- for dialog theame -->
	<link href="css/style.css" rel="stylesheet">
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"  rel="stylesheet">
    <link href="css/userdesign.css" rel="stylesheet">
<link rel="stylesheet" href="css/responsivemultimenu.css" type="text/css"/>
      	  
   	<!--<script type="text/javascript" src="js/jquery.corner.js"></script><!-- for round corner -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/responsivemultimenu.js"></script>
	<link rel="shortcut icon" href="img/mathicon.ico">
	<style>
	li { float: left;}
	</style>
	 </head>
	
   
  <body>

  
    <!-- Top Panel
    ================================================== -->
    
	<div class="container">
	<header>
	<div id="top-panel">

	     <?php 
		 if(isset($_SESSION['NAME']) && !empty($_SESSION['USER'])){ 
	     echo "<span class='label label-default'><i class='fa fa-user fa-fw'></i>&nbsp; $name </span>
		 		<a class='white' href='logout.php'> <i class='fa fa-sign-out fa-fw'></i>&nbsp;Logout</a>";
		}?>		
     
    </div><!-- top-panel -->
  
	 <!--nav-->
    <!-- Navbar
    ================================================== -->
	
     <div class="row">
      <div class="span3 logo">
        <a href="index.php"><img src="img/mathlogo2.png" alt="" /></a>
      </div><!-- logo -->
        
		<div class="span9">
	
        <div class="fix-fish-menu clearfix">
		<nav class="rmm style">
           
          <ul>
            <li class="active"><a href="index.php">Home</a> </li>
            <li><a href="signup.php">Membership</a> </li>
			 <?php 
		 if(isset($_SESSION['NAME']) && !empty($_SESSION['USER'])){ 
			echo "<li> <a href='report.php'>Progress report</a></li>";
		 }else{
			echo "<li> <a href='login.php'>Login</a></li>";
		 }?>
			
			<li><a href="contact.php">Contact</a></li>
            
          </ul><!-- end #nav  -->
		  </nav>
        </div><!-- end #menu  -->
      </div><!-- navigation -->
	  
    </div><!-- row -->
   
    <div class="row">
	  <div class="banners">
      <div class="span3"><div class="border-5-1"></div></div>
      <div class="span9"><div class="border-5-1 hide-border"></div></div>
	  </div>
    </div><!-- row -->

    <div class="row">
     <div class="span3 clearfix ">
	  <div class="separator">
	  <div class="banners">
	  <!-- <div class="alert alert-default" onclick="window.location='gradeindex.php?cat=6';">
               <strong>Print Worksheet</strong> 
      </div>-->
	   <?php
	   if(isset($_SESSION['NAME']) && !empty($_SESSION['USER'])){ 
	   ?>
	   <a href="worksheetlist.php"><img src="img/worksheet1.png" onmouseover="this.src='img/worksheet2.png'" onmouseout="this.src='img/worksheet1.png'"></a>
	   <?php
	   }else{
		?>
	  <a href="wslogin.php"><img src="img/worksheet1.png" onmouseover="this.src='img/worksheet2.png'" onmouseout="this.src='img/worksheet1.png'"></a>
	   <?php } ?>
	   </div>
	  </div>
      </div><!-- span3 -->
      <div class="span9">
        <div class="separator">
		<div class="banners">
 		  <img src="img/banner.gif">
		  </div>
        </div><!-- separator -->
        <span></span>
      </div><!-- span9 -->
    </div><!-- row -->


    <div class="row">
	  <div class="banners">
      <div class="span3"><div class="border-1-5"></div></div>
      <div class="span9"><div class="border-1-5 hide-border"></div></div>
	  </div>
    </div><!-- row -->

  </header>