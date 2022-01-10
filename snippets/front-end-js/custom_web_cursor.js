// start: custom cursor

// style
let $body = document.getElementsByTagName('body')[0];
let $cursor = document.getElementById('cursor');

$body.style.cursor = "none !important";

$cursor.style.position = "absolute";
$cursor.style.zIndex = "10000";
$cursor.style.width = "40px";
$cursor.style.height = "40px";

// put your cursor image url here
$cursor.style.background = "transparent url(../icon/cursor/flame_cursor_2.gif) 0 0 no-repeat";


// functionality
// Set the offset so the the mouse pointer matches your gif's pointer
let cursorOffset = {
    left : -1
  , top  : -1
 };
 
 $body.addEventListener("mousemove", function (e) {
   
 
   $cursor.style.left = (e.pageX - cursorOffset.left) + 'px';
   $cursor.style.top = (e.pageY - cursorOffset.top) + 'px';
 
 }, false);




// end: custom cursor
