// JavaScript Document

//SCRIPT CHO BANNER
$( document ).ready(function() {
	var screen_device = $(window).width();
	var is_touch_device = 'ontouchstart' in document.documentElement;
	 var supportsTouch = false; 
	 if ('ontouchstart' in window) { 
		//iOS & android 
		supportsTouch = true; } 
	else if(window.navigator.msPointerEnabled) { //Win8 
			supportsTouch = true; 
	} 
	else{
		supportsTouch = false; 
	}
	
	if(supportsTouch==true){
		$('#banner_img').css('display','block');
		$('#banner').css('display','none');
	}
	else if(is_touch_device){
		$('#banner_img').css('display','block');
		$('#banner').css('display','none');
	}				
	else if(screen_device<=1000){
		$('#banner_img').css('display','block');
		$('#banner').css('display','none');
	}
	else {
		$('#banner_img').css('display','none');
		$('#banner').css('display','block');
	}
});




//---------------------------------------------------------------------------------------------------
//ĐOẠN CODE LUÔN ĐỂ CUỐI FILE JS
//---------------------------------------------------------------------------------------------------
//Code di chuyển đến thẻ có id danhdau
$(document).ready(function(e) {        
	window.onload = function(){
		var toado_danhdau = $("#danhdau").offset().top;
		window.scrollTo(0,toado_danhdau);	
	}
});
//Ẩn khối div LOADING
window.document.getElementById("loading").style.display = 'none';