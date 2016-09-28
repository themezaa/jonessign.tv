<?php
/**
 * displaying job position content with full width slider
 *
 * @package H-Code-Child
 */
?>
<?php
$featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
if($featured_image):
	$featured_image = $featured_image;
else:
	$featured_image = HCODE_THEME_ASSETS_URI . '/images/no-image.png';
endif;
 ?>
<!-- featured image appears at the top and is the background image of a div that has a height of half the window -->
<section class="opening-single flex row-nw justify-end align-content-start" style="background-image:url(<?php echo $featured_image; ?>); background-size:cover; background-position:center right;">
</section><!-- end section.opening-single.flex.row-nw.justify-end.align-content-start -->
<!-- import theme options and set variables-->
<?php
$hcode_options       = get_option( 'hcode_theme_setting' );
//$enable_navigation = $hcode_options['enable_navigation'];
$post_author         = get_post_field( 'post_author', get_the_ID() );
$author              = get_the_author_meta( 'user_nicename', $post_author);
$day                 = get_the_date('d', get_the_ID());
$month               = get_the_date('F', get_the_ID());
$year                = get_the_date('Y', get_the_ID());

// THE FOLLOWING ARE FROM THE ADVANCED CUSTOM FIELDS ASSIGNED TO THE JOB CONTENT TYPE
$description         = get_field( 'job_description' );
$reports_to          = get_field( 'job_org_structure' );

// JOB OPENING PAGE ON WORKFORCE NOW FROM ADP
$adp_link            = 'https://workforcenow.adp.com/jobs/apply/posting.html?client=JonesSign';
?>
<!-- Second Section Contains Date, job title, and description as well as a linking button to ADP-->
<section id="job-opening" class="wow fadeIn blue-gradient-background">
    <div class="container">

		<div class="row flex row-nowrap justify-space-between align-items-start align-content-start">
            <!-- now begin the content in a flexbox  -->
				<!-- BEGIN POSTED ON DATE COLUMN-->
				<div id="position-posted" class="flex col-nw justify-center align-items-center border-white white-text alt-font hidden-xs padding-four">
			    	<span class="white-text font-weight-100 letter-spacing-2"> <?php esc_html_e('Posted','H-Code') ; ?> </span>
			        <span class="white-text letter-spacing-5"><?php echo $day;?></span>
			        <span class="white-text font-weight-100 letter-spacing-2"><?php echo $month;?></span>
			 	</div><!-- end div#opening-posted-date -->
			 	<!-- END POSTED ON DATE COLUMN-->


				<!-- BEGIN SECOND ROW in the flexbox, contains COLUMN with Opening headline & writeup -->
                <div id="position-title-writeup" class="flex col-nw justify-space-between align-items-stretch grow-3">

                    <!-- BEGIN post title  -->
                    <h2 id="position-title" class="alt-font white-text letter-spacing-6 opening-title"><?php echo get_the_title();?></h2>
                    <div class="separator-line bg-light-gray no-margin-top margin-four" style="width:100%;margin-top:2%;"></div>
                    <!-- END post title  -->

                    <!-- BEGIN POSITION WRITEUP-->
                    <?php
                    	if($description) {
        					echo '<div id="position-writeup" class="white-text" style="font-weight:600;font-size:16px;letter-spacing:1px;">';
                    		echo $description;
        					echo '</div><!-- end div#position-writeup-->';
                    	}
                      ?>


                </div><!-- end div#position-title-writeup -->
				<!-- END SECOND ROW IN THE FLEXBOX, which contains a column with the HEADLINE and writeup for position-->





				<div id="position-tags-locations-apply" class="flex col-nw justify-space-between align-items-center">
					<div id="position-tags" class="text-uppercase white-text alt-font letter-spacing-3">

						<?php
			                //$categories = get_the_category();
			                //foreach ($categories as $k => $cat) {
			                //$cat_link = get_category_link($cat->cat_ID);
			                //echo '<span class="staff-tag"><a class="opening-category" href="'.$cat_link.'">'.$cat->name.'</a></span>';
			                //}
			            ?>
			            <?php echo jones_custom_taxonomies_terms_links(); ?>
					</div><!-- end div#position-tags -->

					<!-- The Specific Jones Locations MAP of USA Graphic -->
					<div id="position-locations">
						<?php
						// add airport code and concatenate =1& for all locations selected in this job description
						$locations =  get_field('job_locations');
						// ensure this is an array so as to not throw any php errors if no location is set for a position
						if (is_array($locations)){
							$locations = implode("=1&",$locations);
						}
						// call svg file saved towp-content/uploads/svg/svg_php/jones_sign.php with an added ? and concatenates $locations
						// svg is programmed to $_GET the $locations variable and display state & marker accordingly
						echo '<img src="http://jonessign.tv/wp-content/uploads/svg/svg_php/jones_sign.php?' . $locations . '" height="400px" width="250px" />';
						?>
					</div><!-- end div#position-locations graphic -->

                	<!-- LINK TO ADP WORKFORCE NOW ENTRY FOR JONES SIGN BUTTON-->
                	<div id="position-apply">
                		<a href="<?php echo $adp_link; ?>" target="_blank" class="inner-link highlight-button-white-jones-blue-border btn-medium xs-margin-five-bottom button btn"><i class="fa fa-crosshairs"></i>Apply</a>
                	</div>
					<!-- END LINK TO ADP WORKFORCE NOW ENTRY FOR JONES SIGN BUTTON-->
				</div><!-- end div#position-tags-locations -->
        </div><!-- end div.row-->
        <!-- end content  -->
    </div><!-- end div.container-->
