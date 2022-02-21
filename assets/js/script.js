$(document).ready(function() {

    //==============================================navigation
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 24) {
            $("navigation").addClass("fixed");
        } else {
            $("navigation").removeClass("fixed");
        }
    });

    //==============================================context-menu
    document.onclick = hideMenu;
    document.oncontextmenu = rightClick;

    function hideMenu() {
        $("#contextMenu").hide()
    }

    function rightClick(e) {
        e.preventDefault();

        if ($(e.target).is('a, a *')) {
            if ($("#contextMenu #new_tab").length) {
                $("#contextMenu #new_tab").remove()
            }
            $("#contextMenu ul").prepend('<li id="new_tab"><a href="#" target="_blank">Open link in new tab</a></li>')
        } else {
            $("#contextMenu #new_tab").remove()
        }
        var menu = $("#contextMenu");

        menu.show();
        menu.css("left", e.pageX + "px");
        menu.css("top", e.pageY + "px");
    }

    $(window).keyup(function(event) {
        if (event.which === 27) {
            $('#contextMenu').hide();
        }
    });
    $(window).scroll(function() {
        if ($("#contextMenu").is(':visible')) {
            hideMenu();
        }
    });



})