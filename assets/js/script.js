$(document).ready(function() {
    if (window.innerWidth > 960) {
        $('body').css({ 'cursor': 'none' });
        document.body.onmousemove = function(e) {
            document.documentElement.style.setProperty('--x', (e.clientX + window.scrollX) + 'px');
            document.documentElement.style.setProperty('--y', (e.clientY + window.scrollY) + 'px');
        }
    }

    $(".preloader").delay(3000).fadeOut("slow");


})