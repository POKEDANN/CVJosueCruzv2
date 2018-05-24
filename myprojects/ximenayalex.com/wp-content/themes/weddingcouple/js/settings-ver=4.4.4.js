/*
	Author: nicdark
	Author URI: http://www.nicdarkthemes.com/
*/

// function mobilecheck() {
//         var check = false;
//         (function(a) {
//             if (/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) {
//                 check = true;
//             }
//         })(navigator.userAgent || navigator.vendor || window.opera);
//         return check;
//     }
//     var clickevent = mobilecheck() ? 'touchstart' : 'click';

//     var items = $('.slide');
//     var content = $('.content');

//     function open() {
//         $(items).removeClass('close').addClass('open');
//     }

//     function close() {
//         $(items).removeClass('open').addClass('close');
//     }

//     $('#navToggle').on(clickevent, function() {
//         event.stopPropagation();
//         event.preventDefault();
//         if (content.hasClass('open')) {
//             close()
//         } else {
//             open()
//         }
//     });
//     content.click(function() {
//         if (content.hasClass('open')) {
//             close()
//         }
//     });


(function($) {
	"use strict";

	$("h2.white").text(function () {
    	return $(this).text().replace("DAYS", "DIAS"); 
	})

	//isotope
	$( window ).load(function() {
		
		//create btns filter
		$('.nicdark_masonry_btns div a').on('click',function() {
			var filterValue = $( this ).attr('data-filter');
			$container_filter.isotope({ filter: filterValue });
		});
		  
		//create masonry
		var $container_masonry = $('.nicdark_masonry_container').isotope({
			itemSelector: '.nicdark_masonry_item'
		});
		var $container_filter = $('.nicdark_masonry_container.nicdark_filter').isotope({});

		$( '.nicdark_simulate_click' ).trigger( "click" );
	
	});
	///////////


	//sidebar fixed 
	$( window ).load(function() {
	
		var window_Width = $(window).width(); 
		var window_Height = $(window).height();
		var nicdark_sidebar_fixed_height = $('.nicdark_sidebar_fixed').height();

		
		//chaeck if element exists
		if ( nicdark_sidebar_fixed_height > 0 ){

			//condition
			if (window_Width < 1199 || window_Height < nicdark_sidebar_fixed_height+90 ){}else{

				$(window).scroll(function () {

					//do
					var nicdark_sidebar_fixed_container = $('.nicdark_sidebar_fixed_container').offset().top;
			        var nicdark_scroll = $(this).scrollTop();
			        var nicdark_sidebar_fixed_width = $('.nicdark_sidebar_fixed').width() + 'px';

			        //get height
					var nicdark_sidebar_fixed_container_height = $('.nicdark_sidebar_fixed_container').height() - 20;
					var nicdark_difference_height = nicdark_sidebar_fixed_container_height - nicdark_sidebar_fixed_height - 90;
					var nicdark_sidebar_fixed_margin_top = nicdark_sidebar_fixed_container_height - nicdark_sidebar_fixed_height;


			        if (nicdark_scroll > nicdark_sidebar_fixed_container-90 && nicdark_scroll < nicdark_sidebar_fixed_container+nicdark_difference_height) {

			            $('.nicdark_sidebar_fixed').css({
			                'position': 'fixed',
			                'top': '90px',
			                'margin-top': '0px',
			                'width': nicdark_sidebar_fixed_width
			            });


			        }else if  ( nicdark_scroll >= nicdark_sidebar_fixed_container+nicdark_difference_height)    {

			            $('.nicdark_sidebar_fixed').css({
			                'position': 'static',
			                'margin-top': nicdark_sidebar_fixed_margin_top
			            });

			        } else {

			            $('.nicdark_sidebar_fixed').css({
			                'position': 'static',
			                'margin-top': '0px'
			            });

			        }
					//end do

				});

			}
			//end condition

		}
	
	});
	//sidebar fixed
	




	//inview
	var windowWidth = $(window).width(); 

	if (windowWidth < 400){
		
		$('.fade-left, .fade-up, .fade-down, .fade-right, .bounce-in, .rotate-In-Down-Left, .rotate-In-Down-Right').css('opacity','1');
			
	}else{
		
		$('.fade-up').bind('inview', function(event, visible) { if (visible == true) { $(this).addClass('animated fadeInUp'); } });
		$('.fade-down').bind('inview', function(event, visible) { if (visible == true) { $(this).addClass('animated fadeInDown'); } });
		$('.fade-left').bind('inview', function(event, visible) { if (visible == true) { $(this).addClass('animated fadeInLeft'); } });
		$('.fade-right').bind('inview', function(event, visible) { if (visible == true) { $(this).addClass('animated fadeInRight'); } });
		$('.bounce-in').bind('inview', function(event, visible) { if (visible == true) { $(this).addClass('animated bounceIn'); } });
		$('.rotate-In-Down-Left').bind('inview', function(event, visible) { if (visible == true) { $(this).addClass('animated rotateInDownLeft'); } });
		$('.rotate-In-Down-Right').bind('inview', function(event, visible) { if (visible == true) { $(this).addClass('animated rotateInDownRight'); } });	

	}
	///////////

		

	//menu	
	$('.nicdark_navigation .menu').superfish({});	
	//megamenu
	$('.nicdark_megamenu ul a').removeClass('sf-with-ul');
	$($('.nicdark_megamenu ul li').find('ul').get().reverse()).each(function(){
	  $(this).replaceWith($('<ol>'+$(this).html()+'</ol>'))
	})
	//responsive
	$('.nicdark_navigation .menu').tinyNav({
		active: 'selected',
		header: 'MENÚ'
	});
	///////////


	
	//fixed menu
	jQuery(window).scroll(function(){
		add_class_scroll();
	});
	add_class_scroll();
	function add_class_scroll() {
		if(jQuery(window).scrollTop() > 100) {
			jQuery('.nicdark_navigation').addClass('slowup');
			jQuery('.nicdark_navigation').removeClass('slowdown');
			jQuery('.nicdark_transparent_navigation').removeClass('nicdark_transparent_menu');
			jQuery('.nicdark_transparent_navigation .nicdark_logo .nicdark_logo_transparent').css('display','none');
			jQuery('.nicdark_transparent_navigation .nicdark_logo .nicdark_logo_normal').css('display','block');
		} else {
			jQuery('.nicdark_navigation').addClass('slowdown');
			jQuery('.nicdark_transparent_navigation').addClass('nicdark_transparent_menu');
			jQuery('.nicdark_navigation').removeClass('slowup');
			jQuery('.nicdark_transparent_navigation .nicdark_logo .nicdark_logo_transparent').css('display','block');
			jQuery('.nicdark_transparent_navigation .nicdark_logo .nicdark_logo_normal').css('display','none');
		}
	}
	///////////
	
	
	
	//tooltip
    $( '.nicdark_tooltip' ).tooltip({ 
    	position: {
    		my: "center top",
    		at: "center+0 top-50"
  		}
    });
    //basic calendar
	$( '.nicdark_calendar' ).datepicker({ });


	//calendar from and to
	$( ".nicdark_calendar_range.nicdark_calendar_from" ).datepicker({
      changeMonth: false,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( ".nicdark_calendar_to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( ".nicdark_calendar_range.nicdark_calendar_to" ).datepicker({
      changeMonth: false,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( ".nicdark_calendar_from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });


    //slider-range
	$( ".nicdark_slider_range" ).slider({
		range: true,
		min: 0,
		max: 10000,
		values: [ 1000, 9000 ],
		slide: function( event, ui ) {
			$( ".nicdark_slider_amount" ).val( "$ " + ui.values[ 0 ] + " - $ " + ui.values[ 1 ] );
		}
	});
	$( ".nicdark_slider_amount" ).val( "$ " + $( ".nicdark_slider_range" ).slider( "values", 0 ) + " - $ " + $( ".nicdark_slider_range" ).slider( "values", 1 ) );
 

	//alerts
	$('.nicdark_alerts').on('click',function(event){
		$(this).css({
			'display': 'none',
		});
	});
	///////////


	//internal-link
	$('.nicdark_front_page .nicdark_internal_link > a').on('click',function(event){

		event.preventDefault();
		var full_url = this.href;
		var parts = full_url.split("#");
		var trgt = parts[1];
		var target_offset = $("#"+trgt).offset();
		var target_top = target_offset.top;
	
		$('html,body').animate({scrollTop:target_top -80}, 900);
	
	});
	///////////



	//counter
	$('.nicdark_counter').data('countToOptions', {
		formatter: function (value, options) {
			return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
		}
	});
	// start all the timers
	$('.nicdark_counter').bind('inview', function(event, visible) {
		if (visible == true) {
			$('.nicdark_counter').each(count);
		} 
	});
	function count(options) {
		var $this = $(this);
		options = $.extend({}, options || {}, $this.data('countToOptions') || {});
		$this.countTo(options);
	}
	///////////


	//nicescrool
	$(".nicdark_nicescrool").niceScroll({
		touchbehavior:false,
		cursoropacitymax:1,
		cursorwidth:0,
		autohidemode:false,
		cursorborder:0
	});
	$(".nicdark_nicescrool_hand").niceScroll({
		touchbehavior:true,
		cursoropacitymax:1,
		cursorwidth:2,
		autohidemode:true,
		cursorborder: "1px solid #eee",
		cursorcolor:"#eee"
	});
	///////////

		

	//left sidebar OPEN		
	$('.nicdark_left_sidebar_btn_open').on('click',function(event){
		$('.nicdark_left_sidebar').css({
			'left': '0px',
		});
		$('.nicdark_site, .nicdark_navigation').css({
			'margin-left': '300px',
		});
		$('.nicdark_overlay').addClass('nicdark_overlay_on');
	});
	//left sidebar CLOSE	
	$('.nicdark_left_sidebar_btn_close, .nicdark_overlay').on('click',function(event){
		$('.nicdark_left_sidebar').css({
			'left': '-300px'
		});
		$('.nicdark_site, .nicdark_navigation').css({
			'margin-left': '0px'
		});
		$('.nicdark_overlay').removeClass('nicdark_overlay_on');
	});
	//right sidebar OPEN		
	$('.nicdark_right_sidebar_btn_open').on('click',function(event){
		$('.nicdark_right_sidebar').css({
			'right': '0px',
		});
		$('.nicdark_site, .nicdark_navigation').css({
			'margin-left': '-300px',
		});
		$('.nicdark_overlay').addClass('nicdark_overlay_on');
	});
	//right sidebar CLOSE	
	$('.nicdark_right_sidebar_btn_close, .nicdark_overlay').on('click',function(event){
		$('.nicdark_right_sidebar').css({
			'right': '-300px'
		});
		$('.nicdark_site, .nicdark_navigation').css({
			'margin-left': '0px'
		});
		$('.nicdark_overlay').removeClass('nicdark_overlay_on');
	});
	///////////
	


	//nicdark_mpopup_gallery
	$('.nicdark_mpopup_gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-fade',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		}
	});
	//nicdark_mpopup_iframe
	$('.nicdark_mpopup_iframe').magnificPopup({
		disableOn: 200,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,

		fixedContentPos: false
	});
	//nicdark_mpopup_window
	$('.nicdark_mpopup_window').magnificPopup({
		type: 'inline',

		fixedContentPos: false,
		fixedBgPos: true,

		overflowY: 'auto',

		closeBtnInside: true,
		preloader: false,
		
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});
	//nicdark_mpopup_ajax
	$('.nicdark_mpopup_ajax').magnificPopup({
		type: 'ajax',
		alignTop: false,
		overflowY: 'scroll'
	});
	//////////



	//pagination
	$('.nicdark_pagination .nicdark_btn').on('click',function(){
	   $('.nicdark_pagination .nicdark_btn').removeClass('active');
	    $(this).addClass('active');
	});
	//end pagination


	$('#tinynav1 option:contains("MENU")').html('<img src="http://andresygaby.mx/wp-content/uploads/2015/10/bar.png">   MENÚ')
	



})(jQuery);