$(document).ready(function () {
	var sandwich = function sandwich() {
		$(document).on('click', '.navigation-wrapper', function () {
			if ($(this).hasClass('sandwich--active')) {
				$(this).removeClass('sandwich--active');
			} else {
				$(this).addClass('sandwich--active');
			}
		});
	};
sandwich();
});

$(document).ready(function() { 
	$('.works-nav__link').click(function() { 
		$('.works-nav__link--active').removeClass("works-nav__link--active");
		$(this).addClass("works-nav__link--active");
	}); 
}); 

$('.works-nav__link').click(function(e){
	var anchor = $(this).attr('href');
	$(anchor).addClass('works-images--active').siblings().removeClass('works-images--active');
});

$(".navToggle").on("click", function(){
	$("#navigation").toggleClass("active");
});