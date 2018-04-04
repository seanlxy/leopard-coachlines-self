<?php 
	
	//  Initialize variables
	$form          = '';
	$form_is_valid = false;
	$output        = '';


	//  Create post variables
	$fname                  = sanitize_input('fname');
	$lname                  = sanitize_input('lname');
	$email_address          = sanitize_input('email-address', FILTER_VALIDATE_EMAIL);
	$phone                  = sanitize_input('phone');
	$subject                = sanitize_input('subject');
	$message                = sanitize_input('message');
	$posted_captcha         = sanitize_input('captcha');
	$posted_captcha         = $_POST['g-recaptcha-response'];
	$captcha_response_token = $posted_captcha;

	// validate required fields
	if(sanitize_input('continue') === '1')
	{

		//  Create error variables
		$fname_error           = true;
		$lname_error           = true;
		$subject_error         = true;
		$email_address_error   = true;
		$phone_error           = true;
		$message_error         = true;
		$captcha_error         = true;

		// validate first name
		if(empty($fname))
		{
			
			$fname_error_msg = display_message('Please enter your first name.');
		}
		elseif(!is_alpha($fname))
		{
			$fname_error_msg = display_message('Please enter a valid first name.');
		}
		else
		{
			$fname_error_msg = '';
			$fname_error     = false;
		}

		// validate last name
		if(empty($lname))
		{
			$lname_error_msg = display_message('Please enter your last name.');
		}
		elseif(!is_alpha($lname))
		{
			$lname_error_msg = display_message('Please enter a valid last name.');
		}
		else
		{
			$lname_error_msg = '';
			$lname_error     = false;
		}

		// validates phone
		if(empty($phone))
		{
			$phone_error_msg = display_message('Please enter your phone number.');
		}
		else
		{
			$phone_error_msg  = '';
			$phone_error     = false;
		}

		// validates subject
		if(empty($subject))
		{
			$subject_error_msg = display_message('Please enter your subject.');
		}
		else
		{
			$subject_error_msg  = '';
			$subject_error     = false;
		}


		// validate email address
		if(empty($email_address))
		{
			$email_address_error_msg = display_message('Please enter your email.');
		}
		elseif(!is_email($email_address))
		{
			$email_address_error_msg = display_message('Please enter a valid email.');
		}
		else
		{
			$email_address_error_msg = '';
			$email_address_error     = false;
		}

		// validate captcha
		if($posted_captcha == '')
		{
			$captcha_error_msg = display_message($trans['captcha_required']);
		}
		else
		{
			$captcha_error     = false;
			$captcha_error_msg = '';
		}


		if(!$fname_error && !$lname_error && !$subject_error && !$email_address_error && !$phone_error && !$captcha_error)
		{
			$form_is_valid = true;
		}
	}

?>