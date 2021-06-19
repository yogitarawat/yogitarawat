$(document).ready(function () {
    // open-close hamburger menu
    $(".menubtn").click(function () {
        $(".sidebar").toggleClass("hidden");
        $(".menubtn").toggleClass("closebtn");
    });

    // for menu inside the sidebar
    $("#cat_shop").click(function () {
        $("#cat").slideToggle();
        $("#best, #face, #tool, #hair").slideUp();
    });
    $("#best_shop").click(function () {
        $("#best").slideToggle();
        $("#cat, #face, #tool, #hair").slideUp();
    });
    $("#face_shop").click(function () {
        $("#face").slideToggle();
        $("#best, #cat, #tool, #hair").slideUp();
    });
    $("#tool_shop").click(function () {
        $("#tool").slideToggle();
        $("#best, #face, #cat, #hair").slideUp();
    });
    $("#hair_shop").click(function () {
        $("#hair").slideToggle();
        $("#best, #face, #tool, #cat").slideUp();
    });


    //login icon hover drop-down menu
    $(".relative_container_login").click(function () {
        $(".login_dropdown").slideToggle();
    });
    //keep the color on hover of login icon's dropdown
    $(".login_dropdown").hover(function () {
        // over
        $("#user").css("color", "#ffd391");
    }, function () {
        // out
        $("#user").css("color", "#fff");
    }
    );

    //categories dropdown for desktop view
    $(".cat_new").hover(function () {
        $(".cat_new ol").slideToggle(100);
    });
    $(".cat_eye").hover(function () {
        $(".cat_eye ol").slideToggle(100);
    });
    $(".cat_lips").hover(function () {
        $(".cat_lips ol").slideToggle(100);
    });
    $(".cat_face").hover(function () {
        $(".cat_face ol").slideToggle(100);
    });
    $(".cat_skin").hover(function () {
        $(".skin-drop").slideToggle(100);
    });
    $(".cat_brush").hover(function () {
        $(".cat_brush ol").slideToggle(100);
    });

    //desktop new searchbox dropdown hide show
    $("#s_iconn2").click(function () {
        $(".search2").slideToggle();
    });

    
    $(".menubtn").click(function(){
      $(".login_dropdown").hide();
    });



    $('.owl-carousel').owlCarousel({
        loop: false,
        rewind: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 2
            },
            576: {
                items: 3
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
            1200: {
                items: 4
            }
        }
    });

});