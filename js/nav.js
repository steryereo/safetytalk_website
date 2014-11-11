$(document).ready(function() {
	var linkId = "#" + window.location.href.substr(window.location.href.lastIndexOf("/")+1) + "-link";
	$(linkId).addClass("shadow");
});