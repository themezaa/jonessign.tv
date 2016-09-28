<?php
	// Modify the values in $options to fit your company/organization.
	$options = array(
	    'department' =>'',
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
