Remove BOM from code
======

###What is BOM

> The byte order mark (BOM) is a Unicode character used to signal the endianness (byte order) of a text file or stream. It is encoded at U+FEFF byte order mark (BOM). BOM use is optional, and, if used, should appear at the start of the text stream. Beyond its specific use as a byte-order indicator, the BOM character may also indicate which of the several Unicode representations the text is encoded in.
Because Unicode can be encoded as 16-bit or 32-bit integers, a computer receiving these encodings from arbitrary sources needs to know which byte order the integers are encoded in. The BOM gives the producer of the text a way to describe the text stream's endianness to the consumer of the text without requiring some contract or metadata outside of the text stream itself. Once the receiving computer has consumed the text stream, it presumably processes the characters in its own native byte order and no longer needs the BOM. Hence the need for a BOM arises in the context of text interchange, rather than in normal text processing within a closed environment.

[BOM wiki][]

###How BOM can affect the code  
example:  
    <link type="text/css" rel="stylesheet" href="http://10.88.226.202/skin/adminhtml/default/default/reset.css" 
this code seem like well, but if we copy the link to browser, we will see the following:  
![bom error][]


###Resolve the problem  
open the php script from `src/bom.php`  
change the folder directory  
    $ php bom.php  
then all the bom will be removed

[bom wiki]: http://en.wikipedia.org/wiki/Byte_order_mark "BOM Wiki"
[bom error]: ./static/bom_error.png "BOM Error"
