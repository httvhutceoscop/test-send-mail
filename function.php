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

if (isset($_POST)) {
    $host = '';
    $port = '';
    $smtp_secure = '';
    $username = '';
    $password = '';
    $address = '';
    $cc_address = '';
    $bcc_address = '';

    $a_address = [];
    $a_cc_address = [];
    $a_bcc_address = [];

    if (isset($_POST['host']) && !empty($_POST['host'])) {
        $host = $_POST['host'];
    } else {

    }

    if (isset($_POST['port']) && !empty($_POST['port'])) {
        $port = $_POST['port'];
        $port = intval($port);
    } else {
        
    }

    if (isset($_POST['smtp_secure']) && !empty($_POST['smtp_secure'])) {
        $smtp_secure = $_POST['smtp_secure'];
        $smtp_secure = strtolower($smtp_secure);
    } else {
        
    }

    if (isset($_POST['username']) && !empty($_POST['username'])) {
        $username = $_POST['username'];
    } else {
        
    }

    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        
    }

    if (isset($_POST['address']) && !empty($_POST['address'])) {
        $address = $_POST['address'];
        $a_address = explode(',', $address);
    } else {
        
    }

    if (isset($_POST['cc_address']) && !empty($_POST['cc_address'])) {
        $cc_address = $_POST['cc_address'];
        $a_cc_address = explode(',', $cc_address);
    } else {
        
    }

    if (isset($_POST['bcc_address']) && !empty($_POST['bcc_address'])) {
        $bcc_address = $_POST['bcc_address'];
        $a_bcc_address = explode(',', $bcc_address);
    } else {
        
    }

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = $host;
        $mail->SMTPAuth = true;
        $mail->Username = $username;
        $mail->Password = $password;
        $mail->SMTPSecure = $smtp_secure;
        $mail->Port = $port;

        //Recipients
        $mail->setFrom('tienvietnguyen1110@gmail.com', 'Mailer');
        $mail->addAddress('viet.nguyen@fujitechjsc.com', 'Viet Nguyen');

        if (count($a_address) > 0) {
            foreach ($a_address as $key => $value) {
                $mail->addAddress(trim($value));
            }
        }
        if (count($a_cc_address) > 0) {
            foreach ($a_cc_address as $key => $value) {
                $mail->addCC(trim($value));
            }
        }
        if (count($a_bcc_address) > 0) {
            foreach ($a_bcc_address as $key => $value) {
                $mail->addBCC(trim($value));
            }
        }

        // $mail->addReplyTo('info@example.com', 'Information');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold! '.$username.'</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}


?>