ArmA server query Version 1.00
******************************

Mivo (mivo@post.cz)
------------------------------------------------------------------------------------------------------
Version history:

2007-03-06 (Version 1.00)
- Initial release
- Based on PHP code from [WKK] RealTime Server Query (RTSQ) for OFP
- PHP code rewrite and cleanup, language file for easy translation, XHTML compatibility,CSS 
- player table can be sorted by click on table head

------------------------------------------------------------------------------------------------------
Thanks to :

FCOPZ-illuminator - German translation, testing (http://www.fcopz.com)
[WKK] EazyOne - Danish translation, testing, bug reporting (http://www.wkk.dk)

Maker of original RTSQ - [WKK] LordNam http://www.wkk.dk
6th Sense advSQ - http://6thsense.eu
------------------------------------------------------------------------------------------------------

Requirements:
**********************************************************

A web server running PHP version 4.x is required, Linux OR Windows.

Setup:
**********************************************************

For standalone use, edit file "armaquery.php" and set parameter $server and $lang as required. You can also
call this script without parameters, then it display form for server selection. Detailed comments
included in code.

For integration to your CMS (Content Management System) like PHPnuke etc, edit file "armaq_cms.php"
and set parameter $server and $lang as required. You should take care yourself of HTML CSS formating.

Available URL patrameters :
***************************

Example :
http://server.com/armaquery.php?server=arma.server.com:2302&lang=en&debug=1

server=server:port - server address IP or FQDN and port  
lang=en - language selection
debug=1 - show debugging information - RAW query data

The source consists of the following files:
**********************************************************

"armaquery.php" - example-file showing how to query, display results on a webpage
"armaq_cms.php" - example-file without HTML header and formating for include to CMS (PHP Nuke etc.)
"arma.css"      - CSS (Cassaded Style Sheet) - all HTML formating
"pixel.gif"     - 1 pixel gif - black, for FANCY serverload graphics
"pixel2.gif"    - 1 pixel gif - white, for FANCY serverload graphics

"arma.php"      - class/library for querying ArmA servers. Modify only if want change behavior of this class !
"arma_text.php" - include-file of "arma.php", string tables for easy translation to new languages.
                  Modify only if translating texts to new language ! Current language is selected in
                  armaquery.php
