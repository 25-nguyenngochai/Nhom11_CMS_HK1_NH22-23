function multivendor_marketplace_menu_open_nav() {
	window.multivendor_marketplace_responsiveMenu=true;
	jQuery(".sidenav").addClass('show');
}
function multivendor_marketplace_menu_close_nav() {
	window.multivendor_marketplace_responsiveMenu=false;
 	jQuery(".sidenav").removeClass('show');
}

jQuery(function($){
 	"use strict";
 	jQuery('.main-menu > ul').superfish({
		delay: 500,
		animation: {opacity:'show',height:'show'},  
		speed: 'fast'
 	});
});

jQuery(document).ready(function () {
	window.multivendor_marketplace_currentfocus=null;
  	multivendor_marketplace_checkfocusdElement();
	var multivendor_marketplace_body = document.querySelector('body');
	multivendor_marketplace_body.addEventListener('keyup', multivendor_marketplace_check_tab_press);
	var multivendor_marketplace_gotoHome = false;
	var multivendor_marketplace_gotoClose = false;
	window.multivendor_marketplace_responsiveMenu=false;
 	function multivendor_marketplace_checkfocusdElement(){
	 	if(window.multivendor_marketplace_currentfocus=document.activeElement.className){
		 	window.multivendor_marketplace_currentfocus=document.activeElement.className;
	 	}
 	}
 	function multivendor_marketplace_check_tab_press(e) {
		"use strict";
		// pick passed event or global event object if passed one is empty
		e = e || event;
		var activeElement;

		if(window.innerWidth < 999){
		if (e.keyCode == 9) {
			if(window.multivendor_marketplace_responsiveMenu){
			if (!e.shiftKey) {
				if(multivendor_marketplace_gotoHome) {
					jQuery( ".main-menu ul:first li:first a:first-child" ).focus();
				}
			}
			if (jQuery("a.closebtn.mobile-menu").is(":focus")) {
				multivendor_marketplace_gotoHome = true;
			} else {
				multivendor_marketplace_gotoHome = false;
			}

		}else{

			if(window.multivendor_marketplace_currentfocus=="responsivetoggle"){
				jQuery( "" ).focus();
			}}}
		}
		if (e.shiftKey && e.keyCode == 9) {
		if(window.innerWidth < 999){
			if(window.multivendor_marketplace_currentfocus=="header-search"){
				jQuery(".responsivetoggle").focus();
			}else{
				if(window.multivendor_marketplace_responsiveMenu){
				if(multivendor_marketplace_gotoClose){
					jQuery("a.closebtn.mobile-menu").focus();
				}
				if (jQuery( ".main-menu ul:first li:first a:first-child" ).is(":focus")) {
					multivendor_marketplace_gotoClose = true;
				} else {
					multivendor_marketplace_gotoClose = false;
				}
			
			}else{

			if(window.multivendor_marketplace_responsiveMenu){
			}}}}
		}
	 	multivendor_marketplace_checkfocusdElement();
	}
});

jQuery('document').ready(function($){
  setTimeout(function () {
		jQuery("#preloader").fadeOut("slow");
  },1000);
});

jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 100) {
      jQuery('.scrollup i').fadeIn();
    } else {
      jQuery('.scrollup i').fadeOut();
    }
	});
	jQuery('.scrollup i').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
	});
});
