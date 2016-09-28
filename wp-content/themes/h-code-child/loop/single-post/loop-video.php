<?php
/**
 * displaying single posts video for blog
 *
 * @package H-Code
 */
?>
<?php
$video_type = hcode_post_meta('hcode_video_type');
$video = hcode_post_meta('hcode_video');
if($video_type == 'self'){
	$video_mp4 = hcode_post_meta('hcode_video_mp4');
	$video_ogg = hcode_post_meta('hcode_video_ogg');
	$video_webm = hcode_post_meta('hcode_video_webm');
    $mute = hcode_post_meta('hcode_enable_mute');
    $enable_mute = ($mute == 1) ? 'muted ' : '';
    if($video_mp4 || $video_ogg || $video_webm):
        echo '<div class="blog-image bg-transparent text-center margin-bottom-30px">';
            echo '<video autoplay '.$enable_mute.'loop controls>';
                if(!empty($video_mp4)){
                        echo '<source src="'.$video_mp4.'" type="video/mp4">';
                }
                if(!empty($video_ogg)){
                        echo '<source src="'.$video_ogg.'" type="video/ogg">';
                }
                if(!empty($video_webm)){
                        echo '<source src="'.$video_webm.'" type="video/webm">';
                }
            echo '</video>';
        echo '</div>';
    endif;
	
}else{
	$video_url = hcode_post_meta('hcode_video');
    if($video_url):
        echo '<div class="blog-image bg-transparent fit-videos margin-bottom-30px">';
            echo '<iframe src="'.$video_url.'" width="640" height="360"></iframe>';
        echo '</div>';
    endif;
}

$blog_image=hcode_post_meta("hcode_featured_image");
if($blog_image == 1){
    /* Image Alt, Title, Caption */
    $img_alt = hcode_option_image_alt(get_post_thumbnail_id());
    $img_title = hcode_option_image_title(get_post_thumbnail_id());
    $image_alt = ( isset($img_alt['alt']) ) ? $img_alt['alt'] : '' ; 
    $image_title = ( isset($img_title['title']) ) ? $img_title['title'] : '';

    $img_attr = array(
        'title' => $image_title,
        'alt' => $image_alt,
    );
    echo '<div class="blog-image bg-transparent">';
        if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'full',$img_attr );
        }
        else {
                echo '<img src="' . HCODE_THEME_ASSETS_URI . '/images/no-image.jpg" width="900" height="600" alt="" />';
        }
    echo '</div>';
}
?>