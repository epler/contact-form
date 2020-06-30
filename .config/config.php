<?php

// SMTP Server Settings
$server = [
  'host' => 'xyz.abc.com',
  'username' => 'xyz@abc.com',
  'password' => 'myPassword',
  'encryption' => 'tls',
  'port' => 587,
];

// Recipient info
$recipient = [
  'name' => 'xyz@abc.com',
  'email' => 'xyz@abc.com',
];

// Relocate to index.php or thank you page
$relocate = [
  'location' => 'http://localhost:4567/contact_form_ajax',
];

$error_messages = [
  'not_sent' => 'Sorry, could not send email. Please write to xyz@abc.com instead.',
  'generic' => 'Something went wrong.',
  'required' => 'is required',
];

?>
