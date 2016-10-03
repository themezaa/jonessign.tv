<?php
/**
 * The template for displaying all single portfolio posts
 *
 * @package H-Code-Child 1.6 last update  08_September_2016
 * This was created by Nick Mortensen based on the parent theme
 */
require_once('portfolio-variables.php');
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


?>
<!DOCTYPE html>

<html>
<head>
  <title><?php sanitize_title( $title, '', 'save' ); ?></title>

<style>
/*because these styles are for print, measurements are better off using cm as units, which is a rarity when writing css for the web*/
@page{margin:0cm;}

/*== hide website navigation in the generated pdf ==*/
nav{display:none;}
body#portfolio-pdf{
    width:100%;
    height:100%;
    font-family: "DejaVu Sans";
    color:black;
    font-size: 28px;
    line-height:44px;
}
/*PDF HEADER STYLES*/
/*top of the pdf sheet*/
/*#pdf-header{
    width:100%;
    height: 10.2cm;
}*/
/*== would've rather had this image act as the background-image of the #pdf-header div, but that won't work and this is the next best thing. DOM PDF is a little backwoods in supporting CSS only to 2.1, but we can manage without flexbox, right?  RIGHT!!!???==*/
#pdf-header img{
    width:100%;
    height: 10cm;
}

/*END PDF HEADER STYLES*/

/* MAIN CONTENT AREA */
#pdf-content{
    margin:0.15cm;
    height: 8cm;
    width:100%;

}
#pdf-narrative{

    font-size: 0.4cm;
    line-height: 0.44cm
}
#pdf-misc{}

/* END OF MAIN CONTENT AREA */

/*LOWER CONTENT AREA*/
/*testimonial*/
#pdf-testimonial{margin:0.1cm 1.25cm;}
#pdf-testimonial > * {

    font-size: 0.4cm;
    line-height: 0.44cm
}
/*FOOTER*/
/*covers containing footer div*/
#pdf-footer{
    border-top:4px solid black;
        position:fixed;height:2cm;
    bottom:0px;
    display:block;

}
/*selects all three elements in the div#pdf-footer*/
* [class^="pdf-footer-"] {
    height:100%;
    position:absolute;
    margin:0px auto;
    padding:0.5cm;
    font-size: 0.61cm;
    line-height: 0.68cm;
    font-family:"Oswald";
}
.pdf-footer-left{
    float:left;
    width:5cm;
    display:inline-block;
}
.pdf-footer-right{
    float:right;
    width:4.5cm;
    display:inline-block;
}
span.pdf-footer-middle{
    display:inline-block;
    text-transform:uppercase;
    }
/*==============
    = this technique for overlaying the header based on this:http://stackoverflow.com/questions/1183633/can-you-overlay-a-transparent-div-on-an-image=
=================*/
    div.imageSub { position: relative; }
      div.imageSub img { z-index: 1; }
      div.imageSub div {
        position: absolute;
        left:0px;
        right: 0px;
        bottom: 0;
        padding: 4px;
      }
      div.imageSub div.blackbg {
        z-index: 2;
        color: #000;
        background-color: #0273b9;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
        filter: alpha(opacity=80);
        opacity: 0.8;
      }
      div.imageSub div.label {
        z-index: 3;
        /*font-family:Oswald;*/
          text-align:center;
        }
        div.label span.title{
    padding:0.5cm;
    margin-bottom: 0.75cm;
    font-size: 1.18cm;line-height: 1.5cm;
vertical-align: center;
    color:white;
    border:4px solid white;
}

</style>


</head>

<body id="portfolio-pdf" class="portfolio">

    <div id="pdf-header" class="imageSub" style="width:100%;height:10cm;">
        <img src="<?php echo $header_image; ?>" alt="">
        <div class="blackbg" style="position:absolute;top:0px;left:0px;width:100%;height:10cm;"></div>
        <div class="label" style="position: absolute; top:15%;left:0px; height: 8cm; color: white;">
           <span class="title"> <?php the_title(); ?></span>
        </div>
    </div><!-- end div#pdf-header -->

    <div id="pdf-content">
        <div id="pdf-narrative">
            <?php echo $project_narrative; ?>
        </div><!-- end div#pdf-narrative -->
        <div id="pdf-misc"></div><!-- end div#pdf-misc -->
    </div><!-- end div#pdf-content -->

    <div id="pdf-testimonial">
        <blockquote id="pdf-testimonial">
            <q> <?php echo $testimonial; ?> </q> <!-- end quote -->
            <footer>
                <?php echo $source; ?> <cite><?php echo ' - ' . $position . ' ' . $company; ?></cite>
            </footer> <!-- end footer -->
        </blockquote> <!-- end blockquote -->
    </div><!-- end div#pdf-testimonial -->

    <div id="pdf-footer">
        <div class="pdf-footer-left">1-800-536-SIGN</div>
        <span class="pdf-footer-middle">Jones Sign Company </span>
        <div class="pdf-footer-right">jonessign.com</div>
    </div><!-- end div#pdf-footer -->










</body>
</html>
