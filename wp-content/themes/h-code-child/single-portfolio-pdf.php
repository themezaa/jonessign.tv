<?php
/**
 * The template for displaying all single portfolio posts
 *
 * @package H-Code-Child 1.6 last update  08_September_2016
 * This was created by Nick Mortensen based on the parent theme
 */

get_header(); ?>
<?php
/**
 * Filename: index-pdf.php
 * Project: WordPress PDF Templates
 * Copyright: (c) 2014-2016 Antti Kuosmanen
 * License: GPLv3
 *
 * Copy this file to your theme directory to start customising the PDF template.
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
$project_narrative = !empty(get_field('proj_write_up')) ? get_field('proj_write_up') : $default_narrative;
?>
<!DOCTYPE html>

<html>
<head>
  <title><?php sanitize_title( $title, '', 'save' ); ?></title>

<style>
    /*===========================
        = hides navigation on a portfolio pdf =
        = must add the #hidden-on-pdf id to the nav in the ../menu.php file in your child theme =
    ============================*/
nav#hidden-on-pdf{display:none;}
body#portfolio-pdf{
    width:100%;
    height:100%;
    font-family: Helvetica;
    color:black;
    background:#0273b9;
    font-size: 28px;
    line-height:44px;
}
div#pdf-container{
    width:100%;
    height:100%;
    background:palevioletred;
    margin:0px;
}
#pdf-header h1{
    font-size:4rem;
    line-height: 4.15rem;
    width:90%;
    background:teal;
  /*  opacity:0.5;*/
    border:8px solid white;outline: 8px solid black;
    margin:0px auto;
    text-align: center;
    padding:1%;
   letter-spacing: .25rem
}
footer{font-size:40px color:black;}
div#pdf-testimonial{
    width:80%;
    margin:15px 10%;
    height:350px;
    position:absolute;
    bottom:250px;
    padding-bottom:3rem;
}
div#pdf-header{
    position:relative;
    display:block;
    width:100%;
    background-size:cover;
    background-repeat:none;
   /* background: lightpink;*/
    background-image:<?php echo $header_image; ?>;
}
#pdf-content{
    width:100%;
    height:50rem;
    margin:0px auto;
    background:palegreen;
}
#pdf-footer{
    position:absolute;
    bottom:0px;
    width:100%;
    height:3rem;
    margin:0px auto;
    background:MediumPurple;
}

blockquote{padding-left: 1rem;}
blockquote > p {
    font-size: 28px;
    line-height:44px;
    border-left: 4px solid darkgray;
    padding-left:2rem;

}
blockquote > footer{
    font-size: 36px;
    line-height:38px;
    padding-left:2rem;
}
img.pdf-header{
    min-width:100%;
}
#narrative {width: 70%; height: 800px;border: 4px solid black;float:left;}
#project-funfacts{width:28%;height: 800px; border: 2px solid yellow;float:right;}
.inline {display:inline-block;}

div.inline.third span{

    padding-top:10px;
    font-size: 2rem;
    line-height: 2.7rem;
}
div#phone{
    width:25%;
    position:absolute;
    left:1px;
}
div#company{
   width:38%;
}
div#website{
    width:20%;
    position:absolute;
    right:0px;
}

</style>


</head>

<body id="portfolio-pdf" class="portfolio">

        <div id="pdf-header" class="portfolio">
            <img class="pdf-header" src="<?php echo $header_image; ?>" />
            <h1><?php the_title(); ?></h1>
        </div><!-- end div#pdf-header -->
        <div id="pdf-content" class="portfolio">
            <div id="narrative"></div>
            <div id="project-funfacts"></div>
        </div><!-- end div#pdf-content -->
        <div id="pdf-testimonial">
            <blockquote class="blockquote-reverse">
                <p>
                <?php echo $testimonial; ?>
                </p>
                <footer class="blockquote-footer">
                <?php echo $source; ?>
                <cite><?php
                echo ' - ' . $position . ' ' . $company;
                ?></cite>
                </footer>
            </blockquote>
        </div><!-- end div#pdf-testimonial -->
        <div id="pdf-footer" class="portfolio">
            <div id="phone" class="inline third"><span>1-800-536-SIGN</span></div>
            <div id="company" class="inline third"><span>Jones Sign Company </span></div>
            <div id="website" class="inline third"><span>jonessign.com</span></div>

        </div><!-- end div#pdf-footer -->










</body>
</html>
