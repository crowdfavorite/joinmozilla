We're using LESS to keep things readable on the developer's end and efficient on the user's end.

- See https://github.com/cloudhead/less.js/
- http://lesscss.org/ gives an overview of the syntax, albeit slightly out of date with newer features (it's now a JS script rather than a Ruby Gem).
- http://incident57.com/less/ is a free OSX LESS compiler that comes with all the necessary stuff bundled right in. Nice!

It's not necessary to include this directory in production code.

Note that only the main.less file should be compiled. The output path should be the css directory.