<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_ALL);
ini_set("display_errors", 1);

date_default_timezone_set('UTC');

require_once ('PHPMailer/src/Exception.php');
require_once ('PHPMailer/src/PHPMailer.php');
require_once ('PHPMailer/src/SMTP.php');

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'viet.dev.1110@gmail.com';                 // SMTP username
    $mail->Password = 'viet.dev.901110';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('tienvietnguyen1110@gmail.com', 'Mailer');
    $mail->addAddress('viet.nguyen@fujitechjsc.com', 'Viet Nguyen');     // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- Bootstrap CSS-->
<link href="http://getfuelux.com/assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="http://getfuelux.com/assets/vendor/fuelux/dist/css/fuelux.css" rel="stylesheet" type="text/css">
<!-- Docs CSS -->
<link href="http://getfuelux.com/assets/css/docs.css" rel="stylesheet">

<!-- Copy select -->
<link href="http://getfuelux.com/assets/css/super-copy.css"  rel="stylesheet" type="text/css">

<!-- Specific Page CSS -->

    <link href="http://getfuelux.com/assets/css/formbuilder.css" rel="stylesheet">


</head>
<body>

    <form class="form-horizontal">
<fieldset>


<!-- change col-sm-N to reflect how you would like your column spacing (http://getbootstrap.com/css/#forms-control-sizes) -->


<!-- Form Name -->
<legend>Test Sending Mail Using SMTP</legend>

<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="host" class="control-label col-sm-2">Host</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="host" placeholder="smtp.gmail.com" required="">
    <p class="help-block">Specify main and backup SMTP servers</p>
  </div>
</div>
<!-- Fuel UX Radios Inline http://getfuelux.com/javascript.html#radio-examples-inline -->
<div class="form-group">
  <label for="smtp_secure" class="control-label col-sm-2">SMTPSecure</label>

  <div class="radio col-sm-10 required ">
      <label class="radio-custom radio-inline" data-initialize="radio" id="smtp_secure-0">
        <input class="sr-only" name="smtp_secure" type="radio" value="TLS"> <span class="radio-label">TLS</span>
      </label><label class="radio-custom radio-inline" data-initialize="radio" id="smtp_secure-1">
        <input class="sr-only" name="smtp_secure" type="radio" value="SSL"> <span class="radio-label">SSL</span>
      </label>
    <p class="help-block">Enable TLS encryption, `ssl` also</p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="port" class="control-label col-sm-2">Port</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="port" placeholder="587" required="">
    <p class="help-block">TCP port to connect to</p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="username" class="control-label col-sm-2">Username</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="username" placeholder="example@gmail.com" required="">
    <p class="help-block">SMTP username</p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="password" class="control-label col-sm-2">Password</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="password" placeholder="******" required="">
    <p class="help-block">SMTP password</p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="address" class="control-label col-sm-2">Recipients Address</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="address" placeholder="Viet Nguyen <vietnguyen@gmail.com>" required="">
    <p class="help-block">Input multiple address with name, separate by comma. e.g: Viet Nguyen <vietnguyen@gmail.com>, Viet Nguyen22 <vietnguyen22@gmail.com></vietnguyen22@gmail.com></vietnguyen@gmail.com></p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="cc_address" class="control-label col-sm-2">AddCC</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="cc_address" placeholder="Viet Nguyen <vietnguyen@gmail.com>">
    <p class="help-block">Input multiple address with name, separate by comma. e.g: Viet Nguyen <vietnguyen@gmail.com>, Viet Nguyen22 <vietnguyen22@gmail.com></vietnguyen22@gmail.com></vietnguyen@gmail.com></p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="bcc_address" class="control-label col-sm-2">AddBCC</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="bcc_address" placeholder="Viet Nguyen <vietnguyen@gmail.com>">
    <p class="help-block">Input multiple address with name, separate by comma. e.g: Viet Nguyen <vietnguyen@gmail.com>, Viet Nguyen22 <vietnguyen22@gmail.com></vietnguyen22@gmail.com></vietnguyen@gmail.com></p>
  </div>
</div>
<!-- Button http://getbootstrap.com/css/#buttons -->
<div class="form-group">
  <label class="control-label col-sm-2" for="send"></label>
  <div class="text-right col-sm-10">
    <button type="submit" id="send" name="send" class="btn btn-primary" aria-label="">Send</button>
    
  </div>
</div>


</fieldset>
</form>


</body>
</html>