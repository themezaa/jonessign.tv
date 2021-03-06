<?php
/**
 * Shortcode For Photography Grid
 *
 * @package H-Code
 */
?>
<?php
/*-----------------------------------------------------------------------------------*/
/* Photography Grid */
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'hcode_photography_grid_shortcode' ) ) {
    function hcode_photography_grid_shortcode( $atts, $content = null ) {
    	extract( shortcode_atts( array(
        			'id' => '',
                    'class' => '',
                ), $atts ) );
        $output = '';
    	$id = ( $id ) ? ' id="'.$id.'"' : '';
    	$class = ( $class ) ? $class : '';
    	$output .= '<div '.$id.' class="work-5col masonry wide photography-grid '.$class.'">';
    		$output .= '<div class="tab-content">';
                $output .='<ul class="grid masonry-block-items">';
                	$output .= do_shortcode($content);
                $output .= '</ul>';
            $output .= '</div>';
        $output .= '</div>';
        return $output;
    }
}
add_shortcode( 'hcode_photography_grid', 'hcode_photography_grid_shortcode' );
 
if ( ! function_exists( 'hcode_photography_grid_content_shortcode' ) ) {
    function hcode_photography_grid_content_shortcode( $atts, $content = null) {
        extract( shortcode_atts( array(
        			'show_content' => '',
                    'hcode_image' => '',
                    'hcode_btn_image' => '',
                    'hcode_title' => '',
                    'hcode_url' => '',
                    'hcode_title_color' => '',
                    'padding_setting' => '',
    	            'desktop_padding' => '',
    	            'custom_desktop_padding' => '',
    	            'ipad_padding' => '',
    	            'mobile_padding' => '',
    	            'margin_setting' => '',
    	            'desktop_margin' => '',
    	            'custom_desktop_margin' => '',
    	            'ipad_margin' => '',
    	            'mobile_margin' => '',
                    'class' => '',
                    'id' => '',
        ), $atts ) );
        $output = $classes = $padding = $margin = $padding_style = $margin_style = $style_attr = $style = '';

        $hcode_title = ($hcode_title) ? str_replace('||', '<br />',$hcode_title) : '';
        $hcode_title_color = ( $hcode_title_color ) ? 'style="color:'.$hcode_title_color.' !important;"' : '';
        $hcode_url = ($hcode_url) ? $hcode_url : '';
        $class = ($class) ? $class : '';
        $id = ($id) ? 'id="'.$id.'"' : '';

        // Column Padding settings
        $padding_setting = ( $padding_setting ) ? $padding_setting : '';
        $desktop_padding = ( $desktop_padding ) ? ' '.$desktop_padding : '';
        $ipad_padding = ( $ipad_padding ) ? ' '.$ipad_padding : '';
        $mobile_padding = ( $mobile_padding ) ? ' '.$mobile_padding : '';
        $custom_desktop_padding = ( $custom_desktop_padding ) ? $custom_desktop_padding : '';
        if($desktop_padding == ' custom-desktop-padding' && $custom_desktop_padding){
                $padding_style .= " padding: ".$custom_desktop_padding.";";
        }else{
                $padding .= $desktop_padding;
        }
        $padding .= $ipad_padding.$mobile_padding;

        // Column Margin settings
        $margin_setting = ( $margin_setting ) ? $margin_setting : '';
        $desktop_margin = ( $desktop_margin ) ? ' '.$desktop_margin : '';
        $ipad_margin = ( $ipad_margin ) ? ' '.$ipad_margin : '';
        $mobile_margin = ( $mobile_margin ) ? ' '.$mobile_margin : '';
        $custom_desktop_margin = ( $custom_desktop_margin ) ? $custom_desktop_margin : '';
        if($desktop_margin == ' custom-desktop-margin' && $custom_desktop_margin){
            $margin_style .= " margin: ".$custom_desktop_margin.";";
        }else{
            $margin .= $desktop_margin;
        }
        $margin .= $ipad_margin.$mobile_margin;

        // Padding and Margin Style Combine
        if($padding_style){
                $style_attr .= $padding_style;
        }
        if($margin_style){
                $style_attr .= $margin_style;
        }
        if($padding || $margin || $class):
            $classes .= 'class="'.$class.$padding.$margin.'"';
        endif;
        if($style_attr){
            $style .= ' style="'.$style_attr.'"';
        }
        
        /* Image Alt, Title, Caption */
        $img_alt = hcode_option_image_alt($hcode_image);
        $img_title = hcode_option_image_title($hcode_image);
        $image_alt = ( isset($img_alt['alt']) && !empty($img_alt['alt']) ) ? 'alt="'.$img_alt['alt'].'"' : 'alt=""' ; 
        $image_title = ( isset($img_title['title']) && !empty($img_title['title']) ) ? 'title="'.$img_title['title'].'"' : '';

        $img_alt_btn = hcode_option_image_alt($hcode_btn_image);
        $img_title_btn = hcode_option_image_title($hcode_btn_image);
        $image_alt_btn = ( isset($img_alt_btn['alt']) && !empty($img_alt_btn['alt']) ) ? 'alt="'.$img_alt_btn['alt'].'"' : 'alt=""' ; 
        $image_title_btn = ( isset($img_title_btn['title']) && !empty($img_title_btn['title']) ) ? 'title="'.$img_title_btn['title'].'"' : '';

        switch ($show_content) {
        	case 'image':
        		$thumb = wp_get_attachment_image_src($hcode_image, 'full');
        		if($thumb[0]):
    	    		$output .='<li '.$classes.' '.$style.'>';
    	                $output .='<img src="'.$thumb[0].'" '.$image_alt.$image_title.' width="'.$thumb[1].'" height="'.$thumb[2].'" >';
    	            $output .='</li>';
                endif;
            break;
        	case 'content-with-title':
        		$thumb = wp_get_attachment_image_src($hcode_image, 'full');
        		$output .='<li '.$id.' '.$classes.' '.$style.'>';
                    if($thumb[0]):
                        $output .='<img src="'.$thumb[0].'" '.$image_alt.$image_title.' width="'.$thumb[1].'" height="'.$thumb[2].'">';
                    endif;
                    $output .='<div class="img-border-small img-border-small-gray border-transperent-light"></div>';
                    if($hcode_title):
                        $output .='<figure>';
                            $output .='<figcaption>';
                                $output .='<div class="photography-grid-details">';
                                    $output .='<div class="separator-line-thick bg-white display-block no-margin-top"></div>';
                                        $output .='<span class="text-large letter-spacing-3 white-text font-weight-600"><a href="'.$hcode_url.'" class="white-text" '.$hcode_title_color.'>'.$hcode_title.'</a></span>';
                                    $output .='<div class="separator-line-thick bg-white display-block no-margin-bottom"></div>';
                                $output .='</div>';
                            $output .='</figcaption>';
                        $output .='</figure>';
                    endif;
                $output .='</li>';
            break;
            case 'content-with-img-button':
                $thumb = wp_get_attachment_image_src($hcode_image, 'full');
                $thumb_btn = wp_get_attachment_image_src($hcode_btn_image, 'full');
                $output .='<li '.$id.' '.$classes.' '.$style.'>';
                    if($thumb[0]):
                        $output .='<img src="'.$thumb[0].'" '.$image_alt.$image_title.' width="'.$thumb[1].'" height="'.$thumb[2].'" >';
                    endif;
                    $output .='<figure>';
                        $output .='<figcaption>';
                            $output .='<div class="photography-grid-details">';
                                if($content):
                                    $output .= do_shortcode( hcode_remove_wpautop( $content ) );
                                endif;
                                if($thumb_btn):
                                    $output .='<a href="'.$hcode_url.'"><img src="'.$thumb_btn[0].'" width="'.$thumb_btn[1].'" height="'.$thumb_btn[2].'" '.$image_alt_btn.$image_title_btn.' class="width-auto margin-ten no-margin-bottom"/></a>';
                                endif;
                            $output .='</div>';
                        $output .='</figcaption>';
                    $output .='</figure>';
                $output .='</li>';
            break;
            case 'simple-content':
                $thumb = wp_get_attachment_image_src($hcode_image, 'full');
                $output .='<li '.$id.' '.$classes.' '.$style.'>';
                    if($thumb[0]):
                        $output .='<img src="'.$thumb[0].'" '.$image_alt.$image_title.' width="'.$thumb[1].'" height="'.$thumb[2].'" >';
                    endif;
                    if($content):
                        $output .='<figure>';
                            $output .='<figcaption>';
                                $output .='<div class="photography-grid-details text-center">';
                                    $output .= do_shortcode( $content );
                                $output .='</div>';
                            $output .='</figcaption>';
                        $output .='</figure>';
                    endif;
                $output .='</li>';
        	break;
        }
        return $output;
    }
}
add_shortcode( 'hcode_photography_grid_content', 'hcode_photography_grid_content_shortcode' );
?>