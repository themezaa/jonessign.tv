<?php
/**
 * single jones sign company portfolio posts
 * originally, this was in the theme h-code by themezaa.com, but it was modified & revised by nick mortensen

 * @package H-Code-child
 * last update   20 September_2016
 */
?>
<?php



//end dompdf stuff
// these settings are standard and from the template, using the redux framework
$output            = '';
$portfolio_image   = hcode_post_meta( 'hcode_image' ); // post is set to image THIS IS THE STANDARD
$portfolio_gallery = hcode_post_meta( 'hcode_gallery' ); // post is set to gallery
$portfolio_video   = hcode_post_meta( 'hcode_video' );  // post is set to video
$portfolio_link    = hcode_post_meta( 'hcode_link_type' ); // post is set to link
$hcode_options     = get_option( 'hcode_theme_setting' );  //options from h-code template
$layout_settings   = ( isset ( $hcode_options['hcode_layout_settings_portfolio'] ) ) ? $hcode_options['hcode_layout_settings_portfolio'] : '';
if( empty( $layout_settings ) ) {
    $layout_settings = hcode_option( 'hcode_layout_settings' );
} else {
    $layout_settings = hcode_option_portfolio( 'hcode_layout_settings' );
}
$section_class_start = $section_class_end = $portfolio_title = $portfolio_meta = $portfolio_meta_start = $portfolio_meta_end = $portfolio_meta_category_start = $portfolio_meta_category_end = '';  // a shorter way of setting all these variables to nothing initially.  This comes in handy.

switch ( $layout_settings ) {
	// this is what we typically see in the jonessign.com installation of h-code
    case 'hcode_layout_full_screen':
        $section_class_start .= '<section class="no-padding-bottom"><div class="container"><div class="row"><div class="col-md-12">';
        $section_class_end .= '</div><!-- end div.col-md-12 --></div><!-- end div.row --></div><!-- end div.container --></section><!-- end section.no-padding-bottom -->';
        $portfolio_meta_category_start = '<section class="padding-top-40px no-padding-bottom"><div class="container"><div class="row"><div class="col-md-12 col-sm-12 text-center">';
        $portfolio_meta_category_end .= '</div><!-- end div.col-md-12.col-sm-12.text-center --></div><!-- end div.row --></div><!-- end div.container --></section><!-- end section.padding-top-40px.no-padding-bottom -->';
        $portfolio_meta_start .= '<div class="col-md-12 col-sm-12 col-xs-12 margin-five-bottom sm-margin-eight-bottom xs-margin-five-bottom">';
        $portfolio_meta_end .= '</div><!-- end div.col-md-12.col-sm-12.col-xs-12.margin-five-bottom.sm-margin-eight-bottom.xs-margin-five-bottom -->';
        break;
    //includes both sidebars, not typical when it comes to portfolio pages
    case 'hcode_layout_both_sidebar':
        $section_class_start .= '<section class="no-padding"><div class="container"><div class="row">';
        $section_class_end .= '</div><!-- end div.row --></div><!-- end div.container --></section><!-- end section.no-padding -->';
        $portfolio_meta_category_start .= '<section class="padding-top-40px no-padding-bottom clear-both"><div class="container"><div class="row"><div class="col-md-12 col-sm-12 text-center no-padding">';
        $portfolio_meta_category_end .= '</div><!-- end div.col-md-12.col-sm-12.text-center.no-padding --></div><!-- end div.row --></div><!-- end div.container --></section><!-- end section.padding-top-40px.no-padding-bottom.clear-both -->';
        break;
    // sidebar options, not typical for portfolio in the jonessign.com installation of h-code
    case 'hcode_layout_left_sidebar':
    case 'hcode_layout_right_sidebar':
        $section_class_start .= '<section class="no-padding"><div class="container"><div class="row">';
        $section_class_end .= '</div><!-- end div.row --></div><!-- end div.container --></section><!-- end div.no-padding -->';
        $portfolio_meta_category_start .= '<section class="padding-top-40px no-padding-bottom clear-both"><div class="container"><div class="row"><div class="col-md-12 col-sm-12 text-center no-padding">';
        $portfolio_meta_category_end .= '</div><!-- end div.container --></div><!-- end div.row --></div><!-- end div.col-md-12.col-sm-12.text-center.no-padding --></section><!-- end section.padding-top-40px.no-padding-bottom.clear-both -->';
        break;
}

