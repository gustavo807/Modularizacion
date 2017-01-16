function initMap() {
    var position = new google.maps.LatLng(20.517675, -100.7861999);
    var myOptions = {
      zoom: 18,
      center: position,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(
        document.getElementById('map'),
        myOptions);

    var marker = new google.maps.Marker({
        position: position,
        map: map,
        title:"Oficinas de Alive Tech"
    });

    var contentString = 'Oficinas de Alive Technology';
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });

  }

//Carousel

//FUNCTIONS BELLOW

//slide function
function slide(where){

            //get the item width
            var item_width = $('#carousel_ul li').outerWidth() + 10;

            /* using a if statement and the where variable check
            we will check where the user wants to slide (left or right)*/
            if(where == 'left'){
                //...calculating the new left indent of the unordered list (ul) for left sliding
                var left_indent = parseInt($('#carousel_ul').css('left')) + item_width;
            }else{
                //...calculating the new left indent of the unordered list (ul) for right sliding
                var left_indent = parseInt($('#carousel_ul').css('left')) - item_width;

            }

            //make the sliding effect using jQuery's animate function... '
            $('#carousel_ul:not(:animated)').animate({'left' : left_indent},500,function(){

                /* when the animation finishes use the if statement again, and make an ilussion
                of infinity by changing place of last or first item*/
                if(where == 'left'){
                    //...and if it slided to left we put the last item before the first item
                    $('#carousel_ul li:first').before($('#carousel_ul li:last'));
                }else{
                    //...and if it slided to right we put the first item after the last item
                    $('#carousel_ul li:last').after($('#carousel_ul li:first'));
                }

                //...and then just get back the default left indent
                $('#carousel_ul').css({'left' : '-210px'});
            });

}


$(document).ready(function(){


    /*Magnific Popup*/


      $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          alignTop: true,
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,

          fixedContentPos: true
      });



     /*Captcha*/
     function recaptchaCallback() {
    	$('#submitBtn').removeAttr('disabled');
	};



    /* Mobile Navigation */

    $('.js--nav-icon').click(function(){
        var icon = $('.js--nav-icon i');
        var nav = document.getElementById("mobile-nav");
        var wrp = document.getElementById("wrap")


        if (icon.hasClass('ion-navicon-round')){
            icon.addClass('ion-close-round');
            icon.removeClass('ion-navicon-round');
            nav.style.width = "250px";
            wrp.style.marginRight = "250px";
        } else {
            icon.addClass('ion-navicon-round');
            icon.removeClass('ion-close-round');
            nav.style.width = "0";
            wrp.style.marginRight= "0";
        }

    });


    /*Sticky Navigation*/
   $('.main-header').waypoint(function(direction) {
        if (direction == "down") {
           $('.navigation').addClass('sticky');
        } else {
           $('.navigation').removeClass('sticky');
        }
    }, {
      offset: '100px;'
    });

    $(window).scroll(function (){
        console.log($(window).scrollTop());
        if ($(window).scrollTop() > 15) {
        $('.navigation').addClass('sticky');
        $('.navigation').addClass('animated fadeInDown');

        }

        if ($(window).scrollTop() < 15) {
            $('.navigation').removeClass('animated fadeInDown');
            $('.navigation').removeClass('sticky');


        }
    });


    /* Scroll Buttons */

    $('.js--scroll-to-about').click(function() {
       $('html, body').animate({scrollTop: $('.js--section-about-us').offset().top}, 1000);
    });

    $('.js--scroll-to-top').click(function() {
       $('html, body').animate({scrollTop: $('.js--section-home').offset().top}, 1000);
    });


    /* Animations on scroll */
    $('.js--wp-1').waypoint(function(direction) {
        $('.js--wp-1').addClass('animated fadeIn');
    }, {
        offset: '100%'
    });
    /*
    $('.js--wp-2').waypoint(function(direction) {
        $('.js--wp-2').addClass('animated slideInUp');
    }, {
        offset: '100%'
    });
    */

    $('.js--wp-3').waypoint(function(direction) {
        $('.js--wp-3').addClass('animated zoomIn');
    }, {
        offset: '100%'
    });

    $('.js--wp-4').waypoint(function(direction) {
        $('.js--wp-4').addClass('animated bounce');
    }, {
        offset: '50%'
    });

    $('.js--wp-5').waypoint(function(direction) {
        $('.js--wp-5').addClass('animated bounceInLeft');
    }, {
        offset: '100%'
    });

    //CAROUSEL

    //options( 1 - ON , 0 - OFF)
        var auto_slide = 1;
            var hover_pause = 1;
        var key_slide = 1;

        //speed of auto slide(
        var auto_slide_seconds = 3000;
        /* IMPORTANT: i know the variable is called ...seconds but it's
        in milliseconds ( multiplied with 1000) '*/

        /*move the last list item before the first item. The purpose of this is
        if the user clicks to slide left he will be able to see the last item.*/
        $('#carousel_ul li:first').before($('#carousel_ul li:last'));

        //check if auto sliding is enabled
        if(auto_slide == 1){
            /*set the interval (loop) to call function slide with option 'right'
            and set the interval time to the variable we declared previously */
            var timer = setInterval('slide("right")', auto_slide_seconds);

            /*and change the value of our hidden field that hold info about
            the interval, setting it to the number of milliseconds we declared previously*/
            $('#hidden_auto_slide_seconds').val(auto_slide_seconds);
        }

        //check if hover pause is enabled
        if(hover_pause == 1){
            //when hovered over the list
            $('#carousel_ul').hover(function(){
                //stop the interval
                clearInterval(timer)
            },function(){
                //and when mouseout start it again
                timer = setInterval('slide("right")', auto_slide_seconds);
            });

        }

        //check if key sliding is enabled
        if(key_slide == 1){

            //binding keypress function
            $(document).bind('keypress', function(e) {
                //keyCode for left arrow is 37 and for right it's 39 '
                if(e.keyCode==37){
                        //initialize the slide to left function
                        slide('left');
                }else if(e.keyCode==39){
                        //initialize the slide to right function
                        slide('right');
                }
            });

        }



}); //Ready function
