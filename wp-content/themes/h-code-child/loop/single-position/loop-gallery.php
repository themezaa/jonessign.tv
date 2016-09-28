<?php
/**
 * displaying single posts in gallery for blog
 *
 * @package H-Code
 */
?>
<?php
$blog_lightbox_gallery = hcode_post_meta('hcode_lightbox_image');
$blog_gallery = hcode_post_meta('hcode_gallery');
$gallery = explode(",",$blog_gallery);
$popup_id = 'blog-'.get_the_ID();
$image = '';
if($blog_lightbox_gallery == 1){
	if(is_array($gallery)):
		foreach ($gallery as $key => $value) {
			$thumb = wp_get_attachment_image_src( $value, 'full' );
			if($thumb[0]):
                $image .='<div class="col-md-4 col-sm-6 col-xs-12 no-padding">';
                    $image .='<a title="'.get_the_title().'" href="'.$thumb[0].'" class="lightboxgalleryitem" data-group="'.$popup_id.'"><img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" alt=""/></a>';
                $image .='</div>';
            endif;
		}
	endif;
	echo '<div class="blog-image bg-transparent lightbox-gallery margin-bottom-30px">';
        echo $image;
    echo '</div>';
}else{
	if(is_array($gallery)):
		foreach ($gallery as $key => $value) {
			$thumb = wp_get_attachment_image_src( $value, 'full' );
			if($thumb[0]):
	            $image .='<div class="item"><img src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'" alt=""/></div>';
	        endif;
		}
	endif;
	echo '<div class="blog-image bg-transparent margin-bottom-30px">';
        echo '<div id="owl-demo" class="owl-carousel owl-theme dark-pagination">';
			echo $image;
        echo '</div>';
    echo '</div>';
}

$blog_image=hcode_post_meta("hcode_featured_image");
if($blog_image == 1){
	echo '<div class="blog-image bg-transparent">';
        if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'full' );
        }else {
            echo '<img src="' . HCODE_THEME_ASSETS_URI . '/images/no-image.jpg" width="900" height="600" alt=""/>';
        }
	echo '</div>';
}	
?>