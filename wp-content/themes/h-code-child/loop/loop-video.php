<?php
/**
 * displaying posts video for blog
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
        echo '<div class="blog-image">';
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
        echo '<div class="blog-image fit-videos">';
            echo '<iframe src="'.$video_url.'" width="640" height="360"></iframe>';
        echo '</div>';
    endif;
}	
?>