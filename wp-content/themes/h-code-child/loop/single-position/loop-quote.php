<?php
/**
 * displaying single posts quote for blog
 *
 * @package H-Code
 */
?>
<?php
$blog_quote = hcode_post_meta('hcode_quote');
echo '<div class="blog-image margin-bottom-30px">';
    if($blog_quote):
        echo '<blockquote class="bg-gray">';
            echo '<p>'.$blog_quote.'</p>';
        echo '</blockquote>';
    endif;
echo '</div>';

$blog_image=hcode_post_meta("hcode_featured_image");
if($blog_image == 1){
    echo '<div class="blog-image bg-transparent">';
        if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'full' );
        }else {
            echo '<img src="' . HCODE_THEME_ASSETS_URI . '/images/no-image.jpg" width="900" height="600" alt="" />';
        }
    echo '</div>';
}	
?>