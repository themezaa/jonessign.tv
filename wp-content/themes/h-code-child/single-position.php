<?php
/**
 * The template for displaying single position posts -- uses extensively the single-position/full-post.php template
 *
 * @package H-Code-Child
 */

get_header(); ?>


<?php
    // Start of the loop.
    while ( have_posts() ) : the_post();
        $layout_settings        = $enable_container_fluid = $class_main_section = $section_class = $single_post_layout = '';
        // Get Theme option.
        $hcode_options          = get_option( 'hcode_theme_setting' );
        // Set Layout Setting
        $layout_settings        = hcode_option('hcode_layout_settings');
        $enable_container_fluid = hcode_option('hcode_enable_container_fluid');
        $single_post_layout     = hcode_option('hcode_single_layout_settings');

        switch ($layout_settings) {
        	case 'hcode_layout_full_screen':
        		if(isset($enable_container_fluid) && $enable_container_fluid == '1') {
                    $class_main_section .= 'container-fluid';
                    $section_class .= 'no-padding';
                }else{
                    $class_main_section .= 'container';
                    $section_class .= 'no-padding';
                }
            break;

        	case 'hcode_layout_both_sidebar':
                $section_class .= '';
        		$class_main_section .= 'container col3-layout';
        	break;

        	case 'hcode_layout_left_sidebar':
        	case 'hcode_layout_right_sidebar':
                $section_class .= 'no-padding-bottom';
        		$class_main_section .= 'container col2-layout';
        	break;

        	default:
                $section_class .= '';
        		$class_main_section .= 'container';
        	break;
        }
    ?>
    <section <?php echo post_class($section_class); ?>>
        <div class="<?php echo $class_main_section; ?>">
		    <div class="row">
		    <?php
                // If Is Set Get Post Left Sidebar.
                get_template_part('templates/position/sidebar-left');
        		switch ($single_post_layout) {
        			case 'hcode_single_layout_standard':
                        // Standard Post layout.
        				//get_template_part('templates/single-position/standard','post');
        				//get_template_part('templates/single-position/position','single');
        				get_template_part('templates/position/single-position/full','post-with-slider');
        			break;

        			case 'hcode_single_layout_full_width':
                        // Full Width Header Image Post layout.
        				//get_template_part('templates/single-position/full','post');
        				//get_template_part('templates/single-position/position','single');
        				get_template_part('templates/position/single-position/full','post-with-slider');

        			break;

        			case 'hcode_single_layout_full_width_image_slider':
                        // Full Width With Image Slider Post layout.
        				get_template_part('templates/position/single-position/full','post-with-slider');
        				//get_template_part('templates/single-position/position','single');
        			break;
        			case 'hcode_single_layout_full_width_lightbox':
                        // Full Width With Lightbox Slider Gallery layout.
        				//get_template_part('templates/single-position/full','width-with-lightbox-gallery');
        				get_template_part('templates/position/single-position/position','single');
        			break;
        		}
                // If Is Set Get Post Right Sidebar.
		        get_template_part('templates/position/sidebar-right');
                // If Is Set Get Post Related Posts.
jones_position_related_items();
            ?>
	        </div>
	    </div>
    </section>

<?php
// End of the loop.
endwhile;
?>
<?php get_footer(); ?>