// these are all based around which format is chosen for the post, in most cases, it is the image format
if ( !empty( $portfolio_gallery ) ) {
    ob_start();
    echo $section_class_start;
    echo $portfolio_title;
    get_template_part( 'loop/single-portfolio/portfolio', 'gallery' );
    echo $section_class_end;
    $output .= ob_get_contents();
    ob_end_clean();
} elseif ( !empty( $portfolio_video ) ) {
    ob_start();
    echo $section_class_start;
    echo $portfolio_title;
    get_template_part ( 'loop/single-portfolio/portfolio', 'video' ) ;
    echo $section_class_end;
    $output .= ob_get_contents();
    ob_end_clean();
} elseif ( !empty( $portfolio_image ) ) {
    ob_start();
    if( $portfolio_image == 1 ) {
        echo $section_class_start;
        echo $portfolio_title;
        get_template_part( 'loop/single-portfolio/portfolio', 'image' );
        echo $section_class_end;
    }
    $output .= ob_get_contents();
    ob_end_clean();
} else {
    /* Image Alt, Title, Caption */
    $img_alt     = hcode_option_image_alt( get_post_thumbnail_id() );
    $img_title   = hcode_option_image_title( get_post_thumbnail_id() );
    $image_alt   = ( isset( $img_alt['alt'] ) && !empty($img_alt['alt']) ) ? 'alt="' . $img_alt['alt'] . '"' : 'alt=""' ;
    $image_title = ( isset( $img_title['title'] ) && !empty( $img_title['title'] ) ) ? 'title="' . $img_title['title'] . '"' : '';

    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID () ), 'full' );
    $url   = $thumb['0'];
    if ( $url ):
        $output .= $section_class_start;
        $output .= $portfolio_title;
        $output .= '<div class="gallery-img margin-bottom-30px">';
            $output .= '<img src="' . $url . '" width="' . $thumb[1] . '" height="' . $thumb[2] . '" ' . $image_alt . $image_title . '>';
        $output .= '</div><!-- end div.gallery-img.margin-bottom-30px -->';
        $output .= $section_class_end;
    else:
        $output .= $section_class_start;
        $output .= $portfolio_title;
        $output .= '<div class="gallery-img margin-bottom-30px">';
            $output .= '<img src="' . HCODE_THEME_ASSETS_URI . '/images/no-image.png" width="900" height="600" alt=""/>';
        $output .= '</div><!-- end div.allery-img.margin-bottom-30px -->';
        $output .= $section_class_end;
    endif;
}
// end of contingencies involving type of post for portfolio (you won't encounter these, all portfolio items are set to the image post type)
echo $output;

