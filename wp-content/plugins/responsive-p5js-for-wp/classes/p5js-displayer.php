<?php
/************************************************************************************************
 *
 *	DISPLAYER CLASS: DISPLAY HEADERS, CURRENT SETTINGS, BUTTONS
 *
 ************************************************************************************************/
?>
<?php
class P5JS_Displayer {
	/********************************************************************************************
	 *	CONSTRUCTOR
	 ********************************************************************************************/	
    function __construct() {
	} // __construct()
	
	/********************************************************************************************
	 *
	 *	DISPLAY THE PAGE HEADER
	 *
	 ********************************************************************************************/	
	function display_header() {
		global $p5js_class;

		// V4.1.9: RUNNING INDICATOR ADDED				
?>

<div class="p5js-title-bar">
  <h2>
    <?php _e('Responsive P5JS for WP', $p5js_class->txt_domain)?>
  </h2>
</div>
<div class="p5js-subheader-container">
  <div class="p5js-subheader-left p5js-bodytext">
    <p><em>
      <?php _e('Embed your P5JS sketches in posts and pages in a responsive way.', $p5js_class->txt_domain)?>
      </em></p>
    Plugin version: v<?php echo $p5js_class->version ?> [<?php echo $p5js_class->release_date ?>]<br>
    <a href="http://cagewebdev.com/responsive-p5js-wordpress-plugin/" target="_blank">
    <?php _e('Plugin page', $p5js_class->txt_domain)?>
    </a> - <a href="http://wordpress.org/plugins/responsive-p5js-for-wp/" target="_blank">
    <?php _e('Download page', $p5js_class->txt_domain)?>
    </a> - <a href="http://rvg.cage.nl/" target="_blank">
    <?php _e('Author', $p5js_class->txt_domain)?>
    </a> - <a href="http://cagewebdev.com/" target="_blank">
    <?php _e('Company', $p5js_class->txt_domain)?>
    </a></div>
  <!--p5js-subheader-left-->
  <div class="p5js-subheader-right" title="Click here to make your donation!">
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
      <input name="cmd" type="hidden" value="_s-xclick" />
      <input name="hosted_button_id" type="hidden" value="PHBSSTQPXQDGG" />
      <input alt="PayPal - The safer, easier way to pay online!" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" type="image" />
      <img src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" alt="" width="1" height="1" border="0" />
    </form>
  </div>
  <!-- p5js-subheader-right --> 
</div>
<!-- p5js-subheader-container-->
<?php        
	} // display_header


	/********************************************************************************************
	 *
	 *	DISPLAY THE INSRUCTIONS INTRO
	 *
	 ********************************************************************************************/		
	function display_intro() {
		global $p5js_class;
?>
<div class="p5js-title-bar">
  <h2>Introduction</h2>
</div>
<br>
<br>
<div class="p5js-subheader p5js-bodytext"> <a href="http://p5js.org" target="_blank">P5JS</a> is a Javascript Framework based on the <a href="http://processing.org" target="_blank">Processing</a> language.<br>
  <br>
  Processing is a flexible software sketchbook and a language for learning how to code within the context of the visual arts.<br>
  Since 2001, Processing has promoted software literacy within the visual arts and  visual literacy within technology.<br>
  There are tens of thousands of students, artists, designers, researchers, and hobbyists who use Processing for learning and prototyping.<br>
  <br>
  With this plugin you can embed your P5JS sketches in your WordPress site.<br>
  The sketch will be responsive: it scales automatically when the window is being resized. </div>
<!-- p5js-subheader -->
<?php
	} // display_instructions_intro()
	
	/********************************************************************************************
	 *
	 *	DISPLAY THE INSRUCTIONS
	 *
	 ********************************************************************************************/		
	function display_instructions() {
		global $p5js_class;
?>
<div class="p5js-title-bar">
  <h2>Instructions</h2>
</div>
<div id="p5js-instructions" class="p5js-bodytext">
  <ol>
    <li><span class="p5js-bold">Create a new sub-directory in the <code>/uploads/p5js/</code> directory (using FTP):</span><br><br>
      <code>/uploads/p5js/[sketch_folder]</code><br><br>
      (replace <code>[sketch_folder]</code> with the name of the P5JS sketch you want to embed, for instance <code>/uploads/p5js/myfirstsketch</code>) <br><br>
      If you don't like to use FTP, you can use a file manager plugin like:<br />
      <a href="https://wordpress.org/plugins/wp-file-manager/" target="_blank">https://wordpress.org/plugins/wp-file-manager/</a><br>
      <br>
    </li>  
    <li><span class="p5js-bold">Upload all files and directories (index.html, scetch.js, libraries, etc) of your P5JS sketch to the new WordPress <code>/uploads/p5js/[sketch_folder]</code> directory.</span>
    <br><br>
    <span class="p5js-bold">NOTE: your sketch needs to have an index.html file!</span>
    <br><br>
    <img src="<?php echo $p5js_class->images_url ?>p5js_uploads.png" style="width: 80%" /><br><br>
    
    </li>
    <br>
    <li><span class="p5js-bold">Add a short code to your post or page:</span><br><br>
      <code>[p5js sketchfolder=myfirstsketch canvaswidth=566 canvasheight=378 bordersize=1 bordercolor=#aaa][/p5js]</code><br>
      <br>
      <span class="p5js-bold">Attributes</span><br>
      <span class="p5js-bold">sketchfolder</span>: the name of your P5JS sketch (<span class="p5js-bold">REQUIRED</span>)<br>
      <span class="p5js-bold">canvaswidth</span>: the width of the sketch, should be the same as in your creattecanvas() statement (<span class="p5js-bold">REQUIRED</span>)<br>
      <span class="p5js-bold">canvasheight</span>: the height of the sketch, should be the same as in your creattecanvas() statement (<span class="p5js-bold">REQUIRED</span>)<br />
      <span class="p5js-bold">bordersize</span>: size of the border in pix (<span class="p5js-bold">OPTIONAL</span>, default: 0px)<br>
      <span class="p5js-bold">bordercolor</span>: color of the border around the sketch (<span class="p5js-bold">OPTIONAL</span>, default: no border, only works when you also define a bordersize)<br>
    </li>
          <br>
      <li><span class="p5js-bold">Questions?</span><br><br>
      Don't hesitate to send me an <a href="mailto: info@cagewebdev.com">email</a>.<br><br>
      ENJOY!
      </li>
  </ol>
</div>
<?php		
	} // display_instructions
} // P5JS_Displayer


