/*******************************************************************************************
 *
 *	FIND THE CANVAS ELEMENT AND CHANGE THE SIZE
 *
 *******************************************************************************************/ 
var doc;
var content;
var canvas;
function p5js_change_canvas_size() {
	// GET THE IFRAMES
	jQuery("iframe").each(function(){
		var iframe = jQuery(this);
		// THE RIGHT PLUGIN
		var id = iframe.attr('id');
		// EXTRA CHECK
		if (id.substr(0, 4) == 'p5js') {
			doc = document.getElementById(id);
			content = doc.contentDocument;
			canvas = content.getElementById('defaultCanvas0');
			if (canvas == null) {
				setTimeout(p5js_change_canvas_size, 1000);
			} else {
				canvas.style.width  = '100%';
				canvas.style.height = '100%'
			}
		} // if (id.substr(0, 4) == 'p5js')
    });
} // p5js_change_canvas_size()

// ADDEVENT LISTENERS
if (canvas !== null) {
	window.addEventListener('load', p5js_change_canvas_size, false);
}