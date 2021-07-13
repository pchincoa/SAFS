/*******************************************************************************************
 *
 *	FIND THE CANVAS ELEMENT AND CHANGE THE SIZE
 *
 *******************************************************************************************/ 
function hello() {
	alert("hello");
}

function p5js_adjust_canvas(id) {
	// GET THE IFRAMES
	jQuery("iframe").each(function(){
		var iframe = jQuery(this);
		//console.log(iframe);
		var id = iframe.attr('id');
		//console.log(id);
		var doc = document.getElementById(id);
		var content = doc.contentDocument;
		//console.log(content);
		canvas = content.getElementById('defaultCanvas0');
		//console.log(canvas);
		canvas.style.width  = '100%';
		canvas.style.height = '100%'
    });
} // p5js_adjust_canvas()