<?php
	require('setupdata.php');
	require('index.php');
?>

<?php if( $_POST['create-signature'] ) :
	$full_name = $_POST['full-name'];
	$position = $_POST['position'];
	$branchname = $_POST['branchname'];
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
				<a href="<?php echo $options['social_urls']['facebook'][0]; ?>" target="_blank" title="Facebook" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['social_urls']['facebook'][1]; ?>" alt="Facebook" width="18px" height="18px" />
				</a>
			<?php endif; ?>
			<?php if( $options['social_urls']['twitter'][0] != '' ) : ?>
				<a href="<?php echo $options['social_urls']['twitter'][0]; ?>" target="_blank" title="Twitter" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['social_urls']['twitter'][1]; ?>" alt="Twitter" width="18px" height="18px" />
				</a>
			<?php endif; ?>
			<?php if( $options['social_urls']['instagram'][0] != '' ) : ?>
				<a href="<?php echo $options['social_urls']['instagram'][0]; ?>" target="_blank" title="Instagram" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['social_urls']['instagram'][1]; ?>" alt="Instagram" width="18px" height="18px" />
				</a>
			<?php endif; ?>
			<?php if( $options['social_urls']['vimeo'][0] != '' ) : ?>
				<a href="<?php echo $options['social_urls']['vimeo'][0]; ?>" target="_blank" title="Vimeo" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['social_urls']['vimeo'][1]; ?>" alt="Vimeo" width="18px" height="18px" />
				</a>
			<?php endif; ?>
			<?php if( $options['social_urls']['linkedin'][0] != '' ) : ?>
				<a href="<?php echo $options['social_urls']['linkedin'][0]; ?>" target="_blank" title="LinkedIn" style="text-align: center; display: inline-block; margin: 0px 8px 0 0;">
					<img src="<?php echo $options['social_urls']['linkedin'][1]; ?>" alt="LinkedIn" width="18px" height="18px" />
				</a>
			<?php endif; ?>
		</td>
	</tr>
</table>
<?php endif; ?>