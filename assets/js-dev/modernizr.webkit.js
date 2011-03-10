define(function(){
	window.Modernizr.addTest('webkit', function(){
		return 'webkitAppearance' in document.createElement('select').style;
	});
});