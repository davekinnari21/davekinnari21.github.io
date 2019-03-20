$(function(){ 

		$('#registration-form').validate({
		onkeyup: false,
		//onfocusout: false,     this will validate onsubmit instead onfocusout
	    rules: {
	       name: {
	        minlength : 2,
	       required: true
	      },
		  
		 username: {
	        minlength: 6,
	        required: true,
			validChars:true,
     		usernameCheck:true    
	      },
		  
		  password: {
				required: true,
				validChars:true,
				minlength: 6
			},
			confirm_password: {
				required: true,
				minlength: 6,
				equalTo: "#password"
			},
		  
	      email: {
	         email: true,
			 required: true
	      },
	    },
		
		 messages: {
            name : {
				required: "Please enter your full name",
                minlength: "Name must be at least 2 characters long"
            },
			
			  country: {
                required: "Please select your country"
           },
		   
			  grade: {
                required: "Please select your grade level"
           },
		   email: {
                required: "Please enter valid email"
           },
			  username: {
                required: "Please enter username"
           },
   			  password: {
                required: "Please enter password"
           },
		   confirm_password: {
                required: "Please re-type password"
           },

},
		
		highlight: function(element) {
				$(element).closest('.control-group').removeClass('success').addClass('error');
			},
			success: function(element) {
				element
				.text('').addClass('valid')
					.closest('.control-group').removeClass('error').addClass('success');
			}
	  });
    
   $('#password, #username,#confirm_password').keydown(function(e) { // Dont allow users to enter spaces for their username and passwords
        if (e.which == 32) {
            return false;
        }
    });
}); // end document.ready


jQuery.validator.addMethod("validChars", function(value, element) {
	return this.optional(element) || /^[A-Za-z\d]+$/i.test(value);
}, "Letters or numbers only please.");

 jQuery.validator.addMethod('usernameCheck', function(username) {
  
     $.ajax({
         cache:false,
          async:false,
          type: "GET",
          data: 'username=' + username,
          url: 'check.php',
          success: function(msg) {
			if(msg==0){
			result = true;
			}
			else{
			result=false;
			}
          }
      });
     return result;
  }, "Username already taken");


 function remove_whitespaces(str){
 var str=str.replace(/^\s+|\s+$/,'');
 return str;
 } 
 
 /*
 
function username_check(username){

   var UsernameAvailResult = $('#username_avail_result'); // Get the ID of the result where we gonna display the results
   var uname=remove_whitespaces(username);
	if((uname.length > 5 )  && (username.match(/^[a-zA-Z0-9]+/)) ){
	   UsernameAvailResult.html('Loading..'); // Preloader, use can use loading animation here
       
       $.ajax({ // Send the username val to another checker.php using Ajax in POST menthod
            type : 'GET',
            data : 'username='+ uname,
            url  : 'check.php',
            success: function(responseText){ // Get the result and asign to each cases
                if(responseText == 0){
                    UsernameAvailResult.html('<span class="success">Username available</span>');
                }
                else{
                    UsernameAvailResult.html('<span class="error">Username already taken</span>');
                }
                
            }
            });
        }
        if(username.length == 0) {
            UsernameAvailResult.html('');
        }
    }*/
