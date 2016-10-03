<?php
/**
 the portfolio post type variables for working with a domPDF enabled sheet for a post type , used with require_once(while developing) to keep the single-portfolio-pdf.php file well organizzed
 */


// variables pulled from my advanced custom fields groups of "testimonial" and "completed project"

// from "testimonial" custom field group
// set up the fields from the testimonial field group as variables
$testimonial = get_field('testimonial_text');  //what did they say?
$source      = get_field('testimonial_name');  // who said it?
$position    = get_field('testimonial_position'); //what is their job?
$company     = get_field('testimonial_company'); // where do they work?

function portfolio_pdf_testimonial($testimonial,$source,$position,$company) {
    //set up the blockquote using only css from inside the style tags on thie page
    $quote_output = '<blockquote id="pdf-testimonial"><i class="fa fa-quote-left" aria-hidden="true"></i><p>';
    $quote_output .= $testimonial;
    $quote_output .= '<i class="fa fa-quote-right" aria-hidden="true"></i> </p>';
    $quote_output .= '<footer>';
    $quote_output .= $source;
    $quote_output .= '';
    $quote_output .= $position;
    $quote_output .= '';
    $quote_output .= $company;
    $quote_output .= '</footer></blockquote><!-- end div#pdf-testimonial -->';

    return $quote_output;

}

$jones_client_name     = get_sub_field('proj_client_name'); // client name
$jones_client_logo     = get_sub_field('proj_client_image'); // client logo image
$header_image   = get_field( 'proj_header_image' );  // can be used as the header
$thumb          = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'full' );
$url            = $thumb[0];
$overlay        = 'background: linear-gradient(rgba(2,0,5, 0.75), rgba(2,115,185, 0.85) )'; // this is a more jones blue overlay
$header         = !empty( $header_image ) ? $header_image: $url; // prefer the header image added in ACF, but use the featured image if there is none
$default_narrative = 'This area reserved for a 4-6 sentence project narrative, to give the visitor an idea of what this project was about. What needs did Jones Sign Company help them out with?  What challenges needed to be overcome?  It should include some background details about the project & also list the types of signage that were a part of this particular project.';
$trump = "<p>I'm speaking with myself, number one, because I have a very good brain and I've said a lot of things. Trump Ipsum is calling for a total and complete shutdown of Muslim text entering your website.</p>
<p>Lorem Ipsum is the single greatest threat. We are not - we are not keeping up with other websites. Some people have an ability to write placeholder text... It's an art you're basically born with. You either have it or you don't.</p>
<p>I think the only difference between me and the other placeholder text is that I’m more honest and my words are more beautiful. I don't think anybody knows it was Russia that wrote those Lorem Ipsum, but I don't know, maybe it was. It could be Russia, but it could also be China. It could also be lots of other people. It also could be some wordsmith sitting on their bed that weights 400 pounds. Ok? Lorem Ispum is a choke artist. It chokes! You have so many different things placeholder text has to be able to do, and I don't believe Lorem Ipsum has the stamina.</p>";
$project_narrative = !empty(get_field('proj_write_up')) ? get_field('proj_write_up') : $trump;

