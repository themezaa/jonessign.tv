<?php
/**
 * Plugin Name: Jones Custom Post Types
 * Description: Testimonials, Job Openings, Current Staff Custom Posts Types and Taxonomies
 * Verison. 0.1.3
 * Author: Nick Mortensen
 * Text Domain: jones
 * License: GPL2
 */

/**	Copyright 2016 Nick Mortensen nmortensen@jonessign.com
	Jones Staff Member is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.
*/

function jones_custom_posttypes() {
	//QTY of 5 custom post types: 'sign',staff', 'position', 'testimonial','location'
	// BEGIN SIGN POST TYPE DEFINITION
		//sign type post type labels
	$labels = array(
				'name'               => _x( 'Sign Type','post type general name', 'Jones' ),
				'singular_name'      => _x( 'Sign Type', 'post type singular name', 'Jones' ),
				'menu_name'          => _x( 'Sign Type', 'Jones' ),
				'name_admin_bar'     => _x( 'Sign Type', 'add new on admin bar', 'Jones'),
				'add_new'            => _x( 'Add New', 'staff', 'jones', 'Jones' ),
				'add_new_item'       => __( 'Add Sign Type', 'Jones' ),
				'new_item'           => __( 'New Sign Type', 'Jones'),
				'edit_item'          => __( 'Edit Sign Type', 'Jones' ),
				'view_item'          => __( 'View Sign Type', 'Jones' ),
				'all_items'          => __( 'All Sign Type', 'Jones'),
				'search_items'       => __( 'Search Sign Type', 'Jones' ),
				'parent_item_colon'  => __( 'Parent Sign Type:', 'Jones' ),
				'not_found'          => __( 'No Sign Type found', 'Jones' ),
				'not_found_in_trash' => __( 'No Sign Type found in Trash', 'Jones' ),
			);
	//$args array for sign types call $labels variable above
	$args = array(
				'can_export'          => true,
				'description'         => __( 'Sign Type Info', 'Jones'),
				'has_archive'         => true,
				'labels'              => $labels,
				'menu_icon'           => 'dashicons-editor-table',
				'menu_position'       => 5,
				'public'              => true,
				'rewrite'             => array( 'slug' => 'sign' ),
				'show_in_admin_bar'   => true,
				'show_in_menu'        => true,
				'show_in_rest' => true,
				'supports'            => array('title', 'author', 'excerpt','editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats'),
				'taxonomies'          => array ('category', 'post-tag'),
			);// END POST TYPE SIGN

	// registers sign type custom post type
	// may not need sign type as a custom post.  It is possible that this is better to be just a taxonomy that media items and portfolio items can be assigned to.
	register_post_type( 'sign', $args );

	//BEGIN STAFF POST TYPE DEFINITION
	$labels = array(
				'name'               => _x( 'Staff','post type general name', 'Jones' ),
				'singular_name'      => _x( 'Staffmember', 'post type singular name', 'Jones' ),
				'menu_name'          => _x( 'Staffmember', 'Jones' ),
				'name_admin_bar'     => _x( 'Staffmember', 'add new on admin bar', 'Jones'),
				'add_new'            => _x( 'Add New', 'staff', 'jones', 'Jones' ),
				'add_new_item'       => __( 'Add Staff', 'Jones' ),
				'new_item'           => __( 'New Staffmember', 'Jones'),
				'edit_item'          => __( 'Edit Staffmember', 'Jones' ),
				'view_item'          => __( 'View Staffmember', 'Jones' ),
				'all_items'          => __( 'All Staff', 'Jones'),
				'search_items'       => __( 'Search Staff', 'Jones' ),
				'parent_item_colon'  => __( 'Parent Staff:', 'Jones' ),
				'not_found'          => __( 'No Staff found', 'Jones' ),
				'not_found_in_trash' => __( 'No Staff found in Trash', 'Jones' ),
			);
	//$args array for staff calls $labels variable above
	$args = array(
				'can_export'          => true,
				'description'         => __( 'Staff Member information', 'Jones'),
				'has_archive'         => true,
				'labels'              => $labels,
				'menu_icon'           => 'dashicons-groups',
				'menu_position'       => 5,
				'public'              => true,
				'rewrite'             => array( 'slug' => 'staff' ),
				'show_in_admin_bar'   => true,
				'show_in_menu'        => true,
				'show_in_rest' => true,
				'supports'            => array('title', 'author', 'excerpt','editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats'),
				'taxonomies'          => array ('category', 'post-tag'),
			);// end post type  staff

	// registers staff custom post type
	register_post_type( 'staff', $args );

	//position custom post type
	//$labels will be used within $args array
	$labels = array(
					'add_new'            => _x( 'New Opening','Position', 'jones', 'Jones' ),
					'add_new_item'       => __( 'Add Opening', 'Jones' ),
					'all_items'          => __( 'All Openings', 'Jones' ),
					'edit_item'          => __( 'Edit Opening', 'Jones' ),
					'menu_name'          => _x( 'Position', 'Jones' ),
					'name'               => _x( 'Position','post type general name', 'Jones' ),
					'name_admin_bar'     => _x( 'Position', 'add new on admin bar', 'Jones'),
					'new_item'           => __( 'New Opening', 'Jones' ),
					'not_found'          => __( 'No Openings found', 'Jones' ),
					'not_found_in_trash' => __( 'No Openings in Trash', 'Jones' ),
					'parent_item_colon'  => __( 'Parent Position:', 'Jones' ),
					'search_items'       => __( 'Search Positions', 'Jones' ),
					'singular_name'      => _x( 'Position','post type singular name', 'Jones' ),
					'view_item'          => __( 'View this Opening', 'Jones' ),
				);
	//$args array for position custom post type calls $labels above for 'labels'
	$args = array(
				'can_export'          => true,
				'description'         => __( 'Opening Information', 'Jones' ),
				'has_archive'         => true,
				'labels'              => $labels,
				'menu_icon'           => 'dashicons-universal-access-alt',
				'menu_position'       => 5,
				'public'              => true,
				'rewrite'             => array( 'slug' => 'position'),
				'show_in_admin_bar'   => true,
				'show_in_menu'        => true,
				'show_in_rest' => true,
				'supports'            => array('title', 'excerpt','editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats'),
				'taxonomies'          => array ('post-tag','location')
			);
	// register the position custom post type
	register_post_type( 'position', $args );

	// begin testimonial custom post type
	//$labels will be used within $args array
	$labels = array(
				'add_new'            => _x( 'Add New','Testimonial', 'jones', 'Jones' ),
				'add_new_item'       => __( 'Add Testimonial', 'Jones' ),
				'all_items'          => __( 'All Testimonials', 'Jones'),
				'edit_item'          => __( 'Edit Testimonials', 'Jones' ),
				'menu_name'          => _x( 'Testimonial', 'Jones' ),
				'name'               => _x( 'Testimonial','post type general name', 'Jones' ),
				'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'Jones'),
				'new_item'           => __( 'New Testimonials', 'Jones'),
				'not_found'          => __( 'No Testimonials found', 'Jones' ),
				'not_found_in_trash' => __( 'No Testimonials found in Trash', 'Jones' ),
				'parent_item_colon'  => __( 'Parent Testimonial:', 'Jones' ),
				'search_items'       => __( 'Search Testimonials', 'Jones' ),
				'singular_name'      => _x( 'Testimonial','post type singular name', 'Jones' ),
				'view_item'          => __( 'View Testimonials', 'Jones' ),
			);
	//$args array for testimonial custom post type calls $labels above for 'labels'
	$args = array(
				'can_export'          => true,
				'description'         => __( 'Testimonial information', 'Jones'),
				'has_archive'         => true,
				'labels'              => $labels,
				'menu_icon'           => 'dashicons-format-status',
				'menu_position'       => 5,
				'public'              => true,
				'query_var'           => true,
				'rewrite'             => array( 'slug' => 'testimonial'),
				'show_in_admin_bar'   => true,
				'show_in_menu'        => true,
				'show_in_rest' => true,
				'supports'            => array('title', 'author', 'excerpt','editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats'),
				'taxonomies'          => array ('category', 'post-tag'),
			);
	// register the testimonial custom post type
	register_post_type( 'testimonial', $args );
	$labels = array(
				'add_new'            => _x( 'Add New','Jones Location', 'jones', 'Jones' ),
				'add_new_item'       => __( 'Add Location', 'Jones' ),
				'all_items'          => __( 'All Jones Locations', 'Jones' ),
				'edit_item'          => __( 'Edit Jones Location', 'Jones' ),
				'menu_name'          => _x( 'Jones Location', 'Jones' ),
				'name'               => _x( 'Jones Location','post type general name', 'Jones' ),
				'name_admin_bar'     => _x( 'Jones Location', 'add new on admin bar', 'Jones'),
				'new_item'           => __( 'New Locations', 'Jones' ),
				'not_found'          => __( 'No Locations found', 'Jones' ),
				'not_found_in_trash' => __( 'No Locations found in Trash', 'Jones' ),
				'parent_item_colon'  => __( 'Parent Location:', 'Jones' ),
				'search_items'       => __( 'Search Jones Locations', 'Jones' ),
				'singular_name'      => _x( 'Jones Location','post type singular name', 'Jones' ),
				'view_item'          => __( 'View Jones Locations', 'Jones' ),
	        );
	$args = array(
			'can_export'        => true,
			'description'       => __( 'Jones Sign Location Information', 'Jones' ),
			'has_archive'       => true,
			'labels'            => $labels,
			'menu_icon'         => 'dashicons-building',
			'menu_position'     => 25,
			'public'            => true,
			'rewrite'           => array( 'slug' => 'location'),
			'show_in_admin_bar' => true,
			'show_in_menu'      => true,
			'show_in_rest'      => true,
			'supports'          => array('title', 'excerpt', 'thumbnail', 'custom-fields',  'post-formats'),
			'taxonomies'        => array ('location-tag')
			);

	//register the location custom post type
	register_post_type( 'jones-location', $args );
}
// at what point do we register these custom post types?  at init, of course
add_action( 'init', 'jones_custom_posttypes' );
// this concludes the jones_custom_post_type function - wherein we register the custom post types for staff, position, & testimonial

