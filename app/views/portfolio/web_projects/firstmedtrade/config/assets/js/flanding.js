$(document).ready(function(){


//---------------------------------------------------------------------
    $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
            event.preventDefault();
            $('html, body').stop().animate({
                scrollTop: target.offset().top
            }, 1200);
        }
    });
//---------------------------------------------------------------------
    $('.links-bar').click(function(){
        $('.links-bar').toggleClass('change');
        $('.links').toggle(400);
    });
//---------------------------------------------------------------------
    var max_fields      = 4; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><div class="minor-form-group"><input type="text" placeholder="Enter Complaint (e.g. Headache)" name="complaint[]" required></div><div class="minor-form-group"><input type="text" placeholder="Duration (e.g. 2 weeks)" name="duration" required></div><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
//---------------------------------------------------------------------  
    $('#pull-up1').click(function(){
        $('.sub-services1').toggleClass('pulled');
    });
    $('#pull-up2').click(function(){
        $('.sub-services2').toggleClass('pulled');
    })
    ;$('#pull-up3').click(function(){
        $('.sub-services3').toggleClass('pulled');
    })
    ;$('#pull-up4').click(function(){
        $('.sub-services4').toggleClass('pulled');
    });
//---------------------------------------------------------------------
    $('#equipment').click(function(){
        $('.consumables-category').removeClass('consumables-show');
        $('.equipment-category').addClass('equipment-show');
        $('.form-group.border').addClass('border-show');
    })
    $('#consumables').click(function(){
        $('.equipment-category').removeClass('equipment-show');
        $('.consumables-category').addClass('consumables-show');
        $('.form-group.border').addClass('border-show');
        $('.vendor.wrapperDiv').addClass('max-height');
    })
    $('#all-sales').click(function(){
        $('.equipment-category').addClass('equipment-show');
        $('.consumables-category').addClass('consumables-show');
        $('.form-group.border').addClass('border-show');
        $('.vendor.wrapperDiv').addClass('max-height');
    })
//---------------------------------------------------------------------
    
        

});
