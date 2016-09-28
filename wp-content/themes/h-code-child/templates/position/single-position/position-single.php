<?php
/**
 * displaying content for single position posts
 *
 * @package H-Code
 */
?>
<?php
$output              = '';
$position_image      = hcode_post_meta('hcode_image');
$position_gallery    = hcode_post_meta('hcode_gallery');
$position_video      = hcode_post_meta('hcode_video');
$position_link       = hcode_post_meta('hcode_link_type');
$hcode_options       = get_option('hcode_theme_setting');
$layout_settings     = hcode_option('hcode_layout_settings');
$section_class_start = $section_class_end = $position_title = $position_meta = $position_meta_start = $position_meta_end = $position_meta_category_start = $position_meta_category_end = '';


switch ($layout_settings) {
    case 'hcode_layout_full_screen':
        $section_class_start .= '<section class="no-padding-bottom"><div class="container"><div class="row"><div class="col-md-12">';
        $section_class_end .= '</div></div></div></section>';

        $position_meta_category_start = '<section class="padding-top-40px no-padding-bottom"><div class="container"><div class="row"><div class="col-md-12 col-sm-12 text-center">';
        $position_meta_category_end .= '</div></div></div></section>';

        $position_meta_start .= '<div class="col-md-12 col-sm-12 col-xs-12 margin-five-bottom sm-margin-eight-bottom xs-margin-five-bottom">';
        $position_meta_end .= '</div>';
        break;
    case 'hcode_layout_both_sidebar':
        $section_class_start .= '<section class="no-padding"><div class="container"><div class="row">';
        $section_class_end .= '</div></div></section>';

        $position_meta_category_start .= '<section class="padding-top-40px no-padding-bottom clear-both"><div class="container"><div class="row"><div class="col-md-12 col-sm-12 text-center no-padding">';
        $position_meta_category_end .= '</div></div></div></section>';
        break;

    case 'hcode_layout_left_sidebar':
    case 'hcode_layout_right_sidebar':
        $section_class_start .= '<section class="no-padding"><div class="container"><div class="row">';
        $section_class_end .= '</div></div></section>';
        $position_meta_category_start .= '<section class="padding-top-40px no-padding-bottom clear-both"><div class="container"><div class="row"><div class="col-md-12 col-sm-12 text-center no-padding">';
        $position_meta_category_end .= '</div></div></div></section>';
        break;
}
if (!empty($position_gallery)) {
    ob_start();
    echo $section_class_start;
    echo $position_title;
    get_template_part('loop/single-position/position', 'gallery');
    echo $section_class_end;
    $output .= ob_get_contents();
    ob_end_clean();
}elseif (!empty($position_video)) {
    ob_start();
    echo $section_class_start;
    echo $position_title;
    get_template_part('loop/single-position/position', 'video');
    echo $section_class_end;
    $output .= ob_get_contents();
    ob_end_clean();
}elseif (!empty($position_image)) {
    ob_start();
    if($position_image == 1){
        echo $section_class_start;
        echo $position_title;
        get_template_part('loop/single-position/position', 'image');
        echo $section_class_end;
    }
    $output .= ob_get_contents();
    ob_end_clean();
}else {
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
    $url = $thumb['0'];
    if ($url):
        $output .= $section_class_start;
        $output .= $position_title;
        $output .= '<div class="gallery-img margin-bottom-30px">';
            $output .= '<img src="' . $url . '" width="'.$thumb[1].'" height="'.$thumb[2].'" alt="">';
        $output .= '</div>';
        $output .= $section_class_end;
    else:
        $output .= '<div class="gallery-img margin-bottom-30px">';
            $output .= '<img src="' . HCODE_THEME_ASSETS_URI . '/images/no-image.jpg" width="900" height="600" alt=""/>';
        $output .= '</div>';
    endif;
}
echo $output;
?>
<div class="blog-details-text position-single-content">
<?php the_content(); ?>

    <?php
    $hcode_enable_meta_author_position   = hcode_option('hcode_enable_meta_author_position');
    $hcode_enable_meta_date_position     = hcode_option('hcode_enable_meta_date_position');
    $hcode_enable_meta_category_position = hcode_option('hcode_enable_meta_category_position');
    if (!empty($url) || !empty($position_gallery) || !empty($position_video) || !empty($position_link)):
        if( $hcode_enable_meta_author_position == 1 || $hcode_enable_meta_date_position == 1 || $hcode_enable_meta_category_position == 1){
            echo $position_meta_category_start;
                echo $position_meta = '<div class="blog-date no-padding-top">' . hcode_single_position_meta() . '</div>';
            echo $position_meta_category_end;
        }
    endif;
    ?>

</div>
<section class="no-padding">
    <div class="container">
        <div class="row">
            <?php
            $hcode_enable_tags             = hcode_option('hcode_enable_meta_tags_position');
            $enable_post_author            = hcode_option('hcode_enable_post_author_position');
            $enable_social_icons           = hcode_option('hcode_social_icons_position');
            $hcode_enable_position_comment = hcode_option('hcode_enable_position_comment');
            if ($hcode_enable_tags == 1 || $enable_post_author == 1 || $enable_social_icons == 1 || $hcode_enable_position_comment == 1):
            ?>

            <?php echo $position_meta_start; ?>
                <?php
                if ($hcode_enable_tags == 1):
                        hcode_single_position_meta_tag();
                endif;
                ?>
                <?php
                if ($enable_post_author == 1):
                    // Author bio.
                    if (is_single() && get_the_author_meta('description')) :
                        get_template_part('author-bio');
                    endif;
                endif;
                ?>

                <?php
                if ($enable_social_icons == 1):
                    echo do_shortcode('[hcode_single_post_share]');
                endif;
                ?>
                <?php
                if ($hcode_enable_position_comment == 1):
                    // If comments are open or we have at least one comment, load up the comment template
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                        //echo '</div></div></div>';
                    endif;
                endif;
                ?>
            <?php
            echo $position_meta_end;
            endif;
        ?>
        </div>
    </div>
    <div>
    	<?php
    	jones_position_related_items();
    	?>
    </div>
</section>