/**
NOTE: this file is not used on the front-end. It is a server side script meant to be
used with Require JS' command line build script.

See README.txt file in the js-dev directory for more info.
*/
({
	appDir: "./",
	baseUrl: "./", // Relative path to modules from appDir
	dir: "../js/", // Output path

	paths: {
		"jquery": "require-jquery"
	},

	modules: [
		{
			name: "main",
			exclude: ["jquery"]
		}
	]
})
