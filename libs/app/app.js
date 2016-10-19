$(document).ready(function(){
	$(".btn-collapse").sideNav({
		menuWidth: 300,
		edge: "left",
		closeOnClick: true
	});

  	$('.collapsible').collapsible();
    
    $('.slider').slider({
        full_width: true
    });
    
    $('.materialboxed').materialbox();

  	setInterval(function(){
  		$(".carousel.carousel-slider").carousel("next");
  	}, 4000);
});