</section><!-- end section.wow.fadein.blue-gradient-background -->

<!-- Begin Job Duties, Details, Qualified Candidate & Ideal Candidate Attributes-->

<section id="open-position-details" class="flex row-nw justify-space-around">
	<div class="container">
		<div class="row">
		    <!-- additional job position information-->
		    <div class="panel-group toggles-style3" id="accordion" role="tablist" aria-multiselectable="true">

				<!-- supposing there are entries in the job_specific_duties Repeater Field, they will be collected within the following Divider-->
				<?php if( have_rows('job_specific_duties') ): ?>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							<h4 class="panel-title"> <?php echo get_the_title();?> Job Duties:
								<span class="pull-right position-toggle">
									<i class="fa fa-minus"></i>
								</span>
							</h4>
						</a>
					</div><!-- end div.panel-heading-->
				   <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<ul class="job-details">
							<?php while ( have_rows('job_specific_duties') ) : the_row();
							$duty = get_sub_field('job_specific_duty');
							?>
								<li class="job-detail"><?php echo $duty; ?></li>
							<? 	endwhile; ?>
							</ul><!-- end ul.duties-->
						</div><!-- end div class="panel-body" -->
					</div><!-- end div#collapseOne-->
				</div><!-- end panel panel-default-->
				<?php endif; ?>
				<!-- end job_specific_duties div-->

				<!-- supposing there are entries in the job_specific_skills Repeater Field, they will be collected within the following Divider-->
				<?php if( have_rows('job_specific_skills') ): ?>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingFour">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
							<h4 class="panel-title">A Qualified Candidate Should Have:
								<span class="pull-right position-toggle">
									<i class="fa fa-plus"></i>
								</span>
							</h4>
						</a>
					</div><!-- end div.panel-heading-->
						<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
		      				<div class="panel-body">
		      					<ul class="job-details">
									<?php while ( have_rows('job_specific_skills') ) : the_row();
									$skill = get_sub_field('job_specific_skill');
		 							?>
			 						<li class="job-detail"><?php echo $skill; ?></li>
									<? 	endwhile; ?>
								</ul><!-- end ul.duties-->
		      				</div><!-- end div class="panel-body" -->
		  				</div><!-- end div#collapseFour-->
					</div><!-- end panel panel-default-->
				<?php endif; ?>
				<!-- end job_specific_skills div-->

		        <!-- supposing there are entries in the job_ideal_attributes Repeater Field, they will be collected within the following Divider-->
				<?php if( have_rows('job_ideal_attributes') ): ?>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingThree">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							<h4 class="panel-title">An Ideal Candidate:
								<span class="pull-right position-toggle">
									<i class="fa fa-plus"></i>
								</span>
							</h4>
						</a>
					</div><!-- end div.panel-heading-->
					<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		      			<div class="panel-body">
		      				<ul class="job-details">
								<?php while ( have_rows('job_ideal_attributes') ) : the_row();
								$attribute = get_sub_field('job_ideal_attribute');
		 						?>
			 					<li class="job-detail"><?php echo $attribute; ?></li>
								<? 	endwhile; ?>
							</ul><!-- end ul.duties-->
		      			</div><!-- end div class="panel-body" -->
		  			</div><!-- end div#collapseThree-->
				</div><!-- end panel panel-default-->
				<?php endif; ?>
				<!-- end job_ideal_attributes div-->

				<!-- supposing there are entries in the job_additional_details Repeater Field, they will be collected within the following Divider-->
				<?php if( have_rows('job_additional_details') ): ?>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingTwo">
						<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							<h4 class="panel-title"> Additional Details
								<span class="pull-right position-toggle">
									<i class="fa fa-plus"></i>
								</span>
							 </h4>
						</a>
					</div><!-- end div.panel-heading-->
				   	<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body">
							<ul class="job-details">
								<?php while ( have_rows('job_additional_details') ) : the_row();
								$detail = get_sub_field('job_additional_detail');
								?>
								<li class="job-detail"><?php echo $detail; ?></li>
								<? 	endwhile; ?>
							</ul><!-- end ul.duties-->
						</div><!-- end div class="panel-body" -->
					</div><!-- end div#collapseTwo-->
				</div><!-- end panel panel-default-->
				<?php endif; ?>
				<!-- end job_additional_details div-->

			</div><!-- end div id="accordion" -->
		</div><!-- end div.row-->
	</div><!-- end div.container-->
