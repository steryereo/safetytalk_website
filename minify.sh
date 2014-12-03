#!/bin/bash
 
# Search YUI Compressor anywhere in your home dir
echo "Searching for YUI Compressor..."
YUIC=`which yuicompressor`
if ! [ $YUIC ]
then
    echo "Unable to find YUI Compressor! Goodbye!"
    exit
fi
 
echo -e "YUI Compressor found! Start compressing...\n"
 
function _c
{
    fname=$(basename "$1")
    dest=$(dirname "$1")
    ext="${fname##*.}"
    dest_fname="$dest/${fname%.*}.min.$ext"
    echo "Compressing $1..."
    $YUIC $1 > $dest_fname
    git add $dest_fname
    echo "Done."
    echo ""
}
 
for file in $(ls js/*.js css/*.css|grep -vi min.);
do
    _c $file
done
 
echo "That is all."