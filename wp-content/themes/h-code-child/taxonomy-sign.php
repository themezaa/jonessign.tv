<?php
/**
 * The template for displaying the custom taxonomy 'Sign' tags
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package H-Code-child
 */

get_header(); ?>

<?php
// These variables may come in handy
$layout_settings = $enable_container_fluid = $class_main_section = $section_class = $class = $output = $title = $top_header_class = '';



//custom fields for sign type tag , added in child-theme/functions.php

    $signTypeImage = get_field('sign_type_main_image'); // get image assigned to sign type tag
    $buttonText = get_field('sign_type_button_title');
    // setup additional fields using the image array
    if( !empty($signTypeImage) ):
        $url = $signTypeImage['url'];
        $title = $signTypeImage['title'];
        $alt = $signTypeImage['alt'];
        $caption = $signTypeImage['caption'];
    $useCases = get_field('sign_type_use_cases');
    if( have_rows('sign_type_use_cases') ):
        while ( have_rows('sign_type_use_cases') ) : the_row();
        $useCase = get_sub_field('sign_type_use_case');


 ?>

 <section id="sign-type-header" class="flex row-nw justify-start align-items-center">
<h1 id="sign-type"><?php get_the_title(); ?></h1>
<pre>
    <?php
        $terms = get_terms( array('taxonomy' => 'post_tag', 'hide_empty' => false, ) );
        print_r($terms);
     ?>
</pre>
 </section><!-- end div#sign-type-header -->

<?php get_footer(); ?>