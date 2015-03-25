$(document).ready(function(){
	$("a.ampliar").colorbox({
//		current: "{current} de {total}",
//		width: '750px',
//		scrolling: false,
		opacity:    .75,
		onComplete: function() { $("a.ampliar").colorbox.resize(); }
//		onClosed:   function() { window.location = "http://www.google.com"; }
	});
});