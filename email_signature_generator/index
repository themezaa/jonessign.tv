<?php
	// Here we are setting up the initial values of the variables
	// since this is a single page form, having the variables setup prevents errors
	$options = array(
		'company_name' => 'Jones Sign Company', // place company name
		'company_url'  => 'http://www.jonessign.com',
		'email_domain' => 'jonessign.com', // Do not prepend with http://
		'logo_url'     => 'http://www.jonessign.tv/email_signature_generator/images/jonessign.png',  // Must be an absolute path
		'colors'       => array(
							'primary'   => '#0273b9', // Name, emal address, phone and address
							'secondary' => '#000', // Title/position
							'tertiary'  => '#b4b4b4'  // Horizontal border
						),
		'social_urls' => array(
							'facebook' => array(
												'https://www.facebook.com/JonesSignCompany', // Hide by setting this to an empty string
												'http://www.jonessign.tv/email_signature_generator/images/facebook.png'  // Must be an absolute path
											),
							'twitter'  => array(
												'https://twitter.com/jonessign', // Hide by setting this to an empty string
												'http://www.jonessign.tv/email_signature_generator/images/twitter.png'  // Must be an absolute path
											),
							'youtube'  => array(
												'https://youtube.com/channel/UCk5XeqXFLoG-p7w2hfS5KKg', // Hide by setting this to an empty string
												'http://www.jonessign.tv/email_signature_generator/images/youtube.png'  // Must be an absolute path
											),
							'linkedin' => array(
												'https://www.linkedin.com/company/jones-sign-co--inc-', // Hide by setting this to an empty string
												'http://www.jonessign.tv/email_signature_generator/images/linkedin.png'  // Must be an absolute path
											)
						),
		'address_list' => array(
							array(
							      'abbreviation' => 'nat',
							      'specificname' => 'Jones Home Company',
							      'address'      => '1711 Scheuring Road, Green Bay, WI 54115',
							      'branchphone'  => '1-800-536-SIGN'),
							array(
							      'abbreviation' => 'grb',
							      'specificname' => 'Jones Green Bay',
							      'address'      => '1711 Scheuring Road, Green Bay, WI 54115',
							      'branchphone'  => '1-800-536-SIGN'),
							array(
							      'abbreviation' => 'phl',
							      'specificname' => 'Jones East',
							      'address'      => '400 Mack Road, Croydon, PA 19021',
							      'branchphone'  => '215-788-3898'),
							array(
							      'abbreviation' => 'san',
							      'specificname' => 'Jones San Diego',
							      'address'      => '9025 Balboa Avenue, San Diego, CA 92123',
							      'branchphone'  => '858-569-1400'),
							array(
							      'abbreviation' => 'las',
							      'specificname' => 'Jones Las Vegas',
							      'address'      => '5860 La Costa Canyon Ct., Las Vegas, NV 89139',
							      'branchphone'  => '702-506-0933'),
							array(
							      'abbreviation' => 'orf',
							      'specificname' => 'Jones Virginia',
							      'address'      => '11046 Leadbetter Road, Ashland, VA 23005',
							      'branchphone'  => '804-798-5533'),
							array(
							      'abbreviation' => 'rno',
							      'specificname' => 'Jones Reno',
							      'address'      => '2101 Brierly Lane - Suite 101, Sparks, NV 89434',
							      'branchphone'  => '775-351-1700'),
							array(
							      'abbreviation' => 'mxz',
							      'specificname' => 'Jones MX - Juárez',
							      'address'      => '4101 Colonio Waterfill, Chihuahua, MX CP 32670',
							      'branchphone'  => '656-682-0228'),
							array(
							      'abbreviation' => 'mxt',
							      'specificname' => 'Jones MX - Tijuana',
							      'address'      => 'Alejandro Humbolt #17614 - A Garita de Otay, Tijuana, B.C., 22430',
							      'branchphone'  => '664-623-8082'),
							array(
							      'abbreviation' => 'lax',
							      'specificname' => 'Jones Los Angeles',
							      'address'      => '4230 East Airport Drive, Ontario, CA 91761',
							      'branchphone'  => '1-800-536-7446'),
							array(
							      'abbreviation' => 'tmp',
							      'specificname' => 'Jones Tampa',
							      'address'      => 'UNKNOWN ADDRESS, Tampa, FL ZIP',
							      'branchphone'  => '1-800-536-7446'),
							array(
							      'abbreviation' => 'sat',
							      'specificname' => 'Jones San Antonio',
							      'address'      => 'UNKNOWN ADDRESS, San Antonio, TX ZIP',
							      'branchphone'  => '1-800-536-7446'),
							array(
							      'abbreviation' => 'ord',
							      'specificname' => 'Jones Chicago',
							      'address'      => 'UNKNOWN ADDRESS, Chicago, IL ZIP',
							      'branchphone'  => '1-800-536-7446'),
						),
		'hide_address_field' => false,
		// sample data will appear on the sample card that updates on the regular
		'sample_data' => array(
			'full_name' => 'Nick Mortensen',
			'position'  => 'General Badass',
			'email_address'  => 'nmortensen@jonessign.com',
			'phone_number'  => '(920) 940-3419',
			'department' => ''
		)
	);
