/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var cAc_wpsmlViewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
  // set the viewport using the function above
  viewport = updateViewportDimensions();
  // if the viewport is tablet or larger, we load in the gravatars
  if (viewport.width >= 768) {
  jQuery('.comment img[data-gravatar]').each(function(){
    jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
  });
	}
} // end function

var cAc_wpsmlViewport;



function sundialSkuParallaxProductViews( $info ) {
	
	console.log('using parallax');
	//testing fallback click behavior here, rather than disabling checks or things they check.
	//#BackwardLaziness.
	//gonna get the same thing going for products, load some data, and come back to add parallax methods
	jQuery('.sundial_static_post-benefit, .sundial_static_post-title, .sundial_static_post-image, .sundial_static_post-needstate, .product-information .description').click( function(e) {
	
		e.preventDefault();
		if ($info.hasClass('visible') ) {
			$info.toggleClass('opaque');
			$info.toggleClass('visible');
		}
		else {
			$info.toggleClass('visible');
			$info.toggleClass('opaque');
		}
	
	});
	
	jQuery('.trigger_previous_sundial_static_post').click( function(e) {
	
		e.preventDefault();
		var target = jQuery(this).attr('target'); //0
		var last = jQuery('article').length - 1; //2
		$info.removeClass('opaque');
		$info.removeClass('visible');
		if (target != 'none' && target != last) {
		
			target = parseInt(target);
			var current = target + 1; //1
			for (i=last; i >= 0; i--) {  //i=2 //i=1 /i=0
			
				var $article = jQuery('.targetId'+i); //next //current //prev
				if (i == current) {  //f //t //f
					$article.parent().removeClass().addClass('sundial_next_static_post right-side number1') //current>next
				}
				if (i == (current+1)) { //t //f //f
					$article.parent().removeClass().addClass('sundial_numbered_static_post right-side number2') //next>r1
				}
				if (i > (current+1)) { //f //f //f
					var rightNo = last - i;
					$article.parent().removeClass().addClass('sundial_numbered_static_post right-side number'+rightNo);
				}
				if (i == target) { //f //f //t
					$article.parent().removeClass().addClass('sundial_active_static_post'); //prev>current
					if ($article.find('.trigger_previous_sundial_static_post').attr('target') == 'none') {
						$article.find('.trigger_previous_sundial_static_post').hide();
					}
				}
				if (i == (target-1)) { //f //f //f
					$article.parent().removeClass().addClass('sundial_prev_static_post left-side number1');
				}
				if (i < (target-1)) { //f //f //f
					var leftNo = last - target;
					$article.parent().removeClass().addClass('sundial_numbered_static_post left-side number'+leftNo);
				}
			
			}
		
		}
		if (target == 'none') {
			jQuery('.trigger_next_sundial_static_post').hide()
		}
		
	});
	
	jQuery('.trigger_next_sundial_static_post').click( function(e) {
	
		e.preventDefault();
		var target = jQuery(this).attr('target');
		var last = jQuery('article').length;
		$info.removeClass('opaque');
		$info.removeClass('visible');
		if (target != 'none' && target != last) {
		
			target = parseInt(target);
			var current = target - 1;
			for (i=0; i < last; i++) {
			
				var $article = jQuery('.targetId'+i);
				if (i == current) {
					$article.parent().removeClass().addClass('sundial_prev_static_post left-side number1')
				}
				if (i == (current-1)) {
					$article.parent().removeClass().addClass('sundial_numbered_static_post left-side number2');
				}
				if (i < (current-1)) {
					var leftNo = current - i;
					$article.parent().removeClass().addClass('sundial_numbered_static_post left-side number'+leftNo);
				}
				if (i == target) {
					$article.parent().removeClass().addClass('sundial_active_static_post');
					if ($article.find('.trigger_next_sundial_static_post').attr('target') == last) {
						$article.find('.trigger_next_sundial_static_post').hide();
					}
					if ($article.find('.trigger_previous_sundial_static_post').attr('target') != 'none') {
						$article.find('.trigger_previous_sundial_static_post').show();
					}
				}
				if (i == (target+1)) {
					$article.parent().removeClass().addClass('sundial_next_static_post right-side number1');
				}
				if (i > (target+1)) {
					var rightNo = i - target;
					$article.parent().removeClass().addClass('sundial_numbered_static_post right-side number'+rightNo);
				}
				if (target == last) {
					jQuery('.trigger_next_sundial_static_post').hide()
				}
			
			}
		
		}
		if (target == last) {
			jQuery('.trigger_next_sundial_static_post').hide()
		}
		
	});
	
	return false;

}

function sundialSkuClickProductViews( $info ) {
	
	console.log('using click');	
	return false;

}



/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

	cAc_wpsmlViewport = updateViewportDimensions();
	
	if (SKU_MANAGEMENT_LOADED && $('.sundial_static_post_container').length > 0) {
	
		$info = $('.sundial_static_post_container .product-information');
		infoTop = (cAc_wpsmlViewport.height + $info.height())/-2;
// 		$info.css('visibility', 'hidden');
		if (cAc_wpsmlViewport.width >= 768) {
			$info.css('position', 'relative');
			$info.css('top', infoTop+'px');
		}
		else {
			$info.css('position', 'absolute');
			$info.css('top', 0);
		}
				
		if (typeof(ScrollMagic) == 'function') {
		
			sundialSkuParallaxProductViews($info);
			
		}
		else {
			
			sundialSkuClickProductViews($info);
		}
		$('.sundial_static_post-image.product img').height(2*$('.sundial_static_post_block').height());
	
	}
	
	$(window).resize(function () {

		waitForFinalEvent( function() {
	
			cAc_wpsmlViewport = updateViewportDimensions();
			if ($('.sundial_static_post_container').length > 0) {
				$('.sundial_static_post-image.product img').height(2*$('.sundial_static_post_block').height());
			}
		});

	});
  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  
//   loadGravatars();
  
  var nav = $('header');
  
	
	$(window).scroll(function () {
		var height= nav.outerHeight();
		if ($('header').hasClass('active')) {
			$('header').removeClass('active');
		}
		if ($(this).scrollTop() > 0) {
			nav.addClass("scroll");
			$('section').css("padding-top", nav.height() + 'px');
		} else {
			nav.removeClass("scroll");
			$('section').css("padding-top", '0');
		}
	});
	
	if ($('.menu-toggle').length > 0) {
	
		$('.menu-toggle').click( function(e) {
		
			e.preventDefault();
			$('header.header').toggleClass('active');
		
		});
	
	}
	
	if ($('.cAc_wpsml-content').length > 0) {
	
		$('.cAc_wpsml-content').each( function() {
		
			$(this).find('h1').addClass('benefit dark');
			$(this).find('h2').addClass('ingredients');
			$(this).find('h3').addClass('need-state');
			$(this).find('a').addClass('btn');
		
		});
	
	}



}); /* end of as page load scripts */
