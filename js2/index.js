/* S*/
$(document).ready(function () {
    "use strict";
    $("button.w3-teal").click(function () {
        $(this).css("background-color", "#009688");
        $("button.w3-black").css("background-color", "#616161");
        $(".t-one").fadeOut(2000);
        $(".t-two").fadeIn(2000);


    });
    $("button.w3-black").click(function () {
        $(this).css("background-color", "#009688");
        $("button.w3-teal").css("background-color", "#616161");
        $(".t-two").fadeOut(2000);
        $(".t-one").fadeIn(2000);

    });

            
           $("#show").click(function(){
               //alert("welcome")
               $("#result").show();
           });
              $("#sa").click(function(){
               //alert("welcome")
               $("#result").hide();
           });
            
   

});
