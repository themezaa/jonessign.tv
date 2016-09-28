<?php
/**
 * Shortcode For Testimonial
 *
 * @package H-Code
 */
?>
<?php
    function hcode_testimonial_slide_content_shortcode( $atts, $content = null) {
    	global $hcode_testimonial_parent_type;
        extract( shortcode_atts( array(
                    'image'             => '',
                    'title'             => '',
                    'hcode_title_color' => '',
                    'hcode_icon_color'  => '',
                    'hcode_icon'        => '',
                    'hcode_icon_size'   => '',
                ), $atts ) );
        $output = '';
        ob_start();
        $title       = ( $title ) ? $title : '';
        /* Image Alt, Title, Caption */
        $img_alt     = hcode_option_image_alt($image);
        $img_title   = hcode_option_image_title($image);
        $image_alt   = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? 'alt           = "'.$img_alt['alt'].'"' : 'alt    = ""' ;
        $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? 'title = "'.$img_title['title'].'"' : '';

        $thumb = wp_get_attachment_image_src($image, 'full');
        $hcode_title_color = ($hcode_title_color) ? 'style="color:'.$hcode_title_color.'"' : '';
        $hcode_icon_color = ($hcode_icon_color) ? 'style="color:'.$hcode_icon_color.'"' : '';
        $hcode_icon_size = ( $hcode_icon_size ) ? $hcode_icon_size : '';
        if( $thumb[0] || $content || $title ):
                $output .= '<div class="col-md-12 col-sm-12 col-xs-12 testimonial-style2 center-col text-center margin-three no-margin-top">';
                if( $thumb[0] ):
                    // $output .= '<img '.$image_alt.$image_title.' src="'.$thumb[0].'" width="'.$thumb[1].'" height="'.$thumb[2].'">';
                     $output .= '<img '.$image_alt.$image_title.' src="'.$thumb[0].'" width="200" height="200">';
                endif;
                if( $content ):
                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                endif;
                if( $title ):
                    $output .= '<span class="name light-gray-text2" '.$hcode_title_color.'>'.$title.'</span>';
                endif;
                if($hcode_icon == 1):
                    $output .= '<i class="fa fa-quote-left '.$hcode_icon_size.' display-block margin-five no-margin-bottom" '.$hcode_icon_color.'></i>';
                endif;
            $output .= '</div>';
        endif;
        return $output;
    }

add_shortcode( 'hcode_testimonial_slide_content', 'hcode_testimonial_slide_content_shortcode' );
?>