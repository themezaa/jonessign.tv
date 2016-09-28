<?php
/**
 * displaying single posts featured image for blog
 *
 * @package H-Code
 */
?>
<?php
$blog_image=hcode_post_meta("hcode_image");
/* Image Alt, Title, Caption */
$img_alt = hcode_option_image_alt(get_post_thumbnail_id());
$img_title = hcode_option_image_title(get_post_thumbnail_id());
$image_alt = ( isset($img_alt['alt']) ) ? $img_alt['alt'] : '' ; 
$image_title = ( isset($img_title['title']) ) ? $img_title['title'] : '';

$img_attr = array(
    'title' => $image_title,
    'alt' => $image_alt,
);
if($blog_image == 1){
echo '<div class="blog-image bg-transparent">';
    if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'full',$img_attr );
    }else{
        echo '<img src="' . HCODE_THEME_ASSETS_URI . '/images/no-image.jpg" width="900" height="600" alt="" />';
    }
echo '</div>';
}
?>