</section><!-- end section#open-position-details-->

<!-- END Job Duties, Details, Qualified Candidate & Ideal Candidate Attributes-->





<?php
	$hcode_options = get_option( 'hcode_theme_setting' );
	$staff_image = hcode_post_meta('hcode_image');
	$staff_quote = hcode_post_meta('hcode_quote');
	$staff_gallery = hcode_post_meta('hcode_gallery');
	$staff_video = hcode_post_meta('hcode_video_type');
	$staff_feature_image = hcode_post_meta("hcode_featured_image");
if($staff_image == 1 || !empty($staff_gallery) || !empty($staff_video) || !empty($staff_quote) || $staff_feature_image == 1):
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
            <?php
                $output ='';
                if(!empty($staff_quote)){
                    ob_start();
                        get_template_part('loop/single-post/loop','quote');
                        $output .= ob_get_contents();
                    ob_end_clean();
                }elseif(!empty($staff_gallery)){
                    ob_start();
                        get_template_part('loop/single-post/loop','gallery');
                        $output .= ob_get_contents();
                    ob_end_clean();
                }
                elseif(!empty($staff_video)){
                    ob_start();
                        get_template_part('loop/single-post/loop','video');
                        $output .= ob_get_contents();
                    ob_end_clean();
                }
                elseif(!empty($staff_image)){
                    ob_start();
                        get_template_part('loop/single-post/loop','image');
                        $output .= ob_get_contents();
                    ob_end_clean();
                }

                echo $output;
            ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<div class="staff-details-text">
	<?php the_content();//get_template_part( 'templates/content/content', 'single' ); ?>
    <?php
    $hcode_enable_tags = hcode_option('hcode_enable_meta_tags');

    if($hcode_enable_tags == 1):
    $tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'H-Code' ) );
    if ( $tags_list ) {
    ?>
    <section class="no-padding">
        <div class="container">
            <div class="col-md-12 col-sm-12 col-xs-12 staff-date text-left border-bottom no-padding-lr center-col padding-four">
                <?php hcode_single_post_meta_tag(); ?>
            </div>
        </div>
    </section>
    <?php
    }
    endif;
    ?>
</div>

<?php
$enable_social_icons = hcode_option('hcode_social_icons');
if($enable_social_icons == 1 && class_exists('Hcode_Addons_Post_Type')):
    echo do_shortcode( '[hcode_single_post_share]' );
endif;

?>
<?php
$enable_navigation = hcode_option('hcode_enable_navigation');

if($enable_navigation == 1):
    //hcode_single_post_navigation();
    hcode_single_portfolio_navigation();
endif;
?>
<?php
hcode_single_position_related_posts($post_type = 'position', $number_posts = '3');