// advanced custom fields variables for the field group entitled: "Testimonial"
$source      = get_field('testimonial_name');
$testimonial = get_field('testimonial_text');
$position    = get_field('testimonial_position');
$linked_url  = get_field('testimonial_linkedin_link');
$company     = get_field('testimonial_company');
$company_url = get_field('testimonial_company_link');
$linked_alt = 'Profile page for' . $source .' on LinkedIn';
$linkedIn = '<a href="' . $linked_url . '" alt="' . $linked_alt . '">' . $source . '</a>';
// if there is a linkedin link, then use a link to it around the quote source
$quoteSource = !empty( $linked_url ) ? $linkedIn: $source;
// advanced custom fields variables for the field group entitled: "Completed Project"
$header_image   = get_field( 'proj_header_image' );  // can be used as the header
$thumb          = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'full' );
$url            = $thumb[0];
$overlay        = 'background: linear-gradient(rgba(2,0,5, 0.75), rgba(2,115,185, 0.85) )'; // this is a more jones blue overlay
$header         = !empty( $header_image ) ? $header_image: $url; // prefer the header image added in ACF, but use the featured image if there is none
$default_narrative = 'This area reserved for a 4-6 sentence project narrative, to give the visitor an idea of what this project was about. What needs did Jones Sign Company help them out with?  What challenges needed to be overcome?  It should include some background details about the project & also list the types of signage that were a part of this particular project.';
$project_narrative = !empty(get_field('proj_write_up')) ? get_field('proj_write_up') : $default_narrative;
$headtitle = get_field('client_or_job');
// end additional variables derived from advanced custom fields
//
// PRINT
 $printThis = '<span class="pdf-button"><a class="print-to-pdf" rel="nofollow" href="#" title="Print to PDF" onclick="window.print();return false;"> <img class="pdf-print-link" src="http://jonessign.tv/wp-content/uploads/2016/09/Printer.svg" alt="print this project profile to PDF" style="max-width: 100px;" /> </a></span>' ;
?>
<!-- note: ALL SECTIONS MUST HAVE A DIV.CONTAINER AND A DIV.ROW TO NOT GET WONKY IF ONE IS USING BOOTSTRAP, WHICH WE ARE-->

<!-- BEGIN PROJECT HEADER WITH IMAGE, CLIENT NAME, and OVERLAY -->
<section class="no-padding hide-print"
		style="<?php echo $overlay; ?>, url(<?php echo $header; ?>);background-size: cover;background-position: center center;">
 <!-- BEGIN DIV CONTAINING CLIENT OR JOB NAME AS WELL AS A QUOTE ABOUT THE PROJECTIF AVAILABLE -->


	<div id="jones-project-header" class="container">
		<div  class="row">

			<?php if( have_rows( 'proj_clients' ) ): ?>
				<?php while ( have_rows( 'proj_clients' ) ): the_row();
				// set client information variable
				$client_name       = get_sub_field( 'proj_client_name' ); //company name
				$client_url        = get_sub_field( 'proj_client_link' ); //company link
				$client_logo       = get_sub_field( 'proj_client_image' ); //logo -- trying to use SVG
				$client_logo_bg    = get_sub_field( 'project_client_logo_background_color' ); //logo background color
				$client_logo_alt   = $client_logo['alt']; //logo alt text
				$jones_client_logo = $client_logo['url']; // location of logo to place in src tag
			?>
				<div id="project-client-information" class="full-width-headline flex col-nw justify-space-around align-items-center alt-font hide-print">
					<h3 class="project-client-name" >
						<?php
						// display job name or client name in header overlay
						if($headtitle == 'job'){
							$client_name = get_the_title();
						} ?>
						<a href="<?php echo $client_url; ?>" alt="<?php echo $client_name; ?> home page">
							<?php echo $client_name; ?>
						</a>
					</h3><!-- end h3.project-client-name-->
				</div><!-- end div#project-client-information -->

		<?php endwhile; ?>
		<?php endif; ?>
		</div><!-- end div.row -->
	</div><!-- end div#jones-project-header -->


</section><!-- end section.no-padding -->
<!-- END PROJECT HEADER WITH IMAGE, CLIENT NAME, and OVERLAY-->


