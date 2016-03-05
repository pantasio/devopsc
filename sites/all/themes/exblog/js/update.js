//====
var menu_open = false;

jQuery(function(){
	
	jQuery('.nav-main-menu > ul').clone().appendTo('.menu-toggle-menu-container');
	
	jQuery('.toggle-menu-button').click(function(){
		if(menu_open == false){
			jQuery("#main-menu-toggle").addClass("toggle-menu-open");
			jQuery("#page").addClass("page-to-right");
			menu_open = true;
		}else{
			jQuery("#main-menu-toggle").removeClass("toggle-menu-open");
			jQuery("#page").removeClass("page-to-right");
			menu_open = false;
		}
	});
	
	jQuery('.toggle-menu-close').click(function(){
		if(menu_open == true){
			jQuery("#main-menu-toggle").removeClass("toggle-menu-open");
			jQuery("#page").removeClass("page-to-right");
			menu_open = false;
		}
	});
	
	jQuery(".woocommerce-tabs .panel.entry-content").hide();
	jQuery(".woocommerce-tabs ul.tabs li").first().addClass("active");
	jQuery(".woocommerce-tabs .panel.entry-content").first().show();
	
	jQuery(".woocommerce-tabs ul.tabs li a").click(function(){
		$v = jQuery(this).attr("rel");
		jQuery(".woocommerce-tabs .panel.entry-content").hide();
		
		jQuery(".woocommerce-tabs ul.tabs li").removeClass("active");
		jQuery(this).parent().addClass("active");
	
		jQuery(".woocommerce-tabs #"+$v).show();
		return false;
	});
	
	jQuery('#footer-menu li').append('<span class="menu-seperate">/</span>');
	
	//Related post
	jQuery('.post-relative-column').last().addClass('column-last');
	
	
	//Set background
	jQuery('.background-url').each(function(){
		$val = jQuery(this).attr('data-bg-img');
		jQuery('.index-box-promote').css("background-image","url("+$val+")");
	});
	
	
	//add to cart
	jQuery('.form-submit.ajax-processed').removeClass('form-submit').addClass('single_add_to_cart_button button alt');
	jQuery('.form-item-quantity label').remove();
	
	//blogs list
	jQuery('.video-url').each(function(){
		$val = jQuery(this).attr('data-url');
		jQuery(this).html("<iframe width='560' height='315' src='"+ $val +"' frameborder='0' allowfullscreen></iframe>");
	});
	jQuery('.audio-url').each(function(){
		$val = jQuery(this).attr('data-url');
		jQuery(this).html("<iframe width='100%' height='450' scrolling='no' frameborder='no' src='"+ $val +"'></iframe>");
	});
	jQuery('.post-map-container').each(function(){
		$val = jQuery(this).attr('data-url');
		jQuery(this).html("<iframe src='"+ $val +"' width='400' height='300' frameborder='0' style='border:0'></iframe>");
	});
	
	jQuery('.form-item-copy').remove();
	
	
	//pager
	jQuery('ul.pager').addClass('paginate');
	jQuery('ul.pager li').addClass('page-numbers');
	jQuery('ul.pager li.pager-current').addClass('current');
	
	
	//comment
	jQuery('.comment-form .filter-wrapper.form-wrapper').remove();
	jQuery('.comment-form #edit-preview').remove();
	jQuery('.comment-form').addClass('content');	
	
	
	//404
	jQuery('.error404 input[type=text]').removeAttr('size');
	jQuery('#search-form').addClass('content');
	
	
	//taxonomy
	jQuery('.term-listing-heading').remove();
	
	//form
	jQuery('form').addClass('content');
	jQuery('.button-operator').remove();
	
	jQuery('.simplenews-subscribe .form-item-mail label').remove();
	jQuery('.simplenews-subscribe .form-item-mail input[type=text]').attr('placeholder','Your email');
	
});


var lsjQuery = jQuery;
lsjQuery(document).ready(function() { if(typeof lsjQuery.fn.layerSlider == "undefined") { lsShowNotice('layerslider_1','jquery'); } else { lsjQuery("#layerslider_1").layerSlider({responsive: false, responsiveUnder: 1280, layersContainer: 1280, navPrevNext: false, navStartStop: false, showCircleTimer: false, skinsPath: ''}) } });


lsjQuery(document).ready(function() { if(typeof lsjQuery.fn.layerSlider == "undefined") { lsShowNotice('layerslider_2','jquery'); } else { lsjQuery("#layerslider_2").layerSlider({responsive: false, responsiveUnder: 1280, layersContainer: 1280, navStartStop: false, navButtons: false, showCircleTimer: false, skinsPath: ''}) } });
