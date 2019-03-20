<?php include 'top.php';?>

<link rel="stylesheet" type="text/css" href="css/responsiveform1.css">
<link rel="stylesheet" media="screen and (max-width: 1200px) and (min-width: 601px)" href="css/responsiveform2.css" />
<link rel="stylesheet" media="screen and (max-width: 600px) and (min-width: 351px)" href="css/responsiveform3.css" />
<link rel="stylesheet" media="screen and (max-width: 350px)" href="css/responsiveform4.css" />

  <div class="row">
      <div class="span3 clearfix">
	   <div class="separator">	</div><!-- separator -->
	      
   <div class="widget widget-list well">
      <!--  <ul class="nav nav-list">
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
		<h2>Login</h2>
		</header>
                
		<div id="errorMessage" class="error"></div>
           <form id="login-form" name="login-form"  method="post">
		  
            <label for="username">Username</label>
            <input type="text" name="uname" id="uname"  tabindex="1" required autocomplete="off" autofocus>
            
            <label for="password">Password</label>
            <input type="password" name="password" id="password"  tabindex="2" required autocomplete="off">
            
            <input type="button" name="login" id="login" value="Login" class="btn btn-info" tabindex="3" onclick="validLogin()">
          </form>
		   <div id="loginlink">
		    <a href="forgetuser.php"> Forgot username? </a> &nbsp; | &nbsp; <a href="forgetpw.php">Forgot password? </a>&nbsp;|&nbsp;<a href="signup.php">Join Now</a>
		   </div>
        </div>
          
   
		</div>  <!-- end of div row -->
	</div>  <!-- end of div span9 -->
</div> <!-- end of row -->
	
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
		
<script type="text/javascript">


function validLogin(){
    
     var password=$.trim($('#password').val());
	 var username=$.trim($("#uname").val());
	 
	 if(username == ''){ // Check the username values is empty or not
			$("#uname").focus(); // focus to the filed
			$("#errorMessage").html("Please enter username and password");
			return false;
		}
		if(password == ''){ // Check the password values is empty or not
			$("#password").focus();
			$("#errorMessage").html("Please enter username and password");
			return false;
		}
			 
      var dataString = 'uname='+ username + '&password='+ password;
	 
     $.ajax({
      type: "POST",
      url: "processed.php",
      data: dataString,
      cache: false,
      success: function(result){
               var result=result.trim();
               if(result=='correct'){
                     window.location='index.php';
               }else{
                     $("#errorMessage").html(result);
               }
      }
      });
}


</script>

		
 <!-- Footer
================================================== -->
<?php include 'footer.html' ?>