<?php
// This script sends a contact form using ajax and phpmailer
// If javascript is disabled it falls back to a pure php
// It requires jquery to perform the ajax call

// Start session
session_start();
require_once 'helpers/security.php';

// Check if $_SESSION['errors'] is set
// Set $errors to $_SESSION['errors']
// Set $errors to an empty array, if $_SESSION['errors'] is not set
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];

// Same for fields
$fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];

// Check if $_SESSION['sucess'] is set
// Set $success to $_SESSION['success']
// Set $success to false if $_SESSION['success'] is not set
$success = isset($_SESSION['success']) ? $_SESSION['success'] : false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ajax Contact Form</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<section class="section" id="contact">
  <div class="container">
    <div class="row p-5">
      <div class="col-lg-12" >

        <div class="col-lg-6 ">
          <h1>Contact.</h1>
          <p>Send a message.</p>
        </div>

        <div class="col-lg-6 mx-auto">
          <!-- Error pannel -->
          <!-- Not show pannel if there is no errors -->
          <?php if(!empty($_SESSION['errors'])): ?>
            <div class="alert alert-danger">
              <ul style="padding-inline-start: 0;"><li style="list-style: none"><?php echo ucfirst(implode('</li><li style="list-style: none;">', $errors))?></li>
              </ul>
            </div>
          <?php endif ?>
          
          <?php if (isset($_SESSION['success']) && $_SESSION['success'] == true): ?>
            <div class="alert alert-success">
              <p>Thank you very much for your message. We will get back to you as soon as possible.</p>
            </div>

          <?php else: ?>
          
          <!-- Inform users to enable js -->
          <noscript>
            <div class="no-script-warning alert alert-info">You disabled Javascript. Please enable Javascript.</div>
          </noscript>
            
            <!-- Inform users on submit success or errors when using ajax-->
            <div id="form__info" class="form__info"></div>

            <form action="contact.php" method="post" id="contact-form" class="section-text">

            <!-- <form id="contact-form" class="section-text"> -->
              <div>
                <label for="name">Name*</label>
                <input  value="Test Name" type="text" name="name" id="name" placeholder="Please insert your name" autocomplete="off" <?php echo isset($fields['name']) ? ' value="' . e($fields['name']) . '"' : '' ?> class="form-group form-control element-shadow">
                <p id="visible-name"></p>
              </div>
              <div>
                <label for="email">EMail*</label>
                <input value="test@mail.com" required type="email" name="email" id="email" placeholder="Please insert your email address" autocomplete="off" <?php echo isset($fields['email']) ? ' value="' . e($fields['email']) . '"' : '' ?> class="form-group form-control element-shadow name">
                <p id="visible-email"></p>
              </div>
              <div>
                <label for="message">Message*</label>
                <textarea  type="text" name="message" id="message"style="resize:none" cols="80" rows="10" placeholder="Your message" class="message-box form-group form-control element-shadow"><?php echo isset($fields['message']) ? e($fields['message']) : '' ?>Test Message.</textarea>
                <p id="visible-comment"></p>
              </div>
              <button id="submit" type="submit" class="btn btn-outline-secondary" style="font-size: 1.6rem; margin-top: 1rem">Send</button>
            </form>

            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
</section>
</body>

<!-- Add jquery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<!-- Add custom script to handle ajax form submit -->
<script src="js/scripts.js"></script>
</html>

<!-- Close session -->
<?php
  session_destroy();
?>
