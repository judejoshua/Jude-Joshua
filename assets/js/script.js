$(document).ready(function() {

    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 24) {
            $("navigation").addClass("fixed");
        } else {
            $("navigation").removeClass("fixed");
        }
    });

    // document.onclick = hideMenu;
    // document.oncontextmenu = rightClick;

    // function hideMenu() {
    //     $("#contextMenu").hide()
    // }

    // function rightClick(e) {
    //     e.preventDefault();
    //     if ($("#contextMenu").is(':visible')) {
    //         hideMenu();
    //     } else {
    //         var menu = $("#contextMenu");

    //         menu.show();
    //         menu.css("left", e.pageX + "px");
    //         menu.css("top", e.pageY + "px");
    //     }
    // }


})