/*
Note: don't load Modernizr.js through require.js.
The HTML5 shim doesn't work properly in IE when loaded through require.js -- don't know why.
Instead, add the script tag to the head of the document above the require call.

Since we're using the server-side compiler with Require, we use the uncompressed script versions
to prevent double-compression warnings.

If you were to use Require.js on the client side instead, you would want to use minified scripts instead.
*/
/* Add class to head for webkit. Used for select box styles */
require(["jquery", "modernizr.webkit", "jquery.scrollTo", "jquery.localscroll"], function($) {
	$(function() {
		// Animated anchor scrolling
		$.localScroll({
			hash: true,
			duration: 500
		});
		
		/**
		 * Scroll down to form if there's an error
		 */
		var form = $('#contribution');
		if (form.length > 0) {
			form.attr("action", form.attr("action") + "#act-3");
		};
		
		/**
		 * :active state patch for IE8, IE7
		 */
		$('#moz-header ul li').mousedown(function(){
			$(this)
				.siblings().removeClass('active').end()
				.addClass('active');
		}).mouseup(function(){
			$(this).siblings().andSelf().removeClass('active');
		});
	});
});