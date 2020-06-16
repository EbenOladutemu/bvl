<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
};
if(isset($_POST['name'])) echo $_POST['name'];
if(isset($_POST['email'])) echo $_POST['email'];
if(isset($_POST['phone'])) echo $_POST['phone'];
if(isset($_POST['subject'])) echo $_POST['subject'];
if(isset($_POST['details'])) echo $_POST['details'];

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = "olakennyfemi@gmail.com"; // Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subjectVar = "BVL Contact Form:  $subject";
$body = "$message\n\n"."Sender details:\n\nName: $name\n\nEmail: $email\n\n";
$header = "From: olakennyfemi@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";

if(!mail($to, $subjectVar, $body, $header))
  http_response_code(500);
?>