<!-- BEGIN PROJECT TEXT CONTENT -->
<div class="container hide-print">
	<div id="project-information" class="row flex row-nw justify-space-around align-items-stretch">
		<div id="project-narrative" class="flex col-nw">
			<h2 class="jones-project-info">Project Information</h2>
			<?php
			// make sure we've written a narrative, if not set the narrrative to default from the variables near the top
				if( !empty( $project_narrative ) ) {
					$narrative = $project_narrative;
				} else {
					$narrative = $default_narrative;
				}
				echo '<div class="project-narrative-text">' . $narrative . '</div><!-- end of div.project-narrative-text-->';
			?>
		</div><!-- end div#project-narrative -->

		<!--BEGN ASIDE COLUMN-->
		<div id="project-aside" class="flex col-nw justify-center align-items-center">

			<dl id="project-aside-definition-list" class="aside">
				<!-- PRINT TO PDF -->
				<?php echo $printThis; ?>
				<!-- PRINT TO PDF -->
				<!-- client logo with link -->
				<?php if( have_rows( 'proj_clients' ) ): ?>
				<?php while ( have_rows( 'proj_clients' ) ): the_row(); ?>
					<?php
					//set variables for the proj_clients Repeater row using the get_sub_field function
					$jones_client_link     = get_sub_field('proj_client_link'); //client website url
					$jones_client_name     = get_sub_field('proj_client_name'); // client name
					$jones_client_logo     = get_sub_field('proj_client_image'); // client logo image
					$jones_client_logo_url = $jones_client_logo['url'];  // logo url
					$jones_client_logo_alt = $jones_client_logo['alt']; // logo alt tag text
					$client_logo_bg        = get_sub_field( 'project_client_logo_background_color' ); //logo background color
					?>
				<dd class="project-aside client-logo" >
					<?php if($jones_client_link): ?><!-- surround image with link only if link is given in the advanced custom field for this project-->
					<a href="<?php echo $jones_client_link; ?> " title="<?php echo $jones_client_name ?> " >
					<?php endif; ?>
						<img class="project-client-logo" src="<?php echo $jones_client_logo_url; ?>" alt="svg logo for <?php echo $jones_client_name; ?> " />
					<?php if($jones_client_link): ?>
					</a><!-- closing a tag should be surrounded in an if statement as well-->
					<?php endif; ?>
				</dd><!-- end dd.project-aside.client-logo-->
				<?php endwhile; ?> <!--end while(have_rows(proj_clients))-->
				<?php endif; ?><!-- end if(have_rows('proj_clients'))-->
				<!-- END PROJECT CLIENTS -->

				<!--BEGIN PROJECT STATUS-->
				<?php if(get_field('project_status')){
					$status = get_field('project_status');
					switch($status) {
						case 'complete':
						$status = ucwords($status);
						$status = $status . ' - ';
						$year = get_field('proj_completed');
						break;
						case 'ongoing':
							$status = ucwords($status);
							$status = $status . ' - Since ';
							$year = get_field('proj_year_began');
							break;
						case 'upcoming':
							$status = ucwords($status);
							$status = $status . ' - Expected Completion -  ';
							$year = get_field('proj_complete_expected');
							break;
					} // end switch for status
					echo '<dt class="project-aside status">Project Status: </dt><dd class="project-aside status">' . $status . $year . '</dd><!-- end project status-->';
				} ; ?>
				<!-- END PROJECT STATUS -->

				<!-- BEGIN PROJECT PARTNERS -->
				<?php if( have_rows( 'project_partners' ) ): ?>
				<?php while( have_rows( 'project_partners' ) ) : the_row();
					//setup variables based on thes three fields: project_partner_name,project_partner_url,project_partner_type
					$partner_name = get_sub_field('project_partner_name');
					$partner_url  = get_sub_field('project_partner_url'); // note that this field defaults to '#' if no link is set, so it will not break the layout if it isn't set
					$partner_type = get_sub_field('project_partner_type');
					?>
					<dt class="project-aside"><?php echo $partner_type; ?>: </dt>
					<dd class="project-aside"><a href="<?php echo $partner_url; ?>" title="<?php echo $partner_name; ?>"><?php echo $partner_name; ?></a></dd>
				<?php endwhile; ?>
				<?php endif; ?>
				<!-- END PROJECT PARTNERS -->

			</dl><!-- end dl#project-aside-definition-list -->
		</div><!-- end div#project-aside -->
		<!-- END OF ASIDE-->
	</div><!-- end div#project-information.row -->
