<?php
/**
 * displaying position single posts video for position
 *
 * @package H-Code
 */
?>
<?php
$video = hcode_post_meta('hcode_video');
if (strpos($video,'player.vimeo.com') == true) {
	$video_url = $video;
}else{
	$video_url = 'https://www.youtube.com/embed/'.substr($video, strpos($video, "v=") + 2);
}
if($video):
    echo '<div class="gallery-img fit-videos margin-bottom-30px">';
        echo '<iframe src="'.$video_url.'"></iframe>';
    echo '</div>';
endif;

$portfolio_image=hcode_post_meta('hcode_featured_image');
if($portfolio_image == 1){
    /* Image Alt, Title, Caption */
    $img_alt = hcode_option_image_alt(get_post_thumbnail_id());
    $img_title = hcode_option_image_title(get_post_thumbnail_id());
    $image_alt = ( isset($img_alt['alt']) ) ? $img_alt['alt'] : '' ;
    $image_title = ( isset($img_title['title']) ) ? $img_title['title'] : '';

	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
	$url = $thumb['0'];
    if($url):
        echo '<div class="gallery-img margin-bottom-30px">';
            echo '<img src="' . $url . '" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.' />';
        echo '</div>';
    else:
    	echo '<img src="' . HCODE_THEME_ASSETS_URI . '/images/no-image.jpg" width="900" height="600" alt="" />';
    endif;
}
?>