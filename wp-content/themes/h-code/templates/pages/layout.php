<?php
/**
 * displaying layout for archive, search page
 *
 * @package H-Code
 */

get_header(); 

$layout_settings = $enable_container_fluid = $class_main_section = $section_class = $class = $output = $page = '';
$layout_settings_inner = hcode_option('hcode_general_settings');
$hcode_options = get_option( 'hcode_theme_setting' );

   
$layout_settings = (isset($hcode_options['hcode_general_settings'])) ? $hcode_options['hcode_general_settings'] : '';
$enable_container_fluid = (isset($hcode_options['hcode_general_enable_container_fluid'])) ? $hcode_options['hcode_general_enable_container_fluid'] : '';
switch ($layout_settings) {
    case 'hcode_general_full_screen':
        $section_class .= '';
        if(isset($enable_container_fluid) && $enable_container_fluid == '1')
            $class_main_section .= 'container-fluid';
        else
            $class_main_section .= 'container';
    break;

    case 'hcode_general_both_sidebar':
        $section_class .= '';
        $class_main_section .= 'container col3-layout';
    break;

    case 'hcode_general_left_sidebar':
    case 'hcode_general_right_sidebar':
        $section_class .= '';
        $class_main_section .= 'container col2-layout';
    break;

    default:
        $section_class .= '';
        $class_main_section .= 'container';
    break;
}

// Check menu type for page
$hcode_header_menu_type = (isset($hcode_options['hcode_header_layout_general'])) ? $hcode_options['hcode_header_layout_general'] : '';
$hcode_layout_settings = (isset($hcode_options['hcode_general_layout_settings'])) ? $hcode_options['hcode_general_layout_settings'] : '';
?>
<?php
$title = '';
if (class_exists('breadcrumb_navigation_xt')) 
{
    $hcode_breadcrumb = new breadcrumb_navigation_xt;
    $hcode_breadcrumb->opt['static_frontpage'] = false;
    $hcode_breadcrumb->opt['url_blog'] = '';
    $hcode_breadcrumb->opt['title_blog'] = __('Home','H-Code');
    $hcode_breadcrumb->opt['title_home'] = __('Home','H-Code');
    $hcode_breadcrumb->opt['separator'] = '';
    $hcode_breadcrumb->opt['tag_page_prefix'] = '';
    $hcode_breadcrumb->opt['singleblogpost_category_display'] = false;
} 
if(is_search()):
    $title .= __('Search For ','H-Code').'"'.get_search_query().'"';
elseif(is_author()):
    $title .= get_the_author();
else: 
    if ( is_day() ) :
        $title .= get_the_date() ;

    elseif ( is_month() ) :
        $title .=get_the_date( _x( 'F Y', 'monthly archives date format', 'H-Code' ) ) ;

    elseif ( is_year() ) :
        $title .= get_the_date( _x( 'Y', 'yearly archives date format', 'H-Code' ) );

    endif;
    $title .= single_cat_title( '', false );
endif;

    $top_header_class = '';
    
    $hcode_options = get_option( 'hcode_theme_setting' );
    $hcode_enable_header = (isset($hcode_options['hcode_enable_header_general'])) ? $hcode_options['hcode_enable_header_general'] : '';
    $hcode_header_layout = (isset($hcode_options['hcode_header_layout_general'])) ? $hcode_options['hcode_header_layout_general'] : '';
        
    if($hcode_enable_header == 1 && $hcode_header_layout != 'headertype8')
    {
        $top_header_class .= 'content-top-margin';
    }
   

    $output .= '<section class="'.$top_header_class.' page-title page-title-small bg-gray">';
        $output .= '<div class="container">';
            $output .= '<div class="row">';
                $output .= '<div class="col-lg-8 col-md-7 col-md-12 col-sm-12 animated fadeInUp">';
                        $output .= '<h1 class="black-text">'.$title.'</h1>';
                $output .= '</div>';
                $output .= '<div class="col-lg-4 col-md-5 col-sm-12 breadcrumb text-uppercase xs-display-none">';
                    $output .= '<ul class="breadcrumb-gray-text">';
                        $output .= $hcode_breadcrumb->display();
                    $output .= '</ul>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';
    $output .= '</section>';
echo $output;
?>
<section class="parent-section <?php echo $section_class.' '.$hcode_header_menu_type; ?>">
    <div class="<?php echo $class_main_section; ?>">
            <div class="row">
                    <?php get_template_part('templates/archive-left'); ?>
                <?php  
                    get_template_part('templates/page-content/'.$hcode_layout_settings.'/content',get_post_format());
                ?>
                    <?php get_template_part('templates/archive-right'); ?>
            </div>
    </div>
</section>
	
<?php get_footer(); ?>
