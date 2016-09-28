<?php
/*
Plugin Name: Lead Forensics
Plugin URI: http://wordpress.org/extend/plugins/leadforensics/
Description: Lead Forensics allows you to Turn your anonymous website visitors into sales leads, convert new business opportunities before your competitiors and increase your online ROI. This plugin allows you to easily add your tracking code from Lead Forensics to the head of your WordPress site
Version: 3.3.2
Author: Lead Forensics
Author URI: http://www.leadforensics.com/
Author Email: rupert.bowling@leadforensics.com
Network: false
Copyright 2008-2015 Lead Forensics (rupert.bowling@leadforensics.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


class LFRTrackingCode
{
    private $options;
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'lfr_add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'lfr_page_init' ) );
        add_action( 'admin_init', array( $this, 'lfr_plugin_settings_page_permission' ) );
    }
    
    //check user has permission to access this plugin 
    public function lfr_plugin_settings_page_permission()
    {
        if(!current_user_can('manage_options'))
        {
            return;
        }

        //Setting links while plugin is active
        add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array( $this, 'lfr_add_action_links' ) );
    }

    function lfr_add_action_links ( $links )
    {
        $mylinks = array(
            '<a href="' . admin_url( 'options-general.php?page=tracking_settings' ) . '">Settings</a>',
        );

        return array_merge( $links, $mylinks );
    }
    
    public function lfr_add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'Lead Forensics', 
            'manage_options', 
            'tracking_settings', 
            array( $this, 'lfr_create_admin_page' )
        );
    }
 
    public function lfr_create_admin_page()
    {
        $this->options = get_option( 'my_option_name' );
        ?>
            <div class="wrap">
                <h2>Lead Forensics Tracking</h2>           
                <form method="post" action="options.php">
                <?php

                    settings_fields( 'my_option_group' );   
                    do_settings_sections( 'my-setting-admin' );
                    submit_button(); 
                    lfr_print_section_info_video();
                ?>
                </form>
            </div>
        <?php
    }

    public function lfr_page_init()
    {        
        register_setting(
            'my_option_group', 
            'my_option_name', 
            array( $this, 'lfr_sanitize' ) 
        );

        add_settings_section(
            'setting_section_id', 
            'Lead Forensics', 
            array( $this, 'lfr_print_section_info' ),
            'my-setting-admin' 
        );  
        add_settings_field(
            'script_textarea', 
            '', 
            array( $this, 'lfr_script_textarea' ), 
            'my-setting-admin', 
            'setting_section_id'
        ); 
    }

    public function lfr_sanitize( $input )
    {
        //echo esc_textarea(trim($input['script_textarea']));
        $new_input = array();
        if( isset( $input['script_textarea'] ) )
            $new_input['script_textarea'] =  trim($input['script_textarea']);
        return $new_input;
    }
    
    public function lfr_print_section_info()
    {
        print '<a href="http://www.leadforensics.com" target="_blank">Lead Forensics </a> is a B2B tool used to identify the unidentified visitors that visit your website.<br/>
               This Plugin will assist you in placing the <a href="https://portal.leadforensics.com/TrackingCode" target="blank">Tracking Code </a> into your WordPress site or blog.<br/><br/>
               <strong>Enter your Lead Forensics code below</strong><br/>';
    }

    public function lfr_script_textarea()
    {
    ?>
        <textarea cols="75" rows="15" name="<?php echo 'my_option_name[script_textarea]'; ?>" type="textarea"><?php $script_textarea = isset( $this->options['script_textarea'] ) ? esc_attr( $this->options['script_textarea']) : '%s';
        $safe_text = apply_filters( 'esc_textarea', $script_textarea);
        if ( !empty( $safe_text ) ){echo trim($safe_text);}
        ?>
        </textarea>
    <?php        
    }
    
    //hook to display the script on front side
    public function lfr_my_custom_js() 
    {
        $get_all_value_array = get_site_option( 'my_option_name', true ); 
        
        $script_textarea = $get_all_value_array['script_textarea'];
        $jsenable =  $get_all_value_array['jsenable'];

        if($script_textarea !='')
        {
            $safe_text = apply_filters( 'esc_textarea', $script_textarea);
            if ( !empty( $safe_text ) )
            {
                echo trim((htmlspecialchars_decode($safe_text)));
            }
        }
    }
}

add_action('wp_head', array ('LFRTrackingCode', 'lfr_my_custom_js'));

if( is_admin() )
    $my_settings_page = new LFRTrackingCode();
    
function lfr_print_section_info_video()
    {
        echo '<div class="textare_descrption">
        <h1>
            About Lead Forensics
        </h1>
        <div class="video_cover">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/gP-Ol1AfBoQ" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>';
    }
    
function lfr_admin_js() {
    
    global $current_screen; 
    $settings_page_tracking_settings=  $current_screen->base; 
    if($settings_page_tracking_settings=='settings_page_tracking_settings')
    {
        wp_register_script('my-scripts', plugins_url('/js/custom.js', __FILE__ ) );
        wp_enqueue_script('my-scripts');
        wp_localize_script('my-scripts', 'wp_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
    }
    
}
add_action('admin_head', 'lfr_admin_js');
?>