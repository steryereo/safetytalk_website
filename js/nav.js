$(document).ready(function() {
	var linkId = "#" + window.location.href.substr(window.location.href.lastIndexOf("/")+1) + "-link";
	$(linkId).addClass("shadow");

	// $("body").on("click", "#menu-icon", function(e) {
	// 	e.preventDefault();
	// 	$("#nav-list").toggle();
	// });
});