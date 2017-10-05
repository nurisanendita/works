<?php

$email_to = 'nuri.sanendita@gmail.com'; // Replace this with your own email address

if($_POST)
{
  $name = @trim(stripslashes($_POST['contactName']));
  $email = @trim(stripslashes($_POST['contactEmail']));
  $subject = @trim(stripslashes($_POST['contactSubject']));
  $message = @trim(stripslashes($_POST['contactMessage']));

  // Check Name
    if (strlen($name) < 2) {
    	$error['name'] = "Please enter your name.";
    }
    // Check Email
    if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
    	$error['email'] = "Please enter a valid email address.";
    }
    // Check Message
    if (strlen($message) < 15) {
    	$error['message'] = "Please enter your message. It should have at least 15 characters.";
    }

  $email_from = $email;

  $body = '[MESSAGE FROM nurisanendita.com]';

  if (!$error) {

      ini_set("sendmail_from", $email_to); // for windows server
      $mail = @mail($email_to, $body, 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message);

		if ($mail) { echo "OK"; }
        else { echo "Something went wrong. Please try again."; }

	} # end if - no validation error

	else {

		$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;

		echo $response;

	}
}

?>