// a rewrite flush is required to get the permalinks to work when activating the plugin
function jones_rewrite_flush() {
	// first we "add" the custom post types via the jones_custom_post_types() function above
	// "add" is written in quotes because Custom Post Types don't get added to the database
	// they are only referenced in the `post_type` column with a post entry when you add a post of that custom post type
    jones_custom_posttypes();

    // ATTENTION: this is *only* done during the plugin activation hook
    // you don't want to be doing this on every page load That is why we use the __FILE__ global
    // also, if we make changes to the custom post type (or even the taxonomies), we should deactivate the jones_custom_post_types plugin
    // and then re-activate it to ensure that the changes are made
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'jones_rewrite_flush' );


/*----------  custom taxonomies QTY 3 all tags ----------*/

function jones_custom_taxonomies() {

/*----------  DEPARTMENT: staffmember department as a taxonomy for 'staff' custom post type  ----------*/
	$labels = array(
		'add_new_item'               => __( 'Add New Department', 'Jones' ),
		'add_or_remove_items'        => __( 'Add or Remove Department', 'Jones' ),
		'all_items'                  => __( 'All Departments', 'Jones' ),
		'choose_from_most_used'      => __( 'Frequently Used Departments', 'Jones' ),
		'edit_item'                  => __( 'Edit Department', 'Jones' ),
		'items_list'                 => __( 'Departments list', 'Jones' ),
		'items_list_navigation'      => __( 'Departments list navigation', 'Jones' ),
		'menu_name'                  => __( 'Department', 'Jones' ),
		'name'                       => _x( 'Staff Dept Tag', 'Taxonomy General Name', 'Jones' ),
		'new_item_name'              => __( 'New Department Title', 'Jones' ),
		'no_terms'                   => __( 'No Departments', 'Jones' ),
		'not_found'                  => __( 'Not Found', 'Jones' ),
		'popular_items'              => __( 'Popular Departments', 'Jones' ),
		'search_items'               => __( 'Search Departments', 'Jones' ),
		'separate_items_with_commas' => __( 'Separate Departments with commas', 'Jones' ),
		'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'Jones' ),
		'update_item'                => __( 'Update Department', 'Jones' ),
		'view_item'                  => __( 'View Department', 'Jones' ),
	);
	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'public'                => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'department' ),
		'show_admin_column'     => true,
		'show_in_nav_menus'     => true,
		'show_tagcloud'         => true,
		'show_ui'               => true,
		'update_count_callback' => '_update_post_term_count',
	);
	register_taxonomy( 'department', 'staff', $args );
	//department taxonomy for staff custom post type complete

	// location taxonomy can be used for custom post types: jones-locations, staff, openings
	// examples are 'Jones Green Bay', 'Jones East', 'Jones Virginia' etc.
	$labels = array(
		'add_new_item'               => __( 'Add New Location Tag', 'Jones' ),
		'add_or_remove_items'        => __( 'Add or Remove Tag - Location', 'Jones' ),
		'all_items'                  => __( 'All Location Tags', 'Jones' ),
		'choose_from_most_used'      => __( 'Frequently Used Locations', 'Jones' ),
		'edit_item'                  => __( 'Edit Location', 'Jones' ),
		'items_list'                 => __( 'Location Tag list', 'Jones' ),
		'items_list_navigation'      => __( 'Locations Tags list navigation', 'Jones' ),
		'menu_name'                  => __( 'Tags - Locations', 'Jones' ),
		'name'                       => _x( 'Location', 'Taxonomy General Name', 'Jones' ),
		'new_item_name'              => __( 'New Location Tag', 'Jones' ),
		'no_terms'                   => __( 'No Locations', 'Jones' ),
		'not_found'                  => __( 'Location Not Found', 'Jones' ),
		'popular_items'              => __( 'Popular Locations', 'Jones' ),
		'search_items'               => __( 'Search Location Tags', 'Jones' ),
		'separate_items_with_commas' => __( 'Separate Locations with commas', 'Jones' ),
		'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'Jones' ),
		'update_item'                => __( 'Update Location Tag', 'Jones' ),
		'view_item'                  => __( 'View Location Tag', 'Jones' ),
	);
	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'public'                => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'location' ),
		'show_admin_column'     => true,
		'show_in_nav_menus'     => true,
		'show_tagcloud'         => true,
		'show_ui'               => true,
		'update_count_callback' => '_update_post_term_count',
	);
	register_taxonomy('location', array('position', 'jones-location', 'staff'), $args );
	// END LOCATION TAXONOMY REGISTRATION
	//
	// BEGIN CUSTOM TAXONOMY FOR SIGN TYPE

	$labels = array(
		'add_new_item'               => __( 'Add Sign Type Tag', 'Jones' ),
		'add_or_remove_items'        => __( 'Add or Remove Tag - Sign Type', 'Jones' ),
		'all_items'                  => __( 'All Sign Type Tags', 'Jones' ),
		'choose_from_most_used'      => __( 'Frequently Used Sign Type Tags', 'Jones' ),
		'edit_item'                  => __( 'Edit Sign Type', 'Jones' ),
		'items_list'                 => __( 'Sign Type Tag list', 'Jones' ),
		'items_list_navigation'      => __( 'Sign Types Tag list Nav', 'Jones' ),
		'menu_name'                  => __( 'Tags - Sign Types', 'Jones' ),
		'name'                       => _x( 'Sign Type', 'Taxonomy General Name', 'Jones' ),
		'new_item_name'              => __( 'New Sign Type Tag', 'Jones' ),
		'no_terms'                   => __( 'No Sign Type Tags', 'Jones' ),
		'not_found'                  => __( 'Sign Type Tag Not Found', 'Jones' ),
		'popular_items'              => __( 'Popular Sign Type Tags', 'Jones' ),
		'search_items'               => __( 'Search Sign Type Tags', 'Jones' ),
		'separate_items_with_commas' => __( 'Separate Sign Type Tags with commas', 'Jones' ),
		'singular_name'              => _x( 'Sign Type', 'Taxonomy Singular Name', 'Jones' ),
		'update_item'                => __( 'Update Sign Type Tag', 'Jones' ),
		'view_item'                  => __( 'View Sign Type Tag', 'Jones' ),
	);
	$args = array(
		'hierarchical'          => false,
		'description'			=> 'Apply sign type to photos and portfolio pages.',
		'labels'                => $labels,
		'public'                => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'sign-type' ),
		'show_admin_column'     => true,
		'show_in_nav_menus'     => true,
		'show_tagcloud'         => true,
		'show_ui'               => true,
		'update_count_callback' => '_update_post_term_count',
	);
	register_taxonomy('sign_type', array('portfolio', 'sign','attachment'), $args );
	// END REGISTER TAXONOMY FOR SIGNTYPE
}
 // note that these taxonomy are stored in the #_term_taxonomy table in the db within the taxonomy column
 // if I change the slug name, I have to alter the entry in the #_term_taxonomy.taxonomy table similarly or I lose what I've entered

add_action( 'init', 'jones_custom_taxonomies', 0 );