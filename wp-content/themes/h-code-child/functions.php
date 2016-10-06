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
 * To Apply Categories or tags to attachments
 * https://code.tutsplus.com/articles/applying-categories-tags-and-custom-taxonomies-to-media-attachments--wp-32319
 *
 */
function jsco_add_tags_to_attachments() {
	register_taxonomy_for_object_type( 'sign_type', 'attachment');
}


/*Smart Slider 3 refresh cache start*/

//if(class_exists("N2Loader") && class_exists("N2Cache")){
//    N2Loader::import("libraries.slider.abstract", "smartslider");
//
//    function refreshCache() {
//        $sliderid = 12; //you need your slider ID
//        N2Cache::clearGroup(N2SmartSliderAbstract::getCacheId($sliderid));
//        N2Cache::clearGroup(N2SmartSliderAbstract::getAdminCacheId($sliderid));
//    }
//
//    add_action( 'save_post', 'refreshCache', 10, 0 );
//}
/*Smart Slider 3 refresh cache end*/


//GENERAL function that outputs a button to make what is on the page into a sweet pdf, provided what is on the page is a project profile.
function get_this_as_pdf(){
    ?>
    <span class="pdf-button">
        <a class="print-to-pdf" rel="nofollow" href="<?php get_permalink(); ?>pdf" title="save this as a PDF">
            <img class="pdf-print-link" src="/wp-content/uploads/2016/09/Printer.svg" alt="print this page as a pdf" style="max-width:100px;" />
        </a>
    </span>
    <?php
}
// end of function to get a project page as a PDF


/*==========================================
=            ADD ACF FIELDS to "SIGN" Taxonomy SEE: https://www.advancedcustomfields.com/resources/register-fields-via-php/            =
==========================================*/
function sign_type_tag_additional_fields() {
    if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
    'key' => 'group_579f949c9f6a7',
    'title' => 'Sign Type',
    'fields' => array (
        array (
            'key' => 'field_57ed811edde80',
            'label' => 'Sign Type Tag Additional Fields',
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '100',
                'class' => '',
                'id' => '',
            ),
            'placement' => 'left',
            'endpoint' => 0,
        ),
        array (
            'key' => 'field_57ed823ee62dc',
            'label' => 'Sign Type Tag Main Image',
            'name' => 'sign_type_main_image',
            'type' => 'image',
            'instructions' => 'Should be at least 1280x720 and follow the 16x9 aspect',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '100',
                'class' => '',
                'id' => '',
            ),
            'return_format' => 'array',
            'preview_size' => 'hcode-navigation-img',
            'library' => 'all',
            'min_width' => 960,
            'min_height' => 540,
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ),
        array (
            'key' => 'field_57ed80c7dde7f',
            'label' => 'Use Cases',
            'name' => 'sign_type_use_cases',
            'type' => 'repeater',
            'instructions' => 'What situations is this sign type used in?',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '100',
                'class' => '',
                'id' => '',
            ),
            'collapsed' => '',
            'min' => '',
            'max' => '',
            'layout' => 'table',
            'button_label' => 'Add Row',
            'sub_fields' => array (
                array (
                    'key' => 'field_57f6879444d3c',
                    'label' => 'Use Scenario',
                    'name' => 'sign_type_use_case',
                    'type' => 'text',
                    'instructions' => 'Enter each use case as an additional item',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => 'Example: Pedestrian Traffic Heavy',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
            ),
        ),
        array (
            'key' => 'field_57f69d34a0932',
            'label' => 'Button Title',
            'name' => 'sign_type_button_title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
    ),
    'location' => array (
        array (
            array (
                'param' => 'taxonomy',
                'operator' => '==',
                'value' => 'sign',
            ),
        ),
    ),
    'menu_order' => 1,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
));

endif;

}

add_action('acf/init', 'sign_type_tag_additional_fields' );
/* end of ACF additional fields for taxonomy type of sign*/


