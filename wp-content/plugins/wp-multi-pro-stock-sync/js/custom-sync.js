jQuery( function( $ ) {

	 $('body').on('click', '.varaition-pro .select', function(e) {

	   var selectedId 	= this.value;
	   var _name 		= $(this).attr("name");
	   var Y 			= "_variationSyncSlave["
	   var index 		= _name.slice(_name.indexOf(Y) + Y.length);
	   var sessionData 	= {
		    				'action': 'stkSync_stock_up',
		    				'_ajax_nonce':ajax_object_iq._ajax_nonce,
		    				'_id': selectedId
		    			  };
	   		 jQuery.post(ajax_object_iq.ajax_url, sessionData, function(response) {
	   			if(response.status){
	   				var x= "variable_stock["+index;
	   				var avail_stock = $("input[name='"+x+"']").val();
	   				// if(avail_stock == 0 || $("input[name='"+x+"']").hasClass('cs-inherit')){
	   					// $("input[name='"+x+"']").addClass('cs-inherit');
	   					$("input[name='"+x+"']").val(response.message);
	   				// }
	   			}
	   		 });
	});


	 $("#search_status").select2({
            closeOnSelect:true
      });
	 $("#_inventorysync").select2({
            closeOnSelect:true
      });
	
});