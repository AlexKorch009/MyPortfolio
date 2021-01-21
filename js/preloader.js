// JavaScript Document
function preloader() {
	$(() => {
		
		setTimeout(() => {
			var p = $('.preloader');
		p.css('opacity', 0);
			setTimeout(() => p.remove(),parseInt(p.css('--duration')) * 500);
		}, 500);
	});
}

setTimeout(() => preloader(), 500); 