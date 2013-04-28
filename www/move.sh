#!/bin/sh

count=
function is_exist() {
    count=`ls -l $1 2> /dev/null | wc -l`
}
webroot='/var/www/html';
whitedir=('templates/')

if [ ${#whitedir} -gt 0 ]
then
    cp -r ${whitedir[*]} $webroot
fi

is_exist '*.php'
if [ $count -gt 0 ] 
then
    cp *.php $webroot
fi

is_exist '*.html'
if [ $count -gt 0 ] 
then
    cp *.html $webroot
fi

is_exist '*.js'
if [ $count -gt 0 ] 
then
    cp *.js $webroot
fi

is_exist '*.css'
if [ $count -gt 0 ] 
then
    cp *.css $webroot
fi

exit

