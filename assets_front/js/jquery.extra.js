



jQuery(window).scroll(function () {

	if (jQuery(this).scrollTop() > 100) {

		jQuery('.header-wrap').addClass("fix");

	} else {

		jQuery('.header-wrap').removeClass("fix");

	}

});







jQuery(document).ready(function(){	

	onloadmethod();	

	

	/*main menu*/

	jQuery(".top-menu ul ul").parent().addClass("dropdown")

	jQuery(".top-menu ul li.dropdown").append("<span class='arrow'></span>")

	jQuery(".top-menu ul li.dropdown .arrow").click(function(){

		

		if (jQuery(this).parent().hasClass('open')) {

			jQuery(this).parent().removeClass("open")

		}else{

			jQuery(this).parent().addClass("open")

		}

	});

	

	jQuery(".btn-topmenu").click(function(){

		jQuery("body").addClass("modal-open");

		jQuery('.top-menu').addClass("open");

	});

	jQuery(".btn-topmenu-close").click(function(){

		jQuery("body").removeClass("modal-open");

		jQuery('.top-menu').removeClass("open");

	});





















    /*------------------------

		Header

		--------------------------*/

		

		$('.about-manu ul li a').on('click', function(e) {

			var anchor = $(this);

			$('html, body').stop().animate({

				scrollTop: $(anchor.attr('href')).offset().top - 140

			}, 1500);

			e.preventDefault();

		});

		$(window).on('scroll', function() {

			if ($(this).scrollTop() > 250) {

				$('.about-manu').addClass('menu-sticky');

			} else {

				$('.about-manu').removeClass('menu-sticky');

			}

		})



    

	

	$(document).ready(function(){

  $('.about-manu ul li a').click(function(){

    $('.about-manu ul li a').removeClass("current-menu-item ");

    $(this).addClass("current-menu-item ");

});

});







     

	 

	 





		



















































	

	jQuery('.catagori-carousel').owlCarousel({

		loop:true,

		autoplay:false,

		margin:24,

		dots:false,

		nav:true,

		navText:[],

		responsive:{

			0:{

				items:1

			},

			480:{

				items:2

			},
			640:{

				items:2

			},

			768:{

				items:3

			}

		}

	})

	

});



jQuery(window).resize(function(){	

	onloadmethod();	  

});



function onloadmethod(){	



}







/*-------- back to top jquery start ---------*/



// BY KAREN GRIGORYAN



$(document).ready(function() {

  /******************************

      BOTTOM SCROLL TOP BUTTON

   ******************************/



  // declare variable

  var scrollTop = $(".scrollTop");



  $(window).scroll(function() {

    // declare variable

    var topPos = $(this).scrollTop();



    // if user scrolls down - show scroll to top button

    if (topPos > 900) {

      $(scrollTop).css("opacity", "1");



    } else {

      $(scrollTop).css("opacity", "0");

    }



  }); // scroll END



  //Click event to scroll to top

  $(scrollTop).click(function() {

    $('html, body').animate({

      scrollTop: 0

    }, 800);

    return false;



  }); // click() scroll top EMD



  /*************************************

    LEFT MENU SMOOTH SCROLL ANIMATION

   *************************************/

  // declare variable

  var h1 = $("#h1").position();

  var h2 = $("#h2").position();

  var h3 = $("#h3").position();



  $('.link1').click(function() {

    $('html, body').animate({

      scrollTop: h1.top

    }, 500);

    return false;



  }); // left menu link2 click() scroll END



  $('.link2').click(function() {

    $('html, body').animate({

      scrollTop: h2.top

    }, 500);

    return false;



  }); // left menu link2 click() scroll END



  $('.link3').click(function() {

    $('html, body').animate({

      scrollTop: h3.top

    }, 500);

    return false;



  }); // left menu link3 click() scroll END



}); // ready() END



/*-------- back to top jquery stop ---------*/



