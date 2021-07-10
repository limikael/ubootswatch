jQuery(function($){
	$(document).ready(function(){
		let h=$("nav").get(0).clientHeight;
		document.documentElement.style.setProperty("--nav-height",h+"px");
	});
});