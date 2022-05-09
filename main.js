$(function() {

    $('.com').on("click", function() {

        $('.commentt').toggle();
        $('.pd-cmnt-textarea').focus();



    });

    $('.likes').on("click", function() {

        $(this).toggleClass('active');



    });


});