?>
<?php if( $_POST['create-signature'] ) :

	$full_name = $_POST['full-name'];
	$position = $_POST['position'];
	$department = $_POST['department'];
	$location = $_POST['location'];
	$address = $_POST['mailing-address'];
	$email_address = $_POST['email'];
	$primary_number_prefix = $_POST['primary-number-type'];
	$secondary_number_prefix = $_POST['secondary-number-type'];
	$primary_number = $_POST['primary-number'];
	$secondary_number = $_POST['secondary-number'];
?>

<!-- EMAIL SIGNATURE OUTPUT -->
<table style="width:550px; font-size:11px; font-family:Arial; margin:0; padding:0;">
	<tr>
		<td style="border-bottom: 1px solid <?php echo $options['colors']['tertiary']; ?>; padding-bottom: 14px;">
			<h2 id="full-name" style="font:bold 18px/22px Arial, sans-serif; letter-spacing:-1px; text-transform:uppercase; color:<?php echo $options['colors']['primary']; ?>; margin:0; padding:0;"><?php echo $full_name; ?></h2>
			<h3 id="position" style="font:bold 14px/16px Arial, sans-serif; letter-spacing:-1px; text-transform:uppercase; color:<?php echo $options['colors']['secondary']; ?>; margin:0; padding:0;"><?php echo $position; ?></h3>
			<h2 id="department" style="font:bold 18px/22px Arial, sans-serif; letter-spacing:-1px; text-transform:uppercase; color:<?php echo $options['colors']['primary']; ?>; margin:0; padding:0;"><?php echo $department; ?></h2>
		</td>
	</tr>
	<tr>
		<td>
			<a style="width:125px;; margin:16px 0 8px; display:block;" href="<?php echo $options['company_url']; ?>" target="_blank" title="<?php echo $options['company_name']; ?>">
				<img src="<?php echo $options['logo_url']; ?>" alt="<?php echo $options['company_name']; ?>" width="125px;" />
			</a>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<address id="email-address" style="font: normal 10px/15px Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>;">
				<?php
					if($email_address != ''){
						$print = 'Email: <a href="mailto:'.$email_address.'@'. $options['email_domain'] .'" target="_blank" style="color:'. $options['colors']['primary'] .'; text-decoration:none;">'.$email_address.'@'. $options['email_domain'] .'</a>';
						echo $print;
					}
				?>
			</address>
			<address style="font: normal 10px/15px Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>;">
				<?php
					if($secondary_number != ''){
						$print = $primary_number_prefix.': '.$primary_number.' | '.$secondary_number_prefix.': '.$secondary_number;
					}
					else{
						$print = $primary_number_prefix.': '.$primary_number;
					}
					echo $print;
				?>
			</address>
			<?php if( !$options['hide_address_field'] ) : ?>
				<address style="font: normal 10px/15px Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>;">
					<?php
						if($address != ''){
							echo $address;
						}
					?>
				</address>
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td style="padding-top: 10px;">
			<?php if( $options['social_urls']['facebook'][0] != '' ) : ?>
				<a href="<?php echo $options['social_urls']['facebook'][0]; ?>" target="_blank" title="Jones Sign Company on Facebook" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['social_urls']['facebook'][1]; ?>" alt="Jones Sign Company on Facebook" width="18px" height="18px" />
				</a>
			<?php endif; ?>
			<?php if( $options['social_urls']['twitter'][0] != '' ) : ?>
				<a href="<?php echo $options['social_urls']['twitter'][0]; ?>" target="_blank" title="Jones Sign Company on Twitter" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['social_urls']['twitter'][1]; ?>" alt="Jones Sign Company on Twitter" width="18px" height="18px" />
				</a>
			<?php endif; ?>
			<?php if( $options['social_urls']['youtube'][0] != '' ) : ?>
				<a href="<?php echo $options['social_urls']['youtube'][0]; ?>" target="_blank" title="Jones Sign Company on YouTube" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['social_urls']['youtube'][1]; ?>" alt="Jones Sign Company on YouTube" width="18px" height="18px" />
				</a>
			<?php endif; ?>
			<?php if( $options['social_urls']['linkedin'][0] != '' ) : ?>
				<a href="<?php echo $options['social_urls']['linkedin'][0]; ?>" target="_blank" title="Jones Sign Company on LinkedIn" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['social_urls']['linkedin'][1]; ?>" alt="Jones Sign Company on LinkedIn" width="18px" height="18px" />
				</a>
			<?php endif; ?>
		</td>
	</tr>
