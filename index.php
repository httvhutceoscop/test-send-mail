<!DOCTYPE html>
<html>
<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Fuel UX, a front-end library that extends Bootstrap with additional lightweight controls.">
<meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, fuel ux, bootstrap, extends, front-end, frontend, web development">
<meta name="author" content="ExactTarget">

<title>Test Sending SMTP mail</title>
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

<div class="container">

    <form class="form-horizontal" action="function.php" method="post">
<fieldset>


<!-- change col-sm-N to reflect how you would like your column spacing (http://getbootstrap.com/css/#forms-control-sizes) -->


<!-- Form Name -->
<legend>Test Sending Mail Using SMTP</legend>

<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="host" class="control-label col-sm-2">Host</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="host" name="host" placeholder="smtp.gmail.com" required="">
    <p class="help-block">Specify main and backup SMTP servers</p>
  </div>
</div>
<!-- Fuel UX Radios Inline http://getfuelux.com/javascript.html#radio-examples-inline -->
<div class="form-group">
  <label for="smtp_secure" class="control-label col-sm-2">SMTPSecure</label>

  <div class="radio col-sm-10 required ">
      <label class="radio-custom radio-inline" data-initialize="radio" id="smtp_secure-0">
        <input class="1111111" name="smtp_secure" type="radio" value="TLS"> <span class="radio-label">TLS</span>
      </label><label class="radio-custom radio-inline" data-initialize="radio" id="smtp_secure-1">
        <input class="1111111" name="smtp_secure" type="radio" value="SSL"> <span class="radio-label">SSL</span>
      </label>
    <p class="help-block">Enable TLS encryption, `ssl` also</p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="port" class="control-label col-sm-2">Port</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="port" name="port" placeholder="587" required="">
    <p class="help-block">TCP port to connect to</p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="username" class="control-label col-sm-2">Username</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="username" name="username" placeholder="viet.dev.1110@gmail.com" required="">
    <p class="help-block">SMTP username</p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="password" class="control-label col-sm-2">Password</label>
  <div class="col-sm-10">
    <input type="password" class="form-control" id="password" name="password" placeholder="viet.dev.901110" required="">
    <p class="help-block">SMTP password</p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="address" class="control-label col-sm-2">Recipients Address</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="address" name="address" placeholder="viet.nguyen@fujitechjsc.com" required="">
    <p class="help-block">Input multiple address with name, separate by comma. e.g: example@gmail.com, example2@gmail.com</p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="cc_address" class="control-label col-sm-2">AddCC</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="cc_address" name="cc_address" placeholder="vietnguyen@gmail.com">
    <p class="help-block">Input multiple address with name, separate by comma. e.g: example@gmail.com, example2@gmail.com</p>
  </div>
</div>
<!-- Text input http://getbootstrap.com/css/#forms -->
<div class="form-group">
  <label for="bcc_address" class="control-label col-sm-2">AddBCC</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="bcc_address" name="bcc_address" placeholder="vietnguyen@gmail.com">
    <p class="help-block">Input multiple address with name, separate by comma. e.g: example@gmail.com, example2@gmail.com</p>
  </div>
</div>
<!-- Button http://getbootstrap.com/css/#buttons -->
<div class="form-group">
  <label class="control-label col-sm-2" for="send"></label>
  <div class="text-right col-sm-10">
    <button type="submit" id="send" class="btn btn-primary" aria-label="">Send</button>
    
  </div>
</div>


</fieldset>
</form>


</div>

</body>
</html>