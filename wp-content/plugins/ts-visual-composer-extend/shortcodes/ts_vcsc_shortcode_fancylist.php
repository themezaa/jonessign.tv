<?php
	add_shortcode('TS_VCSC_Fancy_List', 'TS_VCSC_Fancy_List_Function');
	function TS_VCSC_Fancy_List_Function ($atts, $content = null) {
		global $VISUAL_COMPOSER_EXTENSIONS;
		ob_start();

		wp_enqueue_style('ts-visual-composer-extend-front');
	
		extract( shortcode_atts( array(
			'list_type'					=> 'standard',
			'list_marker'				=> 'disc',
			'list_order'				=> 'decimal',
			'list_position'				=> 'outside',
			'line_height'				=> 18,
			
			'marker_margin'				=> 0,
			'marker_image'				=> '',
			'marker_icon'				=> '',
			'marker_position'			=> 'center',
			
			'order_start1'				=> 0,
			'order_start2'				=> 0,
			'marker_color'				=> '#000000',
			'marker_size'				=> 12,
			
			'content_wpautop'			=> 'false',
			'content_intend'			=> 0,
			'content_margin'			=> 5,
			'content_color'				=> '#000000',
			'content_size'				=> 14,
			'content_family'			=> 'Default:regular',
			'content_font'				=> 'default',
			
			'frame_type'				=> '',
			'frame_position'			=> 'bottom',
			'frame_padding'				=> 5,
			'frame_thick'				=> 1,
			'frame_color'				=> '#cccccc',
			
			'margin_top'                => 0,
			'margin_bottom'             => 0,
			'el_id' 					=> '',
			'el_class'                  => '',
			'css'						=> '',
		), $atts ));
		
		$output 						= '';
		$styling						= '';
		$wpautop 						= ($content_wpautop == "true" ? true : false);
		
		if (!empty($el_id)) {
			$list_id					= $el_id;
		} else {
			$list_id					= 'ts-fancy-list-' . mt_rand(999999, 9999999);
		}
		
		if (($list_type == "icon") || ($list_type == "image")) {
			$list_marker				= 'none';
		}
		if ($list_type == "image") {
			$list_image					= "list-style: none !important; background-image: url('" . $marker_image . "'); background-repeat: no-repeat; background-position: 0px " . $marker_position . "; background-size: " . $marker_size . "px " . $marker_size . "px; padding-left: " . ($marker_size + 10) . "px;";
		} else {
			$list_image					= "";
		}
		if ($list_type == "icon") {
			if ($marker_position == 'center') {
				$marker_position		= 'middle';
			}
		}		
		if ($frame_type != '') {
			$list_border				= 'border-' . $frame_position . ': ' . $frame_thick . 'px ' . $frame_type . ' ' . $frame_color . '; padding-' . $frame_position . ': ' . $frame_padding . 'px;';
		} else {
			$list_border				= "";
		}
		
		if (function_exists('vc_shortcode_custom_css_class')) {
			$css_class 					= apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, ' ' . vc_shortcode_custom_css_class($css, ' '), 'TS_VCSC_Fancy_List', $atts);
		} else {
			$css_class					= '';
		}		
		
		if (function_exists('wpb_js_remove_wpautop')){
			$list_content				= (wpb_js_remove_wpautop(do_shortcode($content), $wpautop));
		} else {
			$list_content				= do_shortcode($content);
		}
		
		// Remove Empty Paragraphs
		$list_content 					= force_balance_tags($list_content);
		$list_content 					= preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $list_content);
		$list_content 					= preg_replace('~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $list_content);
		$list_content 					= str_ireplace('<p></p>', '', $list_content);		
		// Convert Ordered Lists to Unordered Lists
		$list_content 					= str_ireplace('<ol>', '<ul>', $list_content);
		$list_content 					= str_ireplace('</ol>', '</ul>', $list_content);
		// Remove Empty List Items
		$list_content 					= str_ireplace('<li></li>', '', $list_content);		
		// Store All Attributes From List
		$list_style 					= TS_VCSC_GetStringBetween($list_content, '<ul', '>');
		// Remove All Attributes From List
		$list_content 					= str_ireplace($list_style, '', $list_content);		
		// Extract Styles Attribute from Attrbiutes
		$list_style 					= TS_VCSC_GetStringBetween($list_style, 'style="', '"');
		// Remove Opening + Closing UL Tags
		$list_content					= preg_replace('/<ul>/i', '', $list_content, -1);
		$list_content 					= str_ireplace('</ul>', '', $list_content);
		// Convert All Opening LI Tags To DIV
		$list_array 					= str_ireplace('<li', '<div', $list_content);
		// Convert List To Array
		$list_array 					= explode('</li>', $list_array);
		// Check Array For Rouqe UL Tags + P Tags + Empty Strings
		foreach ($list_array as $key => $value){
			if ((trim($value) == '<ul>') || (trim($value) == '</ul>') || (trim($value) == '<p>') || (trim($value) == '</p>') || (trim($value) == '')) {
				unset($list_array[$key]);
			}
		}
		$list_length					= count($list_array);
		$list_counter					= 0;

		// Create Inline CSS Style
		$styling .= '<style id="' . $list_id . '-styling" type="text/css">';
			$styling .= '#' . $list_id . ' .ts-fancy-list-wrapper {';
				$styling .= 'margin: 0 0 0 ' . $marker_margin . 'px; list-style-type: ' . ($list_type == "ordered" ? $list_order : $list_marker) . '; list-style-position: ' . $list_position . '; color: ' . $marker_color . '; font-size: ' . $marker_size . 'px; line-height: ' . $line_height . 'px; ' . $list_style;
				$styling .= TS_VCSC_GetFontFamily($list_id, $content_family, $content_font, false, true, false);
			$styling .= '}';
			if ($list_type == "icon") {
				$styling .= '#' . $list_id . ' .ts-fancy-list-wrapper li {';
					$styling .= 'list-style: none !important; border: none; margin: ' . $content_margin . 'px 0; padding: 0; line-height: ' . $line_height . 'px; font-family: inherit;';
					if (($frame_type != '') && ($frame_position == "right")) {
						$styling .= $list_border;
					}
				$styling .= '}';
				$styling .= '#' . $list_id . ' .ts-fancy-list-wrapper li i {';
					$styling .= 'display: table-cell; margin: 0; padding: 0 10px 0 0; color: ' . $marker_color . '; font-size: ' . $marker_size . 'px; vertical-align: ' . $marker_position . ';';
				$styling .= '}';
				$styling .= '#' . $list_id . ' .ts-fancy-list-wrapper li div {';
					$styling .= 'margin: 0; padding: 0; color: ' . $content_color . '; font-size: ' . $content_size . 'px; line-height: ' . $line_height . 'px; display: table-cell; font-family: inherit;';
					if (($frame_type != '') && ($frame_position == "left")) {
						$styling .= $list_border;
					}
				$styling .= '}';
			} else {
				$styling .= '#' . $list_id . ' .ts-fancy-list-wrapper li {';
					$styling .= 'border: none; margin: ' . $content_margin . 'px 0; padding: 0; line-height: ' . $line_height . 'px; font-family: inherit; ' . $list_image;
					if (($frame_type != '') && ($frame_position == "right")) {
						$styling .= $list_border;
					}
				$styling .= '}';
				$styling .= '#' . $list_id . ' .ts-fancy-list-wrapper li div {';
					$styling .= 'margin: 0; padding: 0; color: ' . $content_color . '; font-size: ' . $content_size . 'px; line-height: ' . $line_height . 'px; display: block; font-family: inherit;';
					if (($frame_type != '') && ($frame_position == "left")) {
						$styling .= $list_border;
					}
				$styling .= '}';
		}
		$styling .= '</style>';
		// Create List Output
		$output .= TS_VCSC_MinifyCSS($styling);
		$output .= '<div id="' . $list_id . '" class="ts-fancy-list-container ' . $css_class . '" style="margin-left: ' . $content_intend . 'px; margin-top: ' . $margin_top . 'px; margin-bottom: ' . $margin_bottom . 'px;">';
			if ($list_type != 'ordered') {
				$output .= '<ul class="ts-fancy-list-wrapper ts-fancy-list-unordered">';
			} else {
				$output .= '<ol class="ts-fancy-list-wrapper ts-fancy-list-ordered" start="' . ((($list_order == 'decimal') || ($list_order == 'decimal-leading-zero')) ? $order_start1 : $order_start2) . '">';
			}
				foreach ($list_array as $key => $value){
					if (substr(trim($value), 0, 4) === "<div") {
						$list_counter++;
						if ($list_type == "icon") {
							$output .= '<li data-count="' . $list_counter . '" style="' . (((($frame_position == "bottom")&& ($list_counter < $list_length)) || (($frame_position == "top")&& ($list_counter > 1))) ? $list_border : "") . '"><i class="' . $marker_icon . '"></i>' . $value . '</div></li>';
						} else {
							$output .= '<li data-count="' . $list_counter . '" style="' . (((($frame_position == "bottom")&& ($list_counter < $list_length)) || (($frame_position == "top")&& ($list_counter > 1))) ? $list_border : "") . '">' . $value . '</div></li>';
						}
					}
				}
			if ($list_type != 'ordered') {
				$output .= '</ul>';
			} else {
				$output .= '</ol>';
			}
		$output .= '</div>';
		
		echo $output;
		
		$myvariable = ob_get_clean();
		return $myvariable;
	}
?>