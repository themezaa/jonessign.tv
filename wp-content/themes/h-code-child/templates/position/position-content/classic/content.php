<?php
/**
 * displaying content for blog single page classic layout
 *
 * @package H-Code-Child
 */
?>
<?php

$author                       = get_the_author_meta( 'user_nicename', $post_author);
$day                          = get_the_date('d', get_the_ID());
$month                        = get_the_date('F', get_the_ID());
$year                         = get_the_date('Y', get_the_ID());

// THE FOLLOWING ARE FROM THE ADVANCED CUSTOM FIELDS ASSIGNED TO THE JOB CONTENT TYPE
$description                  = get_field( 'job_description' );
$reports_to                   = get_field( 'job_org_structure' );
$overlay                      = 'background: linear-gradient(rgba(40,80,120,0.9), rgba(40,80,120,0.9) )'; // this overlay is black, comment it out if you'd prefer the blue overlay on your header
$overlay                      = 'background: linear-gradient(rgba(0,0,10,0.9), rgba(0,0,10,0.9) )'; // this overlay is black, comment it out if you'd prefer the blue overlay on your header
// JOB OPENING PAGE ON WORKFORCE NOW FROM ADP
$adp_link                     = 'https://workforcenow.adp.com/jobs/apply/posting.html?client=JonesSign';
$page                         = '';
$hcode_options                = get_option( 'hcode_theme_setting' );
$hcode_search_layout_settings = (isset($hcode_options['hcode_general_layout_settings'])) ? $hcode_options['hcode_general_layout_settings'] : '';
$hcode_excerpt_length         = (isset($hcode_options['hcode_general_excerpt_length'])) ? $hcode_options['hcode_general_excerpt_length'] : '';
$hcode_columns_settings       = (isset($hcode_options['hcode_general_columns_settings'])) ? $hcode_options['hcode_general_columns_settings'] : '';
// $args variable to be used in the query for job position items
$args = (array(
			'numberposts' => 3, //get 'em all
			'post_type'   => 'position', // as long as they are of the position custom post type, that is
			'meta_key'    => 'job_is_open',
			'meta_value'  => 'yes',
			'compare'     => '=',
			));
$day                 = get_the_date('d', get_the_ID());
$month               = get_the_date('F', get_the_ID());
$year                = get_the_date('Y', get_the_ID());
$the_query = new WP_Query( $args ); // query -- be sure to reset if you make other queries
                                    //
?>
<!-- div that establishes the flexible box model-->
<div id="positions-list" class="flex row-wrap justify-start align-items-center align-content-center">
<?php
if( have_posts() ):
    while ( have_posts() ) : the_post();

//    $show_excerpt = ( !empty($hcode_excerpt_length) ) ? wpautop(hcode_get_the_excerpt_theme($hcode_excerpt_length)) : wpautop(hcode_get_the_excerpt_theme(55));

    $show_date = get_the_date( 'd F Y', get_the_ID()) ;
//    $post_type = get_post_type( get_the_ID() );
    $post_type = 'position';
    //echo '<div class="blog-listing blog-listing-classic">';
               /* Image Alt, Title, Caption */
                $img_alt     = hcode_option_image_alt(get_post_thumbnail_id());
                $img_title   = hcode_option_image_title(get_post_thumbnail_id());
                $image_alt   = ( isset($img_alt['alt']) ) ? $img_alt['alt'] : '' ;
                $image_title = ( isset($img_title['title']) ) ? $img_title['title'] : '';

                $img_attr = array(
                    'title' => $image_title,
                    'alt'   => $image_alt,
                );
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
               	$url = $thumb['0'];
                if ( has_post_thumbnail() ) {
                    $featured_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
                }
                else {
                    $featured_image_url =  HCODE_THEME_ASSETS_URI . '/images/no-image.png';
                }
                $position_link = get_permalink();
                $position_title = get_the_title();
?>

    	<div id="positions-information" style="<?php echo $overlay; ?>,url('<?php echo $featured_image_url; ?>');background-size:cover;background-position: center top;" >


				<!-- <h3><?php //echo jones_custom_taxonomies_terms_links(); ?></h3> -->


				<div id="button-date-wrapper">
					<!-- BEGIN POSTED ON DATE COLUMN-->
	            	<div id="position-posted" class="flex col-nw justify-center align-items-center border-white white-text alt-font hidden-xs padding-one" >
	                	<span class="white-text font-weight-100 letter-spacing-2"> <?php esc_html_e('Posted','H-Code') ; ?> </span>
	                    <span class="white-text letter-spacing-5"><?php echo $day;?></span>
	                    <span class="white-text font-weight-100 letter-spacing-2"><?php echo $month;?></span>
	             	</div><!-- end div#opening-posted-date -->
	             	<!-- END POSTED ON DATE COLUMN-->

					<!-- button begin -->
					<a href="<?php echo $position_link; ?>" title="link to the <?php echo $position_title; ?> description page" target="_self" class="inner-link btn-very-small-white btn-medium button btn">learn more</a>
					<!-- button end -->
				</div><!-- end div#button-date-wrapper -->

				<div id="positions-title" class="flex row-wrap justify-content-center align-items-center align-content-center">
					<a href="<?php echo $position_link; ?>" title="link to the <?php echo $position_title; ?> description page" >
						<h2 id="positions-title" class="alt-font white-text"><?php echo $position_title; ?></h2>

					</a><!-- end position title-->
				</div><!-- end div#positions-title -->

<?php
				// for US MAP that acts as the key to give people an idea of where the jub position is located
				// add the airport code and concatenate =1& for all locations selected in this job description
				// locations are added as tags from Advanced Custom Fields
				$locations =  get_field('job_locations');
				// ensure this is an array so as to not throw any php errors if no location is set for a position
				if (is_array($locations)){
					$locations = implode("=1&",$locations);
				}
				// call svg file saved to wp-content/uploads/svg/svg_php/jones_sign.php
				// initially, we have to add a "?" to the URL, then we'll  concatenate $locations as defined above
				// the US Map svg is programmed to $_GET the $locations variable and display state & marker accordingly
				echo '<img src="http://jonessign.tv/wp-content/uploads/svg/svg_php/jones_sign.php?' . $locations . '" height="300px" width="215px" style="order:18;"/>';
				?>

    	</div><!-- end div#positions-information -->

<?php endwhile; ?>

</div><!-- end div#positions-list -->
<?php
    if($wp_query->max_num_pages > 1):
        echo '<div class="pagination">';
            echo paginate_links( array(
                'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                'format'       => '',
                'add_args'     => '',
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'total'        => $wp_query->max_num_pages,
                'prev_text'    => '<img alt="Previous" src="'.HCODE_THEME_IMAGES_URI.'/arrow-pre-small.png" width="20" height="13">',
                'next_text'    => '<img alt="Next" src="'.HCODE_THEME_IMAGES_URI.'/arrow-next-small.png" width="20" height="13">',
                'type'         => 'plain',
                'end_size'     => 3,
                'mid_size'     => 3
            ) );
        echo '</div>';
    endif;
else:
    get_template_part('templates/content','none');
endif;
?>


<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>