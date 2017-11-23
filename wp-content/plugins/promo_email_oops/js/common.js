
jQuery(document).ready(function() {	
	console.log(jQuery);
	console.log($);
	jQuery("#email_submit").click(function(e){
		e.preventDefault();
		jQuery("#show_message").css("display", "none");
		// This does the ajax request
		jQuery('#show_message').html('');
		jQuery('#email_submit_form').validate({
		rules:{
				user_email: {
				    required: true			                   
				},
				user_message: {
				    required: true			        
				},
				user_name: {
				    required: true			        
				}
						        			        
			},
			messages:{
				user_email: {
				    required: "",			          
				},
				user_message: {
				    required: "",			          
				},
				user_name: {
				    required: "",			          
				}			        			        
			}
		});

		if(jQuery('#email_submit_form').valid()) {
			jQuery("#show_message").html('');
			var postData = jQuery('#email_submit_form').find("select,textarea, input").serialize();
	    	jQuery.ajax({
	    		type: 'POST',
		        url: recruitmeajax.ajaxurl,
		        data: postData+ '&action=promo_ajax_request&security='+recruitmeajax._ajax_nonce,
		        success:function(response) {
		            // This outputs the result of the ajax request
		            console.log(response);
		            jQuery("#show_message").css("display", "block");
							jQuery('#show_message').append(response);
		        },
		        error: function(errorThrown){

		           jQuery("#show_message").css("display", "block");
					jQuery('#show_message').append(errorThrown);
		        }
	    	}); 
	    }else{
	    	jQuery("#show_message").css("display", "block");
				jQuery('#show_message').append("<div class='form-error'>Please fill up the form with valid entries!</div>");
	    }

	}); 

});





