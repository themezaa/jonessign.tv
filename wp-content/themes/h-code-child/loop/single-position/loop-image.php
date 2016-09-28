<?php
/**
 * displaying single posts featured image for blog
 *
 * @package H-Code
 */
?>
<?php
$blog_image=hcode_post_meta("hcode_image");
if($blog_image == 1){
echo '<div class="blog-image bg-transparent">';
    if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'full' );
    }else{
        echo '<img src="' . HCODE_THEME_ASSETS_URI . '/images/no-image.jpg" width="900" height="600" alt="" />';
    }
echo '</div>';
}
?>