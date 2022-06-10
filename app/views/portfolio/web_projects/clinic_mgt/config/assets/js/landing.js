$(document).ready(function(){
	var stickyNav = function(){
		var scrollTop = $(window).scrollTop();
		if (scrollTop > 100) {
			$('.bottom-nav').addClass('scrolled');
			$('.to-top').addClass('to-topview');
		} else {
			$('.bottom-nav').removeClass('scrolled');
			$('.to-top').removeClass('to-topview');
		}
	};
	stickyNav();
	// and run it again every time you scroll
	$(window).scroll(function() {
	stickyNav();
	});

});


$('a[href^="#"]').on('click', function(event) {
var target = $(this.getAttribute('href'));
if( target.length ) {
	event.preventDefault();
	$('html, body').stop().animate({
		scrollTop: target.offset().top
	}, 1000);
}
});



//register page
$('#visiting-go').click(function() {
	$('.form-content.fir').addClass('vi');
	$('.form-content.sec').removeClass('vi');
});
$('#visiting-exit').click(function() {
	$('.form-content.sec').addClass('vi');
	$('.form-content.fir').removeClass('vi');
});

//payment form
$('a.pay').click(function(){
	$('.payment').addClass('modal');
});
$('#exit').click(function(){
	$('.payment').removeClass('modal');
});



//profile page
$(document).ready(function ($) {
$('.tab_content').hide();
$('.tab_content:first').show();
$('.tabs li:first').addClass('active');
$('.tabs li').click(function (event) {
	$('.tabs li').removeClass('active');
	$(this).addClass('active');
	$('.tab_content').hide();

	var selectTab = $(this).find('a').attr("href");

	$(selectTab).fadeIn();
});
});



//Preloader
var myLoad;
function pLoader() {
myLoad = setTimeout(showPage, 5500);
}
function showPage() {
document.getElementById("loading").style.display = "none";
document.getElementById("wrapper").style.display = "block";
}