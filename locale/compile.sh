#!/bin/bash

# syntax:
# compile-mo.sh locale-dir/

lockfile="/tmp/compile-mo.lock"

function usage() {
    echo "syntax:"
    echo "compile.sh locale-dir/"
    exit 1
}

# check if the lockfile exists
if [ -e $lockfile ]; then
    echo "$lockfile present, exiting"
    exit 99
fi

# check if file and dir are there
if [[ ($# -ne 1) || (! -d "$1") ]]; then usage; fi

touch $lockfile
for lang in `find $1 -type f -name "*.po"`; do
    dir=`dirname $lang`
    stem=`basename $lang .po`
    msgfmt -o ${dir}/${stem}.mo $lang
done
rm $lockfile