</table>
<!--END  EMAIL SIGNATURE OUTPUT -->

<!-- EMAIL SIGNATURE FORM BEGIN-->

<?php else : ?>

<!DOCTYPE HTML>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Jones Sign Company Email Signature Generator</title>

	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<!-- form page header -->
	<div class="page-header">
		<h1>Jones Sign Co. Email Signature Generator</h1>
	</div>
	<!-- end form page header -->

	<!-- form -->
	<form id="email-signature-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" target="_blank" autocomplete="off">
		<!-- form instructions-->
		<p>Please use the form below to create your email signature. Follow the instructions at the bottom of this page to add the signature into your email client. The <strong><span class="asterisk">*</span></strong> symbol denotes a required field.</p><br>
		<!-- end of form instructions -->

		<!-- begin the form -->
		<table class="contact-details" width="100%" cellspacing="8" style="margin: 0 auto;">
			<!-- full name -->
			<tr>
				<td width="200px"><label for="full-name">Full Name <span class="asterisk">*</span></label></td>
				<td colspan="2"><input type="text" name="full-name"  autocomplete="name" autofocus="on" required /></td>
			</tr>
			<!-- end full name -->

			<!-- position -->
			<tr>
				<td><label for="position">Title/Position <span class="asterisk">*</span></label></td>
				<td colspan="2"><input type="text" name="position" autocomplete="organization-title" required /></td>
			</tr>
			<!-- end position -->

			<!-- department is a field added by nick mortensen -->
			<tr>
				<td><label for="department">Department</label></td>
				<td colspan="2"><input type="text" name="department" /></td>
			</tr>
			<!-- end department -->

			<!-- JONES LOCATION SELECT -->
			<?php if( !$options['hide_address_field'] ) : ?>
			<tr>
					<td><label for="location">Jones Location <span class="asterisk">*</span></label></td>
					<td colspan="2">
						<select name="location" required>
							<option selected disabled>-- Select --</option>
							<?php foreach( $options['address_list'] as $address ) : ?>
								<option value="<?php echo $address['abbreviation']; ?>">
									<?php echo $address['specificname']; ?>
								</option>
							<?php endforeach; ?>
						</select>
						<input name="mailing-address" type="hidden" value="" />
						<input name="branchphone" type="hidden" value="" />
					</td>
			</tr>
			<?php endif; ?>
			<!--END JONES LOCATION SELECT -->


			<!-- begin email address form field -->
			<tr>
				<td><label for="email">Email Address <span class="asterisk">*</span></label></td>
				<td colspan="2">
					<input class="email-user" type="text" name="email" maxlength="50" autocomplete="username" required />
					<span class="email-domain">@<?php echo $options['email_domain']; ?></span>
				</td>
			</tr>
			<!-- end email address field -->

			<!-- primary phone -->
			<tr>
				<td><label for="primary-number">Primary Phone <span class="asterisk">*</span></label></td>
				<td width="95px">
					<select name="primary-number-type" style="background-position: 92% center;">
						<option value="Phone" selected>Phone</option>
						<option value="Office">Office</option>
						<option value="Mobile">Mobile</option>
						<option value="Fax">Fax</option>
					</select>
				</td>
				<td><input type="text" name="primary-number" type="tel" autocomplete="tel" /></td>
			</tr>
			<!-- end of primary phone -->

			<!-- secondary phone -->
			<tr>
				<td><label for="secondary-number">Secondary Phone</label></td>
				<td width="95px">
					<select name="secondary-number-type" style="background-position: 92% center;">
						<option value="Phone">Phone</option>
						<option value="Office">Office</option>
						<option value="Mobile" selected>Mobile</option>
						<option value="Fax">Fax</option>
					</select>
				</td>
				<td><input type="text" name="secondary-number" maxlength="30" /></td>
			</tr>
			<!-- end of secondary phone -->

		</table>
		<!-- end of email signature entry form-->








		<!-- EMAIL SIGNATURE PREVIEW -->
		<div class="signature-preview">
			<table style="width:100%;">
				<tr>
					<td style="border-bottom: 1px solid <?php echo $options['colors']['tertiary']; ?>; padding-bottom: 14px;">
						<h2 id="full-name" style="font:bold 18px/22px Arial, sans-serif; letter-spacing:-1px; text-transform:uppercase; color:<?php echo $options['colors']['primary']; ?>; margin:0; padding:0;"><?php echo $options['sample_data']['full_name']; ?></h2>
						<h3 id="position" style="font:bold 14px/16px Arial, sans-serif; letter-spacing:-1px; text-transform:uppercase; color:<?php echo $options['colors']['secondary']; ?>; margin:0; padding:0;"><?php echo $options['sample_data']['position']; ?></h3>
						<h2 id="department" style="font:bold 18px/22px Arial, sans-serif; letter-spacing:-1px; text-transform:uppercase; color:<?php echo $options['colors']['primary']; ?>; margin:0; padding:0;"><?php echo $options['sample_data']['department']; ?></h2>
					</td>
				</tr>
				<tr>
					<td>
						<a style="width:125px; margin:16px 0 8px; display:block;"
							href="<?php echo $options['company_url']; ?>"
							target="_blank" title="<?php echo $options['company_name']; ?>">
							<img src="<?php echo $options['logo_url']; ?>" alt="<?php echo $options['company_name']; ?>" width="125px" />
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<address id="email-address" style="font: normal 10px/15px Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>;">
							<?php echo 'Email: ' . $options['sample_data']['email_address']; ?>
						</address>
						<address id="phone-number" style="font: normal 10px/15px Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>;">
							<?php echo 'Phone: ' . $options['sample_data']['phone_number']; ?>
						</address>
						<!-- preview -->
						<?php if( !$options['hide_address_field'] ) : ?>
							<address id="address" style="font: normal 10px/15px Arial, sans-serif; color:<?php echo $options['colors']['primary']; ?>">
								<?php echo $options['address_list'][0]['abbreviation'] . '<br />'. $options['address_list'][0]['specificname']; ?>
							</address>
						<?php endif; ?>
						<!-- end preview-->
					</td>
				</tr>
				<tr>
					<td style="padding-top: 10px;">
						<?php if( $options['social_urls']['facebook'][0] != '' ) : ?>
							<a href="<?php echo $options['social_urls']['facebook'][0]; ?>" target="_blank" title="Jones Sign Company on Facebook" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
								<img src="<?php echo $options['social_urls']['facebook'][1]; ?>" alt="Jones Sign Company on Facebook" width="18px" height="18px" />
							</a>
						<?php endif; ?>
						<?php if( $options['social_urls']['twitter'][0] != '' ) : ?>
							<a href="<?php echo $options['social_urls']['twitter'][0]; ?>" target="_blank" title="Jones Sign Company on Twitter" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
								<img src="<?php echo $options['social_urls']['twitter'][1]; ?>" alt="Jones Sign Company on Twitter" width="18px" height="18px" />
							</a>
						<?php endif; ?>

						<?php if( $options['social_urls']['youtube'][0] != '' ) : ?>
							<a href="<?php echo $options['social_urls']['youtube'][0]; ?>" target="_blank" title="Jones Sign Company on YouTube" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
								<img src="<?php echo $options['social_urls']['youtube'][1]; ?>" alt="Jones Sign Company on YouTube" width="18px" height="18px" />
							</a>
						<?php endif; ?>
						<?php if( $options['social_urls']['linkedin'][0] != '' ) : ?>
							<a href="<?php echo $options['social_urls']['linkedin'][0]; ?>" target="_blank" title="Jones Sign Company on LinkedIn" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
								<img src="<?php echo $options['social_urls']['linkedin'][1]; ?>" alt="Jones Sign Company on LinkedIn" width="18px" height="18px" />
							</a>
						<?php endif; ?>
					</td>
				</tr>
			</table>
		</div>
		<!-- END OF  EMAIL SIGNATURE PREVIEW -->




		<!-- begin submit and instructions -->
		<table width="100%" cellspacing="8" style="padding-top:20px;">
			<tr>
				<td width="65%">
					<p>In the new window, press <strong>CTL + A</strong> (Windows) or <strong>CMD + A</strong> (Mac) to select the content. <strong>Copy/paste</strong> this content into your email client using one of the links listed below.<p>
				</td>
				<td width="35%">
					<input type="submit" name="create-signature" value="Create Signature" />
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br><br>
					<ul class="client-links">
						<li><a href="http://mydesignpad.com/how-to-install-html-email-signature-for-google-gmail/" target="_blank">Gmail</a></li>
						<li><a href="http://mydesignpad.com/how-to-install-html-email-signature-for-microsoft-outlook-2010-windows/" target="_blank">Outlook</a></li>
						<li><a href="http://mydesignpad.com/create-a-html-email-signature-for-mac-os-x-mountain-lion-10-8/" target="_blank">Mac Mail</a></li>
						<li><a href="http://mydesignpad.com/how-to-create-complex-html-email-signatures-for-mozilla-thunderbird/" target="_blank">Thunderbird</a></li>
					</ul>
				</td>
			</tr>
		</table>
		<!-- end submit and instructions -->
	</form>
	<!-- end of form -->



	<?php foreach( $options['address_list'] as $address ) : ?>

