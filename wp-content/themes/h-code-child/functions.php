<?php
/*=========================================================================
=            file has custom functions for h-code child theme
=			 this is version 1.6 last update  07_September_2016
=========================================================================*/
/*----------  theme namespace  ----------*/
define('HCODE_THEME', 'H-Code');

/**
 *
 * Establish the child directory for includes to that I can set up require functions for plugin overrides
 * it is worth noting that the function: get_stylesheet_directory() is used in a child theme and an analogue to
 * the function: get_theme_directory() in the parent
 *  information on this topic can be located at: https://codex.wordpress.org/Child_Themes
 */
define('HCODE_CHILD_THEME_DIR', get_stylesheet_directory());  // this is the folder for my child theme
// establish lib folder as a subfolder of h-chode-child/
define('HCODE_CHILD_THEME_LIB', HCODE_CHILD_THEME_DIR . '/lib');
// establish includes folder as a subfolder of h-chode-child/lib/
define('HCODE_CHILD_THEME_INCLUDES', HCODE_CHILD_THEME_LIB . '/includes');
// establish overrides folder as a subfolder of h-chode-child/lib/includes/
define('HCODE_CHILD_THEME_OVERRIDES', HCODE_CHILD_THEME_INCLUDES . '/overrides');
// require my shortcode-testimonial-slide_content_override.php file

require_once( HCODE_CHILD_THEME_OVERRIDES . '/testimonial_override.php' );

// add pdf print support to post type 'portfolio'
if(function_exists('set_pdf_print_support')) {
  set_pdf_print_support(array('post', 'page', 'portfolio','position'));
}

/**
 *
 * ADD SVG capability to wordpress -- upload and display svg in wordpress
 * information here: http://wordpress.stackexchange.com/questions/206516/allow-svg-in-wp-step-by-step
 *
 */
// upload and display svg in WP
function jones_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
	return $mimes;
}
// when the upload mimes filter is loaded, we are filtering the function jones_mime_types as above
add_filter('upload_mimes','jones_mime_types');

//use jonessign_logo.svg as login logo -- this overrides the style sheet, so be sure the logo is where I am telling the function it can be found
function jones_login_logo() { ?>
<style>
	#login h1 a, .login h1 a{
		background-image:url(<?php echo get_stylesheet_directory_uri();?>/assets/images/jonessign_logo.svg);
		padding-bottom: 30px;
	}
</style>
<?php }
// no closing php tag needed
add_action( 'login_enque_scripts', 'jones_login_logo' );

//alter login logo url to jonessign.com
function jones_login_headerurl(){
	return home_url();
}
add_filter( 'login_headerurl', 'jones_login_headerurl' );

// change yet another wp blog to your vision accomplished
function jones_login_headertitle(){
	return 'Jones Sign Company -- Your Vision. Accomplished';
}
add_filter( 'login_headertitle', 'jones_login_headertitle'  );

// so I can just slap a mapplic map in a template page
$jones_map = do_shortcode('[mapplic id="4" h="800"]');

//get rid of a couple of columns on the backend for the staff post type
function set_custom_edit_staffmember_columns($columns) {
	// comment out the columns you wisht o keep
	unset( $columns['cb'] ); // refers to checkbox on left
	unset( $columns['author'] ); //refers to author of the post column
	unset( $columns['categories'] ); // refers to categories column
	//unset( $columns['tags'] ); //refers to tags
	unset( $columns['comments'] ); //refers to the icon for comments
	unset( $columns['date'] ); //refers to date & status of post

	return $columns;
}
// now to add the filter
add_filter( 'manage_staff_posts_columns' ,'set_custom_edit_staffmember_columns' );

/**
 *
 * get taxonomy term links
 *developer.wordpress.org/reference/functions/get_the_terms/
 * @see get_object_taxonomies()
 */

function jones_custom_taxonomies_terms_links() {
	// get a given post by its ID set it as $post object
	$post       = get_post( $post->ID );
	// get post type by post
	$post_type  = $post->post_type;
	//get the post types taxonomies
	$taxonomies = get_object_taxonomies( $post_type, 'location');
	//establish $out as an array to add things to later
	$out        = array();

	// set up a classic foreach loop
	foreach ($taxonomies as $taxonomy_slug => $taxonomy) {
		//get terms related to the post
		$terms = get_the_terms( $post->ID, $taxonomy_slug);
		// what to do in the event there are some tags
		$term_qty = count($terms);
		$location = 'Location' . ($term_qty > 1 ? 's':'');
		if ( ! empty( $terms ) ){
			//let's push some things into the $out array
			//$out[] = '<h2>' . $taxonomy->label . $term_qty . "</h2>\n<ul style=\"list-style-type:none;\">";
			$out[] = '<h2>' . $location . ": </h2>\n<ul style=\"list-style-type:none;padding-left:0px;\">";
			//$out[] = "<ul style=\"list-style-type:none;padding-left:0px;\">";
			foreach ($terms as $term ) {
				$out[] = sprintf( '<li><a href="%1$s">%2$s</a></li>',
				esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
				esc_html( $term->name )
				);
			}
			$out[] = "\n</ul>\n";
		}
	}
	return implode( '', $out );
}

// end jones_custom_taxonomies_terms_links()

/**
 *
 * get related post for custom port type using my custom taxonomy
 * see http://isabelcastillo.com/related-custom-post-type-taxonomy
 *
 */
