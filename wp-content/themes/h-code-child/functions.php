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

//remove columns on the backend for the staff post type
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
 * Sign Types - as they are limited in number, should probably not have a custom post type and instead should be a beefed up tag using the sign_type taxonomy.  I would need a text field with a definition, a text field with use cases or use scenarios, and a large scale header photo
 *
 */

// add fields to taxonomy definition page for sign_type taxonomy
// see: http://wordpress.stackexchange.com/questions/689/adding-fields-to-the-category-tag-and-custom-taxonomy-edit-screen-in-the-wordpr
add_action('sign_type_edit_form_fields', 'category_edit_form_fields');
add_action('sign_type_edit_form', 'category_edit_form');
add_action('add_sign_type_form_fields', 'category_edit_form_fields');
add_action('sign_type_add_form', 'category_edit_form');

function sign_type_add_form() {
        ?>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#edittag').attr( "enctype", "multipart/form-data").attr("encoding","multipart/form-data" );
    });
</script>
    <?php
}

function add_sign_type_form_fields() {
    ?>
        <tr className="form-field">
            <th valign="top" scope="row">
                <label for="sign_type_tag_photo" ><?php _e('Picture for this Sign Type Tag',''); ?></label>
            </th>
            <td>
                <input type="file" id="sign_type_tag_photo" name="sign_type_tag_photo"/>
            </td>
             <th>
                <label for="sign_type_tag_definition"><?php _e('Definition of this Sign Type',''); ?></label>
            </th>
            <td>
                <input type="text" id="sign_type_tag_definition" name="sign_type_tag_definition">
            </td>
            <th>
                <label for="sign_type_tag_uses"><?php _e('Use Cases for this Sign Type',''); ?></label>
            </th>
            <td>
                <input type="text" id="sign_type_tag_uses" name="sign_type_tag_uses">
            </td>
        </tr>

    <?php
}









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
