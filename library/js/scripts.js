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
var viewport = updateViewportDimensions();


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




/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

	$.urlParam = function(name){
		var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
		if (null == results) {
			return '';
		}
		return results[1] || 0;
	}

  /*
   * Let's fire off the gravatar function
   * You can remove this if you don't need it
  */
  loadGravatars();
  
  //show or hide .catinfo with class catImageId
	function showCatInfo(catImageId) {
		
		var catParent = jQuery('.sub-categories.'+catImageId);
		var catInfo = jQuery('.sub-cat-info.'+catImageId);
		var isStacked = true;
		//if elements are not 'stacked', the width of the li will be less than that of the ul
		if (jQuery(catParent).closest('li').width() !== jQuery(catParent).closest('ul').width()) {
			
			isStacked = false;
		
		}	//if (jQuery(catParent).closest('li').width() !== jQuery(catParent).closest('ul').width())
		//if catinfo is already showing, hide it
		if (jQuery(catParent).hasClass('active')) {
			
			hideCatInfo(catParent, catInfo);
		
		}
		//otherwise, we'll show it
		else {
		
			//first, hide any other .catInfo that is showing
			if (jQuery('.sub-categories.active').length > 0) {
			
				var activeCatClass = jQuery('.sub-categories.active').find('a.show-subcat-info').attr('id');
				var activeCatParent = jQuery('.sub-categories.'+activeCatClass);
				var activeCatInfo = jQuery('.sub-cat-info.'+activeCatClass);
				hideCatInfo(activeCatParent, activeCatInfo, false);
			
			}	//end if (jQuery('.sub-categories.active').length > 0)
			//show this .catinfo
			jQuery(catParent).addClass('active');
			var tempInfo = catInfo.detach();
			//we always want .catInfo to display under the image that was clicked or tapped
			//therefore, if they are 'stacked', we append the .catinfo to the li (column)
			//and if they are not 'stacked', we append the .catInfo to the ul
			var row = (isStacked) ? jQuery(catParent).closest('li') : jQuery(catParent).closest('ul');
			jQuery(row).after(tempInfo);
			jQuery('.sub-cat-info.'+catImageId).slideDown("slow");
		
		}	//end if (jQuery(catParent).hasClass('active'))
	
	}	//end showCatInfo(catImageId)
	
	//reverse process to hide .catInfo
	function hideCatInfo(catParent, catInfo, slide) {
		
		//use argument to determine slide or hide animation, default to true (use slide)
		slide = (typeof slide === 'undefined') ? 'true' : slide;
		jQuery(catParent).removeClass('active');
		//hide or slide
		if (slide) {
		
			jQuery(catInfo).slideUp("fast", function() {
			
				var tempInfo = catInfo.detach();
				jQuery(catParent).append(tempInfo);
			
			});	//end jQuery(catInfo).slideUp("fast", function()
		
		}
		else {
		
			jQuery(catInfo).hide("fast", function() {
			
				var tempInfo = catInfo.detach();
				jQuery(catParent).append(tempInfo);
			
			});
		
		}	//end if (slide)
	
	}
	
	if (jQuery('.show-subcat-info').length > 0 ) {
	
		jQuery('.show-subcat-info').click( function(event) {
		
			event.preventDefault();
			showCatInfo(this.id);
		
		});	//end jQuery(catInfo).slideUp("fast", function()
	
	}	//end if (jQuery('.show-subcat-info').length > 0 )
	
	
	if (jQuery('#show-menu').length > 0 ) {
	
		jQuery('#show-menu').click( function(e) {
		
			e.preventDefault();
			jQuery('#menu-main').toggleClass('active');
		
		});	//end jQuery('#show-menu').click( function(e)
	
	}	//end if (jQuery('.show-subcat-info').length > 0 )
	
	if (jQuery('#menu-main li.menu-item-has-children').length > 0 ) {
	
		jQuery('#menu-main li.menu-item-has-children').on('swipe', function(e){ 
		
			alert('swipe'); 
			
		});
	
	}
	
	if (jQuery('nav .dropdown-items').length > 0 ) {
	
		var selectedItem = jQuery.urlParam('dropdownMenuSelected');
		var selected = false;
		if( selectedItem ) {
			jQuery('#' + selectedItem).find('a').addClass('selected');
		}
		selected = jQuery('nav .dropdown-items .selected');
		if ( '' != selected && selected ) {
		
			selected = jQuery(selected).text();
			jQuery('nav .dropdown-items').attr('select-text', selected);
		
		}
		else {
		
			jQuery('nav .dropdown-items:before').css('content', 'select:');
		
		}
		
		jQuery('nav .dropdown-items').click( function(e) {
		
			e.preventDefault();
			console.log(e);
			jQuery(this).toggleClass('active');
			jQuery('nav .dropdown-items:before').css('content', 'select:');
			var link = false;
			if( 'A' == e.srcElement.tagName ) {
			
				link = e.srcElement.href;
			
			}
			if (link) {
			
				jQuery(e.srcElement).addClass('selected');
				jQuery('nav .dropdown-items').attr('select-text', jQuery(e.srcElement).text() );
				link = link + '?dropdownMenuSelected=' + jQuery(e.srcElement).closest('li').attr('id');
				window.location = link;
				
			}
			var selected = jQuery('nav .dropdown-items .selected');
			if ( '' != selected && selected ) {
		
				selected = jQuery(selected).text();
				jQuery('nav .dropdown-items').attr('select-text', selected);
		
			}
			else {
		
				jQuery('nav .dropdown-items').attr('select-text', 'select:');
		
			}
			
		});
	
	}
	
	
	if (jQuery('div.typeform').length > 0 ) {
	
	   	if (/mobile|tablet/i.test(navigator.userAgent)) {
			 
			 jQuery('div.typeform iframe').click( function() {
			
				jQuery(this).css( 'position', 'absolute' ).css( 'top', '0' ).css( 'left', '0' ).css( 'right', '0' ).css( 'bottom', '0' );
			
			});

		}
	
	}


}); /* end of as page load scripts */
