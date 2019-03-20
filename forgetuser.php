<?php  include 'top.php'; 
  
?>	
<link rel="stylesheet" type="text/css" href="css/responsiveform1.css">
<link rel="stylesheet" media="screen and (max-width: 1200px) and (min-width: 601px)" href="css/responsiveform2.css" />
<link rel="stylesheet" media="screen and (max-width: 600px) and (min-width: 351px)" href="css/responsiveform3.css" />
<link rel="stylesheet" media="screen and (max-width: 350px)" href="css/responsiveform4.css" />
	
<div id="dialog" title="Username sent"> 
<p><span class="ui-icon ui-icon-info" style="float:left; margin:0 7px 0 0;"></span> Your username has been e-mailed to you. Press ok button to continue. 
</p> 

</div>

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
	   <div class="separator">	  </div><!-- separator -->
		<div class="row">
      
	  <div id="envelope">
		<header id="formheader">
		<h2>Forgot Username</h2>
		</header>
		<div style="margin-left: 10px;" ><font style="color:gray">Please enter the email address associated with your account. Your username will be emailed to you.<font></div><br>
		<div id="errorMessage" class="error"></div>
           <form id="login-form" name="login-form" action="validlogin.php" method="get">
		    <label for="username">E-mail address</label>
            <input type="email" name="email" id="email" tabindex="1" required autocomplete="off" autofocus>
            <input type="button" name="submit" id="submit" value="Submit" class="btn btn-info" tabindex="2" onclick="validLogin()">
          </form>
		   <div id="loginlink">
		    <a href="login.php">Login </a>&nbsp;|&nbsp;<a href="signup.php">Join Now</a>
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
$(function(){         
		// jQuery UI Dialog     
        $('#dialog').dialog({ 
            autoOpen: false, 
            width: 300, 
            modal: true, 
            resizable: false, 
            buttons: { 
               
                "OK": function() { 
                    $(this).dialog("close"); 
					window.location='index.php';
                } 
            } 
        }); 
});

function validLogin(){
    
     var email=$.trim($('#email').val());
	 	 	 
	 if(email == ''){ // Check the username values is empty or not
			$("#email").focus(); // focus to the filed
			$("#errorMessage").html("Please enter valid email");
			return false;
		}
					 
      var dataString = 'email='+ email;
	 
     $.ajax({
      type: "GET",
      url: "processeduser.php",
      data: dataString,
      cache: false,
      success: function(msg){
	  var msg=msg.trim();
	  
               if(msg=="1"){
			   $('#dialog').dialog('open'); 
			    }else{
			      $("#errorMessage").html(msg);
               }
      }
      });
}


</script>

		
 <!-- Footer
================================================== -->
<?php include 'footer.html' ?>