Scripts are loaded using Require.js <http://requirejs.org/>. Require is a dependency manager and script optimizer that can be used in 2 different ways:

- Resolve dependencies and serve files over HTTP through a non-blocking loader
- Run through a compiler and minified/combined into a single file

We're using the compiler option, so we've included all non-minified source files in this directory. Running the build script will populate the js/ directory with minified, combined files.

You can download the build script here: http://requirejs.org/docs/download.html#optimizationtool.

It requires node.js, which you can easily install using MacPorts (http://www.macports.org/):

	sudo port selfupdate
	sudo port install nodejs

That might take a few minutes... While you're waiting, why don't you check out the Require.js documentation:
http://requirejs.org/docs/optimization.html#wholeproject
http://requirejs.org/docs/jquery.html
https://github.com/jrburke/requirejs/blob/master/build/example.build.js

Ok, finished? Assuming you put the require builder app next to this project's folder, here's the command for running the build script:

	cd ~/path/to/this/project/assets/js-dev/
	../../../requirejs/build/build.sh app.build.js

app.build.js is just a set of instructions for how/where to dump the minified files.

All these jQuery plugins are licensed under open source licenses and documentation can be found at their respective websites. Non-minified versions of the scripts have been included.