// get this custom post types taxonomy terms
function jones_position_related_items(){
$custom_taxterms = wp_get_object_terms( $post->ID, 'location', array('fields' => 'ids') );
// arguments
$args = array(
              'post_type'      => 'position',
              'post_status'    => 'publish',
              'posts_per_page' => 3,
              'orderby'        => 'rand',
              'tax_query'       => array(
                                        array(
                                              'taxonomy' => 'location',
                                              'field'    => 'id',
                                              'terms'    => $custom_taxterms,
                                              )
                                        ),
              'post__not_in'   => array($post->ID),
		); // end args array
$related_items = new WP_QUERY( $args );
//loop over  query
if ($related_items->have_posts()):
	echo '<ul>';
	while ( $related_posts->have_posts() ) : $related_items->the_post();
	?>
	<li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> <?php the_title(); ?> </a></li>
	<?php
	endwhile;
	echo '</ul>';
endif;
//reset the post data
wp_reset_postdata();
};

// taken from themes/hcode/lib/hcode-extra-functions.php substituted position for portfolio
/* just a sampling in a new file for clarity/* Single Portfolio Related Items */
if ( ! function_exists( 'hcode_single_position_related_posts' ) ) :

    function hcode_single_position_related_posts( $post_type = 'position', $number_posts = '3') {
        global $post;
        $args               = $output = '';
        $related_post_terms = array();
        $hcode_options = get_option( 'hcode_theme_setting' );

        $title = (isset($hcode_options['hcode_related_title'])) ? $hcode_options['hcode_related_title'] : '';

        $recent_post = new WP_Query();

        if( $number_posts == 0 ) {
            return $recent_post;
        }
        $terms = get_the_terms( get_the_ID() , 'location' );
        if( $terms ):
            foreach ($terms as $key => $value) {
                $related_post_terms[] = $value->term_id;
            }
        endif;
        $args = array(
            'post_type'      => $post_type,
            'posts_per_page' => $number_posts,
            'post__not_in'   => array( get_the_ID() ),
            'tax_query'      => array(
                array(
	                'taxonomy' => 'position',
	                'terms'    => $related_post_terms,
	                'field'    => 'term_id',
                ),
            ),
            'meta_query' => array(
                array(
                    'key'       => 'hcode_link_type_single',
                    'value'     => 'ajax-popup',
                    'compare'   => '!=',
                )
            )
        );

        $recent_post = new WP_Query( $args );
        if ( $recent_post->have_posts() ) {
            $hcode_options  = get_option( 'hcode_theme_setting' );
            //$enable_comment = hcode_option('hcode_enable_portfolio_comment');
           $hcode_enable_position_comment = false;

            $output .= '<div class="wpb_column vc_column_container col-md-12 no-padding"><div class="hcode-divider border-top sm-padding-five-top xs-padding-five-top padding-five-bottom"></div></div><section class="clear-both no-padding-top"><div class="container"><div class="row">';
            $output .= '<div class="col-md-12 col-sm-12 text-center">';
                $output .= '<h3 class="section-title">'.$title.'</h3>';
            $output .= '</div>';
            $output .='<div class="work-3col gutter work-with-title ipad-3col">';
                $output .='<div class="col-md-12 grid-gallery overflow-hidden content-section hide-print">';
                    $output .='<div class="tab-content">';
                        $output .='<ul class="grid masonry-items">';
                    while ( $recent_post->have_posts() ) : $recent_post->the_post();
                   /* Image Alt, Title, Caption */
                    $img_alt     = hcode_option_image_alt(get_post_thumbnail_id());
                    $img_title   = hcode_option_image_title(get_post_thumbnail_id());
                    $image_alt   = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? 'alt="'.$img_alt['alt'].'"' : 'alt=""' ;
                    $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? ' title="'.$img_title['title'].'"' : '';


                        $output .='<li class="position-id-'.get_the_ID().'">';
                            $output .='<figure>';
                                $position_image    = hcode_post_meta('hcode_image');
                                $position_gallery  = hcode_post_meta('hcode_gallery');
                                $position_link     = hcode_post_meta('hcode_link_type');
                                $position_video    = hcode_post_meta('hcode_video');
                                //$position_subtitle = hcode_post_meta('hcode_subtitle');
                                $position_subtitle = 'Open Position';

                                if(!empty($position_image)){
                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'hcode-related-post' );
                                    $url   = $thumb['0'];
                                    if($url):
                                        $output .= '<div class="gallery-img">';
                                            $output .= '<a href="'.get_permalink().'">';
                                                $output .= '<img src="' . $url . '" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.'/>';
                                            $output .= '</a>';
                                        $output .= '</div>';
                                    else :
                                        $output .= '<div class="gallery-img">';
                                            $output .= '<a href="'.get_permalink().'">';
                                                $output .= '<img src="' . HCODE_THEME_ASSETS_URI . '/images/no-image-374x234.jpg" width="374" height="234"/>';
                                            $output .= '</a>';
                                        $output .= '</div>';
                                    endif;
                                }else{
                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'hcode-related-post' );
                                    $url = $thumb['0'];
                                    $output .= '<div class="gallery-img">';
                                        $output .= '<a href="'.get_permalink().'">';
                                            if ( $url ) {
                                                $output .= '<img src="' . $url . '" width="'.$thumb[1].'" height="'.$thumb[2].'" '.$image_alt.$image_title.'/>';
                                            }
                                            else {
                                                $output .= '<img src="' . HCODE_THEME_ASSETS_URI . '/images/no-image-374x234.jpg" width="374" height="234"/>';
                                            }
                                        $output .= '</a>';
                                    $output .= '</div>';
                                }
                                $output .= '<figcaption>';
                                    $output .= '<h3><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
                                    $output .= '<p>'.$position_subtitle.'</p>';
                                $output .= '</figcaption>';
                            $output .='</figure>';
                        $output .='</li>';
                    endwhile;
                    wp_reset_postdata();
                        $output .='</ul>';
                    $output .='</div>';
                $output .='</div>';
            $output .='</div>';
            $output .= '</div></div></section>';
        echo $output;
        }
    }
endif;

