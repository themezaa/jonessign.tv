<?php
/**
 * Animation Styles For VC Fields.
 *
 * @package H-Code
 */
?>
<?php 
if( !function_exists('hcode_animation_style')):
  function hcode_animation_style() {
  	$output = '';
    $output = array(esc_html__('no style', 'hcode-addons') => '',
    				esc_html__('bounce', 'hcode-addons') => 'bounce',
    				esc_html__('flash', 'hcode-addons') => 'flash',
    				esc_html__('pulse', 'hcode-addons') => 'pulse',
    				esc_html__('rubberBand', 'hcode-addons') => 'rubberBand',
    				esc_html__('shake', 'hcode-addons') => 'shake',
    				esc_html__('swing', 'hcode-addons') => 'swing',
    				esc_html__('tada', 'hcode-addons') => 'tada',
    				esc_html__('wobble', 'hcode-addons') => 'wobble',
    				esc_html__('jello', 'hcode-addons') => 'jello',
    				esc_html__('bounceIn', 'hcode-addons') => 'bounceIn',
    				esc_html__('bounceInDown', 'hcode-addons') => 'bounceInDown',
    				esc_html__('bounceInLeft', 'hcode-addons') => 'bounceInLeft',
    				esc_html__('bounceInRight', 'hcode-addons') => 'bounceInRight',
    				esc_html__('bounceInUp', 'hcode-addons') => 'bounceInUp',
    				esc_html__('bounceOut', 'hcode-addons') => 'bounceOut',
    				esc_html__('bounceOutDown', 'hcode-addons') => 'bounceOutDown',
    				esc_html__('bounceOutLeft', 'hcode-addons') => 'bounceOutLeft',
    				esc_html__('bounceOutRight', 'hcode-addons') => 'bounceOutRight',
    				esc_html__('bounceOutUp', 'hcode-addons') => 'bounceOutUp',
    				esc_html__('fadeIn', 'hcode-addons') => 'fadeIn',
    				esc_html__('fadeInDown', 'hcode-addons') => 'fadeInDown',
    				esc_html__('fadeInDownBig', 'hcode-addons') => 'fadeInDownBig',
    				esc_html__('fadeInLeft', 'hcode-addons') => 'fadeInLeft',
    				esc_html__('fadeInLeftBig', 'hcode-addons') => 'fadeInLeftBig',
    				esc_html__('fadeInRight', 'hcode-addons') => 'fadeInRight',
    				esc_html__('fadeInRightBig', 'hcode-addons') => 'fadeInRightBig',
    				esc_html__('fadeInUp', 'hcode-addons') => 'fadeInUp',
    				esc_html__('fadeInUpBig', 'hcode-addons') => 'fadeInUpBig',
    				esc_html__('fadeOut', 'hcode-addons') => 'fadeOut',
    				esc_html__('fadeOutDown', 'hcode-addons') => 'fadeOutDown',
    				esc_html__('fadeOutDownBig', 'hcode-addons') => 'fadeOutDownBig',
					esc_html__('fadeOutLeft', 'hcode-addons') => 'fadeOutLeft',
					esc_html__('fadeOutLeftBig', 'hcode-addons') => 'fadeOutLeftBig',
					esc_html__('fadeOutRight', 'hcode-addons') => 'fadeOutRight',
					esc_html__('fadeOutRightBig', 'hcode-addons') => 'fadeOutRightBig',
					esc_html__('fadeOutUp', 'hcode-addons') => 'fadeOutUp',
					esc_html__('fadeOutUpBig', 'hcode-addons') => 'fadeOutUpBig',
					esc_html__('flipInX', 'hcode-addons') => 'flipInX',
					esc_html__('flipInY', 'hcode-addons') => 'flipInY',
					esc_html__('flipOutX', 'hcode-addons') => 'flipOutX',
					esc_html__('flipOutY', 'hcode-addons') => 'flipOutY',
					esc_html__('lightSpeedIn', 'hcode-addons') => 'lightSpeedIn',
					esc_html__('lightSpeedOut', 'hcode-addons') => 'lightSpeedOut',
					esc_html__('rotateIn', 'hcode-addons') => 'rotateIn',
					esc_html__('rotateInDownLeft', 'hcode-addons') => 'rotateInDownLeft',
					esc_html__('rotateInDownRight', 'hcode-addons') => 'rotateInDownRight',
					esc_html__('rotateInUpLeft', 'hcode-addons') => 'rotateInUpLeft',
					esc_html__('rotateInUpRight', 'hcode-addons') => 'rotateInUpRight',
					esc_html__('rotateOut', 'hcode-addons') => 'rotateOut',
					esc_html__('rotateOutDownLeft', 'hcode-addons') => 'rotateOutDownLeft',
					esc_html__('rotateOutDownRight', 'hcode-addons') => '',
					esc_html__('rotateOutUpLeft', 'hcode-addons') => 'rotateOutDownRight',
					esc_html__('rotateOutUpRight', 'hcode-addons') => 'rotateOutUpRight',
					esc_html__('hinge', 'hcode-addons') => 'hinge',
					esc_html__('rollIn', 'hcode-addons') => 'rollIn',
					esc_html__('rollOut', 'hcode-addons') => 'rollOut',
					esc_html__('zoomIn', 'hcode-addons') => 'zoomIn',
					esc_html__('zoomInDown', 'hcode-addons') => 'zoomInDown',
					esc_html__('zoomInLeft', 'hcode-addons') => 'zoomInLeft',
					esc_html__('zoomInRight', 'hcode-addons') => 'zoomInRight',
					esc_html__('zoomInUp', 'hcode-addons') => 'zoomInUp',
					esc_html__('zoomOut', 'hcode-addons') => 'zoomOut',
					esc_html__('zoomOutDown', 'hcode-addons') => 'zoomOutDown',
					esc_html__('zoomOutLeft', 'hcode-addons') => 'zoomOutLeft',
					esc_html__('zoomOutRight', 'hcode-addons') => 'zoomOutRight',
					esc_html__('zoomOutUp', 'hcode-addons') => 'zoomOutUp',
					esc_html__('slideInDown', 'hcode-addons') => 'slideInDown',
					esc_html__('slideInLeft', 'hcode-addons') => 'slideInLeft',
					esc_html__('slideInRight', 'hcode-addons') => 'slideInRight',
					esc_html__('slideInUp', 'hcode-addons') => 'slideInUp',
					esc_html__('slideOutDown', 'hcode-addons') => 'slideOutDown',
					esc_html__('slideOutLeft', 'hcode-addons') => 'slideOutLeft',
    			    esc_html__('slideOutRight', 'hcode-addons') => 'slideOutRight',
    			    esc_html__('slideOutUp', 'hcode-addons') => 'slideOutUp',
    			    );
    return $output;
  }
endif;
?>