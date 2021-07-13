<?php

function dc_social_sharing_buttons($content) 
{
	if( is_single() )
	{	
		$plantilla		='
		 <a class="dc-link dc-twitter" href="{twitter}" target="_blank"><i class="fa fa-twitter"></i> Twitter </a>'.
		'<a class="dc-link dc-facebook" href="{facebook}" target="_blank"><i class="fa fa-facebook"></i> Facebook </a>';
		//'<a class="dc-link dc-instagram" href="{instagram}" target="_blank"><i class="fa fa-instagram"></i>Instagram </a>';
		
		$cad			='';
		$urlArticulo 	= urlencode(get_permalink());
 		$titleArticulo 	= str_replace( ' ', '%20', get_the_title());

		// Urls
		$twitterURL	= 'https://twitter.com/intent/tweet?text='.$urlArticulo;
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$urlArticulo;
		//$instagramURL = 'https://instagram.com/share?url='.$urlArticulo;
 
		$ar_buscar 		= array('{twitter}','{facebook}');
		$ar_reemplazar 	= array($twitterURL,$facebookURL);

		$cad	.= '<div class="dc-social">';
		//$cad	.= '<p>¿Me ayudas a llegar a más gente?</p>';
		$cad	.=  str_replace($ar_buscar, $ar_reemplazar, $plantilla);
		$cad	.= '</div>';

		//$content = $cad.$content; //botones superiores
		$content .= $cad; //botones inferiores

		return $content;
	}
	else
	{
		return $content;
	}
};

add_filter( 'the_content', 'dc_social_sharing_buttons',0);