<pre>
<?php echo $address['abbreviation']; ?>
</pre>
<?php endforeach; ?>
</body>

<!-- JavaScript Files Go Here -->
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>
	$(function(){

		//FORM SUBMISSION
		$('#email-signature-form').submit(function(){
			var full_name = $('#email-signature-form input[name="full-name"]').val();
			var position  = $('#email-signature-form input[name="position"]').val();

			<?php if( !$options['hide_address_field'] ) : ?>
			var location = $('#email-signature-form select[name="location"]').val();
			<?php endif; ?>

			var email_address           = $('#email-signature-form input[name="email"]').val();
			var primary_number_prefix   = $('#email-signature-form select[name="primary-number-type"]').val();
			var primary_number          = $('#email-signature-form input[name="primary-number"]').val();
			var secondary_number_prefix = $('#email-signature-form select[name="secondary-number-type"]').val();
			var secondary_number        = $('#email-signature-form input[name="secondary-number"]').val();

			if(full_name != '' && position != ''){
				if(location != null){
					if(email_address != ''){
						if(primary_number != ''){
							if(secondary_number == ''){
								return true;
							}
							else{
								if(primary_number_prefix != secondary_number_prefix && primary_number != secondary_number){
									return true;
								}
								else{
									alert('You may not use the same phone number/type twice.');
									return false;
								}
							}
						}
						else{
							alert('Please enter a primary phone number.');
							return false;
						}
					}
					else{
						alert('Please enter an email address.');
						return false;
					}
				}
				else{
					alert('Please select a location.');
					return false;
				}
			}
			else{
				alert('Please fill in your name and job title/position.');
				return false;
			}
		});

		// SIGNATURE PREVIEW LISTENER
		$('input[name="full-name"], input[name="position"], input[name="address"], input[name="email"], input[name="primary-number"], input[name="secondary-number"]').keyup(function(){
			input_field_callback();
		});

		$('select[name="location"], select[name="primary-number-type"], select[name="secondary-number-type"]').change(function(){
			input_field_callback();
		});

		function input_field_callback(){
			var full_name = $('#email-signature-form input[name="full-name"]').val();
			var position  = $('#email-signature-form input[name="position"]').val();
			<?php if( !$options['hide_address_field'] ) : ?>
				var location = $('#email-signature-form select[name="location"]').val();
			<?php endif; ?>

			var email_address           = $('#email-signature-form input[name="email"]').val();
			var primary_number_prefix   = $('#email-signature-form select[name="primary-number-type"]').val();
			var primary_number          = $('#email-signature-form input[name="primary-number"]').val();
			var secondary_number_prefix = $('#email-signature-form select[name="secondary-number-type"]').val();
			var secondary_number        = $('#email-signature-form input[name="secondary-number"]').val();
			var email_domain            = '<?php echo $options['email_domain']; ?>';

			if(full_name != ''){
				$('#full-name').text(full_name);
			}
			else{
				$('#full-name').text('<?php echo $options['sample_data']['full_name']; ?>');
			}

			if(position != ''){
				$('#position').text(position);
			}
			else{
				$('#position').text('<?php echo $options['sample_data']['position']; ?>');
			}

			<?php if( !$options['hide_address_field'] ) : ?>
				<?php foreach( $options['address_list'] as $address ) : ?>

					if(location == '<?php echo $address['abbreviation']; ?>'){
						mailing_address = '<?php echo $address['address']; ?>';


						$('#address').text(mailing_address);
						$('#email-signature-form input[name="mailing-address"]').val(mailing_address);


					}

				<?php endforeach; ?>
			<?php endif; ?>
//branch phone
		<?php if( !$options['hide_address_field'] ) : ?>
				<?php foreach( $options['address_list'] as $address ) : ?>

					if(location == '<?php echo $address['abbreviation']; ?>'){
						branchphone = '<?php echo $address['branchphone']; ?>';
						$('#branchphone').text(branchphone);
						$('#email-signature-form input[name="branchphone"]').val(branchphone);
					}

				<?php endforeach; ?>
			<?php endif; ?>
//end branch phone

			if(email_address != ''){
				$('#email-address').html('Email: <a href="mailto:' + email_address + '@'+ email_domain +'" target="_blank">' + email_address + '@'+ email_domain +'</a>');
			}
			else{
				$('#email-address').html('<?php echo "Email: " . $options["sample_data"]["email_address"]; ?>');
			}

			if(primary_number != ''){
				if(secondary_number != ''){
					$('#phone-number').html(primary_number_prefix + ': ' + primary_number + ' | ' + secondary_number_prefix + ': ' + secondary_number);
				}
				else{
					$('#phone-number').text(primary_number_prefix + ': ' + primary_number);
				}
			}
			else{
				$('#phone-number').html('<?php echo "Phone: " . $options["sample_data"]["phone_number"]; ?>');
			}
		}
	});
</script>
<!-- end of javascript files -->
</html>
<?php endif; ?>