</div><!-- end div.container -->
<!-- END PROJECT TEXT CONTENT-->

<!-- Begin PROJECT SQUARE IMAGES div -->
<div id="project-square-images-container" class="container hide-print">
	<div id="project-square-images-row" class="row">
		<?php $image_count =  count(get_field('square_images')); ?>
			<?php if( have_rows('square_images' ) ): ?>
				<?php while ( have_rows('square_images') ) : the_row(); ?>
				<?php
					$square_image = get_sub_field('square_image'); // set up variable to reference the square image array
					$square = $square_image;  // just to shorten the variable
					$square_url = $square['url']; // gets me the url from the image -- all images are arrays and need to be broken down further
                  	$square_title = $square['title'];
                  	$square_alt = $square['alt'];
                  	$square_caption = $square['caption'];
                  	// thumbnail
					$size = 'thumbnail';
					$thumb = $square['sizes'][ $size ];
					$width = $square['sizes'][ $size . '-width' ];
					$height = $square['sizes'][ $size . '-height' ];
				?>

						<figure id="project-square-image" class="cap-bot">
							<img src="<?php echo $square_url; ?>" alt="<?php echo $square_alt; ?>" style="width:calc((100vw / <?php echo $image_count; ?>) - 1px);height:calc((100vw / <?php echo $image_count; ?>) - 1px);" />
							<figcaption id="project-square-image">
								<?php echo $square_alt; ?>
							</figcaption> <!-- end of figure caption-->
						</figure><!-- end of figure-->

			<?php endwhile ?>
		<?php endif; ?>
	</div><!-- end div#project-images-row.row -->
</div><!-- end div#project-images-row.container -->
<!-- END PROJECT SQUARE IMAGES -->

<!-- BEGIN project testimonial-->
<?php
	// set up the fields from the testimonial fieldd group as variables
	$source      = get_field('testimonial_name');
	$testimonial = get_field('testimonial_text');
	$position    = get_field('testimonial_position');
	$linked_url  = get_field('testimonial_linkedin_link');
	$company     = get_field('testimonial_company');
	$company_url = get_field('testimonial_company_link');
// lets get funky and try the same thing out, only set our variables to make an object called $quote
	$quote = array(
				'source'      => get_field('testimonial_name'),
				'testimonial' => get_field('testimonial_text'),
				'position'    => get_field('testimonial_position'),
				'linked_url'  => get_field('testimonial_linkedin_link'),
				'company'     => get_field('testimonial_company'),
				'company_url' => get_field('testimonial_company_link'),
               )
 ?>

<?php if($testimonial) { ?>
<!-- BEGIN project testimonial-->
<div id="quote-container" class="container">
	<div class="row">
		<blockquote class="blockquote-reverse">
			<p><i class="fa fa-quote-left" aria-hidden="true"></i><?php echo $quote['testimonial']; ?><i class="fa fa-quote-right" aria-hidden="true"></i> </p> <!-- end quote -->
			<footer> <?php echo $quote['source'] . ' - <em>' . $quote['position'] . '</em> | ' . $quote['company']; ?> </cite> </footer><!-- end footer-->
		</blockquote>
	</div><!-- end div.row -->
</div><!-- end div.container -->
 <?php
} ?>
<!-- END project testimonial-->



