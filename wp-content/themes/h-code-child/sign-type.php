<?php
/**
 * This represents the taxonomy tag "sign-type"
 *
 * @package H-Code-Child
 */
?>
<?php
$featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
if($featured_image):
	$featured_image = $featured_image;
else:
	$featured_image = HCODE_THEME_ASSETS_URI . '/images/no-image.png';
endif;
$uses = get_field("use_cases");
$sign = get_field( "signtype_description" );
?>
<!-- featured image appears at the top and is the background image of a div that has a height of half the window -->
<section id="sign-type-single" class="flex row-nw justify-start align-content-end" style="background-image:url(<?php echo $featured_image; ?>); background-size:cover; background-position:top right;">
	<div id="sign-type-header" class="flex col-nw justify-center align-content-start">
			<h1 class="alt-font white-text letter-spacing-6">
	     <?php echo get_the_title(); ?>
	</h1>
	<div id="sign-type-definition" class="sign-type-header"><span>Definition:<br /></span><?php echo $sign; ?></div>
	<div id="sign-type-use-case" class="sign-type-header"><span>Use Cases</span><br /><?php echo $uses; ?></div>
	</div>
</section>

<section>
<!-- project type header -->
<div class="flex row-nw justify-center align-content-center">
	<h2> <?php echo 'Featured ' .  get_the_title() . ' Projects'; ?> </h2>
</div>
<!-- end project type header-->
	<?php echo do_shortcode('[hcode_portfolio hcode_portfolio_style="grid-with-title" hcode_post_per_page="4" hcode_enable_lightbox="1" hcode_categories_list="national-programs"]'); ?>
</section>

<section>
	<?php echo do_shortcode('[hcode_image_gallery image_gallery_type="simple-image-lightbox" simple_image_type="zoom" image_gallery="17859,17853,17847,17848,17854,17845,17846,17851,17849,17844"]'); ?>
</section>







