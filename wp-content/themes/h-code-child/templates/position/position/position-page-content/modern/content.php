<?php
/**
 * displaying content for blog single page modern layout
 *
 * @package H-Code
 */
?>
<?php
$page = '';  
if(is_search()){
    $page = 'search';
}
$hcode_options = get_option( 'hcode_theme_setting' );
$hcode_search_layout_settings = (isset($hcode_options['hcode_general_layout_settings'])) ? $hcode_options['hcode_general_layout_settings'] : '';
$hcode_excerpt_length = (isset($hcode_options['hcode_general_excerpt_length'])) ? $hcode_options['hcode_general_excerpt_length'] : '';
$hcode_columns_settings = (isset($hcode_options['hcode_general_columns_settings'])) ? $hcode_options['hcode_general_columns_settings'] : '';

if( have_posts() ):
    while ( have_posts() ) : the_post();
        $show_excerpt = ( !empty($hcode_excerpt_length) ) ? wpautop(hcode_get_the_excerpt_theme($hcode_excerpt_length)) : wpautop(hcode_get_the_excerpt_theme(55));
        $hcode_show_author =  esc_html__('Posted by ', 'H-Code').'<a href='.get_author_posts_url( get_the_author_meta( 'ID' ) ).'>'.get_the_author().'</a> ';
        $show_date = get_the_date( 'd F Y', get_the_ID()) ;
        $post_type = get_post_type( get_the_ID() );
        echo '<div class="blog-listing blog-listing-classic blog-listing-full">';
            echo '<div class="col-md-2 col-sm-2 col-xs-5 clearfix text-center no-padding-right xs-padding-right">';
                echo '<div class="avtar text-left"><a href="'.get_permalink().'">';
                        echo get_avatar( get_the_author_meta( 'ID' ), 300 );
                        echo '</a>';
                echo '</div>';

                echo '<div class="blog-date-right light-gray-text2 no-padding-bottom">'.$show_date.'</div>';
                echo '<div class="blog-date-right light-gray-text2">'.$hcode_show_author.'</div>';
                echo '<div class="separator-line bg-black no-margin-lr no-margin xs-margin-ten-bottom"></div>';
            echo '</div>';
            echo '<div class="col-md-10 col-sm-10 col-xs-12 no-padding-left xs-padding-left">';
                $blog_quote = hcode_post_meta('hcode_quote');
                $blog_image = hcode_post_meta('hcode_image');
                $blog_gallery = hcode_post_meta('hcode_gallery');
                $blog_video = hcode_post_meta('hcode_video_type');
                if(!empty($blog_image)){
                        get_template_part('loop/loop','image');  
                }
                elseif(!empty($blog_gallery)){
                        get_template_part('loop/loop','gallery');
                }
                elseif(!empty($blog_video)){
                        get_template_part('loop/loop','video');
                }
                elseif(!empty($blog_quote)){
                        get_template_part('loop/loop','quote'); 
                }else{
                    /* Image Alt, Title, Caption */
                    $img_alt = hcode_option_image_alt(get_post_thumbnail_id());
                    $img_title = hcode_option_image_title(get_post_thumbnail_id());
                    $image_alt = ( isset($img_alt['alt']) ) ? $img_alt['alt'] : '' ; 
                    $image_title = ( isset($img_title['title']) ) ? $img_title['title'] : '';

                    $img_attr = array(
                        'title' => $image_title,
                        'alt' => $image_alt,
                    );
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
                    $url = $thumb['0'];
                    echo '<div class="blog-image"><a href="'.get_permalink().'">';
                    if ( has_post_thumbnail() ) {
                            echo get_the_post_thumbnail( get_the_ID(), 'full',$img_attr );
                    }
                    else {
                            echo '<img src="' . HCODE_THEME_ASSETS_URI . '/images/no-image.jpg" width="900" height="600" alt=""/>';
                    }
                    echo '</a></div>';
                }
                echo '<div class="blog-details">';
                        echo '<div class="blog-title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>';
                        if($post_type == 'post'):
                            echo '<div>'.get_simple_likes_button( get_the_ID() );
                                    comments_popup_link( __( '<i class="fa fa-comment-o"></i>Leave a comment', 'H-Code' ), __( '<i class="fa fa-comment-o"></i>1 Comment', 'H-Code' ), __( '<i class="fa fa-comment-o"></i>% Comment(s)', 'H-Code' ), 'comment' );
                            echo '</div>';
                        endif;
                        echo '<div class="separator-line bg-black no-margin-lr margin-four"></div>';
                        if($show_excerpt):
                            echo '<div class="blog-short-description">'.$show_excerpt.'</div>';
                        endif;
                        echo '<a class="highlight-button btn btn-small xs-no-margin-bottom" href="'.get_permalink().'">'.__("Continue Reading", "H-Code").'</a>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    endwhile;
    if($wp_query->max_num_pages > 1):
        echo '<div class="pagination">';
            echo paginate_links( array(
                'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
                'format'       => '',
                'add_args'     => '',
                'current'      => max( 1, get_query_var( 'paged' ) ),
                'total'        => $wp_query->max_num_pages,
                'prev_text'    => '<img alt="Previous" src="'.HCODE_THEME_IMAGES_URI.'/arrow-pre-small.png" width="20" height="13">',
                'next_text'    => '<img alt="Next" src="'.HCODE_THEME_IMAGES_URI.'/arrow-next-small.png" width="20" height="13">',
                'type'         => 'plain',
                'end_size'     => 3,
                'mid_size'     => 3
            ) );
        echo '</div>';
    endif;
else:
    get_template_part('templates/content','none');
endif;
?>