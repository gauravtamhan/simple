<?php
/*
Template Name: Contact
*/
?>

<?php

  //response generation function
  $response = "";

  //function to generate response
  function my_contact_form_generate_response($type, $message){

    global $response;

    if ($type == "success") $response = "<div class='row'><div class='col m10 offset-m1'><div class='contact-form-success'><i class='material-icons'>check_circle</i><span>{$message}</span></div></div></div>";
    else $response = "<div class='row'><div class='col m10 offset-m1'><div class='contact-form-error'><i class='material-icons'>warning</i><span>{$message}</span></div></div></div>";

  }

  //response messages
  $missing_content = "Please supply all information.";
  $email_invalid   = "Please provide a valid email address.";
  $message_unsent  = "Message was not sent. Try Again.";
  $message_sent    = "Your message has been sent.";

  //user posted variables
  $fname = $_POST['message_fname'];
  $lname = $_POST['message_lname'];
  $email = $_POST['message_email'];
  $message = $_POST['message_text'];

  //php mailer variables
  $to = get_option('admin_email');
  $subject = get_bloginfo('name') . ": " . $fname . " " . $lname . " has contacted you!";
  $headers = 'From: '. $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";

  if(!empty($fname) && !empty($lname) && !empty($email) && !empty($message))
  {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      my_contact_form_generate_response("error", $email_invalid);
    }
    else // email is valid
    {
      //validate presence of name and message
      if(empty($fname) || empty($lname) || empty($message))
      {
        my_contact_form_generate_response("error", $missing_content);
      }
      else //ready to go!
      {
        $sent = wp_mail($to, $subject, stripslashes(strip_tags($message)), $headers);
        if($sent)
        {
          my_contact_form_generate_response("success", $message_sent); //message sent!
          $_POST = array();

        }
        else
        {
          my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
        }
      }
    }
  }
  elseif($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);

?>



<?php get_header(); ?>

  <!-- Title -->
  <div class="bumper"></div>
  <div class="container bumper">
    <div class="row">
      <div class="col full m10 offset-m1">
        <div style="margin: 0 auto;">
          <h2><?php the_title(); ?></h2>
        </div>
      </div>
    </div>
  </div>

  <!-- Blog body -->
  <div class="container no-floating-footer">

    <!-- page content -->
    <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="row">
        <div class="col m10 offset-m1 links content">
          <?php the_content(); ?>
        </div>
      </div>

      <?php echo $response; ?>
      <div class="row">
      <form class="col s12 m10 offset-m1" action="<?php the_permalink(); ?>" method="post">
        <div class="row">
          <div class="input-field col s12 m12 l6">
            <input id="first_name" type="text" name="message_fname" value="<?php echo esc_attr($_POST['message_fname']); ?>">
            <label for="first_name">First Name</label>
          </div>
          <div class="input-field col s12 m12 l6">
            <input id="last_name" type="text" name="message_lname" value="<?php echo esc_attr($_POST['message_lname']); ?>">
            <label for="last_name">Last Name</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="email" type="text" name="message_email" value="<?php echo esc_attr($_POST['message_email']); ?>">
            <label for="email">Email</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea" name="message_text"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
            <label for="textarea1">Message</label>
          </div>
        </div>
        <div class="row links">
          <div class="col s12">
            <input type="hidden" name="submitted" value="1">
            <button class="waves-effect waves-teal btn-flat" type="submit" name="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>

    <?php endwhile; endif; ?>

  </div>

<!-- Footer -->
<?php get_footer(); ?>