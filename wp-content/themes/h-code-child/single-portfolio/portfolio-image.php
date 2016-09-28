<?php
/**
 * last update  23_September_2016
 * displaying portfolio single posts featured image for portfolio
 *
 * @package H-Code-child
 */
?>
<?php
$portfolio_image = hcode_post_meta('hcode_image');
/* Image Alt, Title, Caption */
$img_alt         = hcode_option_image_alt(get_post_thumbnail_id());
$img_title       = hcode_option_image_title(get_post_thumbnail_id());
$image_alt       = ( isset($img_alt['alt']) ) ? $img_alt['alt'] : '' ;
$image_title     = ( isset($img_title['title']) ) ? $img_title['title'] : '';

if($portfolio_image == 1){
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
	$url   = $thumb['0'];
    if($url):
        echo '<div class="gallery-img margin-bottom-30px">';
            echo '<img src="' . $url . '" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.' />';
        echo '</div>';
    else:
    	echo '<img src="' . HCODE_THEME_ASSETS_URI . '/images/no-image.jpg" width="900" height="600" alt="" />';
    endif;
}
?>