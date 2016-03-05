jQuery(document).ready(function(){
	jQuery('.wope-demo-heading-close').click(function(){
		jQuery(this).parent().parent().remove();
	});
	 
	jQuery('.wope-demo-heading-title').click(function(){
		jQuery('.wope-demo-list').slideToggle();
	});
	
	//click hide wope demo
	jQuery('.wope-demo-heading-title').click(function(event){
		var data = {
			'action': 'frontend_hide_wope_demo',
			'data': ""
		}
		jQuery.post(frontendajax.ajaxurl, data, function(response) {
			console.log("Hidden wope demo");
		});	
	});
	
	//click close wope demo
	jQuery('.wope-demo-heading-close').click(function(event){
		var data = {
			'action': 'frontend_close_wope_demo',
			'data': ""
		}
		jQuery.post(frontendajax.ajaxurl, data, function(response) {
			console.log("Closed wope demo");
		});	
	});
	
})