<!-- CHECK TO SEE WHETHER THE SLIDER IMAGES FIELD HAS ANY IMAGE ADDED TO IT, IF SO, CREATE A NEW DIV WITH A SLIDESHOW -->
<?php if( have_rows('slider_images')): ?>
<!-- BEGIN PROJECT SLIDER IMAGES USING OWL CAROUSEL: DOCS @ http://owlgraphic.com/owlcarousel-->
<section>
	<div class="container">
		<div class="row">
			<div class="wpb_column vc_column_container col-xs-mobile-fullwidth col-sm-12">
				<div class="vc-column-innner-wrapper">
					<div id="hcode-owl-slider19" class="owl-carousel owl-theme  round-pagination light-pagination dark-navigation white-cursor ">
					<?php while( have_rows('slider_images') ) : the_row();
								// set up the image object with the various values for caption, alt, url, etc
								$project_slide_image = get_sub_field('slider_image');
								$slide_url = $project_slide_image['url'];
								$slide_title = $project_slide_image['title'];
								$slide_title = $project_slide_image['alt'];
								$slide_caption = $project_slide_image['caption'];
								$size = 'thumbnail';
								$thumb = $project_slide_image['sizes'][ $size ];
								$width = $project_slide_image['sizes'][ $size . '-width' ];
								$height = $project_slide_image['sizes'][ $size . '-height' ];
						?>
						<div style="background: #f1f1f1" class="item text-center">
							<img alt="<?php echo $slide_title ; ?>" title="<?php echo $slide_title ; ?>" src="<?php echo $slide_url ; ?>" width="1280" height="720">
						</div><!-- end div.item -->
						<?php endwhile ?>
				</div><!-- end div.vc-column-innner-wrapper -->
				<!-- make sure the owl slider for the 16x9 images script is located outside of the containing element of the while loop, otherwise it adds an additional empty slide at the back for some godforsaken reason-->
					<script type="text/javascript">
					 jQuery(document).ready(function() {
                                jQuery("#hcode-owl-slider19").owlCarousel({
                                    navigation: true,
                                    pagination: true,
                                    transitionStyle: "fadeUp",
                                    items: 1,
                                    loop: true,
                                    autoPlay: false,
                                    stopOnHover: false,
                                    addClassActive: true,
                                    singleItem: true,
                                    paginationSpeed: 400,
                                    navigationText: ["<i data-tooltip='previous item' title='previous item' class='fa fa-angle-left'></i>", "<i data-tooltip='next item' title='next item' class='fa fa-angle-right'></i>"]
                                });
                            });
					</script>
			</div><!-- end div.wpb_column.vc_column_container.col-xs-mobile-fullwidth.col-sm-12 -->
		</div><!-- end div#slideshow-row.row-->
	</div><!-- end div#slideshow-container.container -->
</section><!-- END PROJECT SLIDER IMAGES -->
<?php endif; ?>





		<!--================================
			=    BEGIN VISUAL COMPOSER CONTENT =
			=================================-->

<div class="blog-details-text portfolio-single-content">
<?php the_content(); ?>

    <?php
    $hcode_enable_meta_author_portfolio   = hcode_option( 'hcode_enable_meta_author_portfolio' );
    $hcode_enable_meta_date_portfolio     = hcode_option( 'hcode_enable_meta_date_portfolio' );
    $hcode_enable_meta_category_portfolio = hcode_option( 'hcode_enable_meta_category_portfolio' );
    if (!empty($url) || !empty( $portfolio_gallery ) || !empty( $portfolio_video ) || !empty( $portfolio_link ) ):
        if( $hcode_enable_meta_author_portfolio == 1 || $hcode_enable_meta_date_portfolio == 1 || $hcode_enable_meta_category_portfolio == 1) {
            echo $portfolio_meta_category_start;
                echo $portfolio_meta = '<div class="blog-date no-padding-top" style="color:#0273b9; background-color:#0273b9;">' . hcode_single_portfolio_meta() . '</div><!-- end div.blog-date.no-padding-top -->';
            echo $portfolio_meta_category_end;
        }
    endif;
    ?>

</div><!-- end div.blog-details-text.portfolio-single-content -->




	<!--================================
	=    END VISUAL COMPOSER CONTENT =
	=================================-->


