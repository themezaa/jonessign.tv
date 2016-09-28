<?php
/*-----------------------------------------------------------------------------------*/
/* Testimonial */
/*-----------------------------------------------------------------------------------*/
    function hcode_testimonial_shortcode( $atts, $content = null ) {
        extract( shortcode_atts( array(
                    'show_blog_slider_style'            => '',
                    'show_pagination'                   => '',
                    'show_pagination_style'             => '',
                    'show_pagination_color_style'       => '',
                    'show_cursor_color_style'           => '',
                    'hcode_image_carousel_itemsdesktop' => '3',
                    'hcode_image_carousel_itemstablet'  => '3',
                    'hcode_image_carousel_itemsmobile'  => '1',
                    'hcode_image_carousel_autoplay'     => '',
                    'hcode_slider_id'                   => '',
                    'hcode_slider_class'                => '',
                    'hcode_image_carousel_singleitem'   => '',
                    'stoponhover'                       => '',
                    'slidespeed'                        => '3000',
                ), $atts ) );

            $output = $slider_config = $blog_post = '';
            global $hcode_slider_parent_type;
            $hcode_slider_parent_type = $show_blog_slider_style;
            $pagination               = hcode_owl_pagination_slider_classes($show_pagination_style);
            $pagination_style         = hcode_owl_pagination_color_classes($show_pagination_color_style);
            $hcode_slider_id          = ( $hcode_slider_id ) ? $hcode_slider_id : 'hcode-testimonial';
            $hcode_slider_class       = ( $hcode_slider_class ) ? ' '.$hcode_slider_class : '';
            $show_cursor_color_style  = ( $show_cursor_color_style ) ? ' '.$show_cursor_color_style : ' cursor-black';
            $output .= '<div class="testimonial-slider position-relative no-transition">';
                $output .= '<div id="'.$hcode_slider_id.'" class="owl-pagination-bottom position-relative '.$hcode_slider_class.$pagination.$pagination_style.$show_cursor_color_style.'">';
                                $output .= do_shortcode($content);
                $output .= '</div>';
            $output .= '</div>';

        /* Add custom script Start*/
        $slidespeed = ( $slidespeed ) ? $slidespeed : '3000';
        ( $show_pagination == 1 ) ? $slider_config .= 'pagination: true,' : $slider_config .= 'pagination: false,';
        ( $hcode_image_carousel_singleitem ) ? $slider_config .= 'singleItem: true,' : '';
        ( $hcode_image_carousel_autoplay == 1 ) ? $slider_config .= 'autoPlay: '.$slidespeed.',' : $slider_config .= 'autoPlay: false,';
        ( $stoponhover == 1) ? $slider_config .= 'stopOnHover: true, ' : $slider_config .= 'stopOnHover: false, ';
        ( $hcode_image_carousel_itemsdesktop ) ? $slider_config .= 'items: '.$hcode_image_carousel_itemsdesktop.',' : $slider_config .= 'items: 3,';
        ( $hcode_image_carousel_itemsdesktop ) ? $slider_config .= 'itemsDesktop: [1200,'.$hcode_image_carousel_itemsdesktop.'],' : $slider_config .= 'itemsDesktop: [1200, 3],';
        ( $hcode_image_carousel_itemstablet ) ? $slider_config .= 'itemsTablet: [800,'.$hcode_image_carousel_itemstablet.'],' : $slider_config .= 'itemsTablet: [800, 2],';
        ( $hcode_image_carousel_itemsmobile ) ? $slider_config .= 'itemsMobile: [700,'.$hcode_image_carousel_itemsmobile.'],' : $slider_config .= 'itemsMobile: [700, 1],';
        $slider_config .= 'navigationText: ["<i class=\'fa fa-angle-left\'></i>", "<i class=\'fa fa-angle-right\'></i>"]';

        ob_start();?>
        <script type="text/javascript">jQuery(document).ready(function () { jQuery("<?php echo '#'.$hcode_slider_id;?>").owlCarousel({ <?php echo $slider_config;?> }); });</script>
        <?php
        $script = ob_get_contents();
        ob_end_clean();
        $output .= $script;
        /* Add custom script End*/
        return $output;
    }

add_shortcode( 'hcode_testimonial', 'hcode_testimonial_shortcode' );
