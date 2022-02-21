(function() {
	function updateNavHeight() {
		let h=document.querySelector("nav").clientHeight;
		document.documentElement.style.setProperty("--nav-height",h+"px");
	}

	updateNavHeight();

	jQuery(function($){
		updateNavHeight();
		$(document).ready(updateNavHeight);
	});

	let resizeObserver=new ResizeObserver(function() {
		let el=document.querySelector("nav .navbar-collapse");

		if (el &&
				el.classList.contains("collapse") &&
				!el.classList.contains("show"))
			updateNavHeight();
	});
	resizeObserver.observe(document.querySelector("nav"));
})();
