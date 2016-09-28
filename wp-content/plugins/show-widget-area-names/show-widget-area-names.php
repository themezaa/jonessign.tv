<?php
/*
Plugin Name: Show Widget Area Names (SWAN)
Plugin URI: http://www.amplitudedesign.com
Description: SWAN displays the widget area names on non-admin pages and posts. This adds the title to widget $params['before_widget'].
Version: 1.0.18
Author: Kevin Johnson
Author URI: http://www.amplitudedesign.com
License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

/**
* This adds the name of the area to the 'before_widget'
* @param array $params
*/
class ShowWidgetTitle
{

    public static function widget_show_title($params){
        // If the user can't manage options return $name
        if (!current_user_can('edit_posts') )return($params);
                $params[0]['before_widget'] .= '<div class="adi-widget-area-name" >'.$params[0]['name'].'&nbsp;<a target="_blank" href="'.site_url().'/wp-admin/widgets.php" title="'.$params[0]['name'].'" alt="'.$params[0]['name'].'">[edit]</a></div>';
        return($params);
    }

    public static function widget_show_title_load(){
    //Only register on the non-admin pages of the site.
        if(current_user_can('edit_posts') && !is_admin()){
                add_filter("dynamic_sidebar_params",array(__CLASS__,'widget_show_title'));
        }
    }

    public static function widget_show_title_scripts(){
        if(current_user_can('edit_posts') && !is_admin()){
                wp_register_style('adi-widget-area-names', plugins_url().'/show-widget-area-names/css/adi-show-widget-areas.css');
                wp_enqueue_style('adi-widget-area-names');
                wp_register_script('adi-widget-area-names-js',plugins_url().'/show-widget-area-names/js/adi-show-widget-areas.js', array('jquery'), '1.0.17', true);
                wp_enqueue_script('adi-widget-area-names-js');
        }
    }

    public static function admin_bar_render() {
        global $wp_admin_bar;

        // we can add a submenu item too
        $wp_admin_bar->add_node( array(
            'parent' => false,
            'id' => 'show-widget-area-toggle',
            'meta' => array('class' => 'show-widget-area-toggle', 'title' => 'Show Widget Area Names', 'onclick' => 'swanToggle();'),
            'title' => '+ swan',
            'href' => '#'
        ) );
    }

    function set_options(){
        add_option('swan-persist',true,null,true);
    }

    function unset_options(){
        delete_option('swan-persist');
    }
}

register_activation_hook(__FILE__,array('ShowWidgetTitle','set_options'));
register_deactivation_hook(__FILE__,array('ShowWidgetTitle','delete_options'));


if (!is_admin()):
    add_action('plugins_loaded',array('ShowWidgetTitle','widget_show_title_load'));
    add_action('wp_enqueue_scripts',array('ShowWidgetTitle','widget_show_title_scripts'));
    // and we hook our function via
    add_action( 'wp_before_admin_bar_render', array('ShowWidgetTitle','admin_bar_render') );
endif;