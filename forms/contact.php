<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  // $receiving_email_address = 'divyanshusingh9314@gmail.com';

  // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  //   include( $php_email_form );
  // } else {
  //   die( 'Unable to load the "PHP Email Form" Library!');
  // }

  // $contact = new PHP_Email_Form;
  // $contact->ajax = true;
  
  // $contact->to = $receiving_email_address;
  // $contact->from_name = $_POST['name'];
  // $contact->from_email = $_POST['email'];
  // $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */


  function sendEmail($name, $email, $message) {
    $to = "divyanshusingh9314@gmail.com"; // Replace with your email address
    // $subject = "Contact Form Submission";

    $headers = "From: $name <$email>";

    // Send email
    return mail($to, $subject, $message, $headers);
  }

  function validateForm($name, $email, $message) {
      // Basic form validation
      if (empty($name) || empty($email) || empty($message)) {
          return "All fields are required.";
      }

      // Additional validation can be added here

      return "";
  }

  $message_sent = false;
  $error_message = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $subject = $_POST['subject'];
      $message = $_POST['message'];

      $error_message = validateForm($name, $email, $message);

      if (empty($error_message)) {
          $message_sent = sendEmail($name, $email, $message);

          if (!$message_sent) {
              $error_message = "Error sending email.";
          }
      }
  }


  // $contact->add_message( $_POST['name'], 'From');
  // $contact->add_message( $_POST['email'], 'Email');
  // $contact->add_message( $_POST['message'], 'Message', 10);

  // echo $contact->send();
?>
