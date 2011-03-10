/*
Note: don't load Modernizr.js through require.
It won't work properly in IE when loaded through require.
Instead, add the script tag to the head of the document above the require call.

Every JS file in the working HTML has a .min minified equivalent.
Use the .min version of the scripts if you want to use the parallel-load
client-side functionality of Require JS.
If you are going to compile server-side with Require, use the uncompressed versions
to prevent double-compression warnings.
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