<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once ('database.php');
session_start();

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


$db = new DBConnect();
$conn = $db->connect();

$name = '';
$gender = '';
$email = '';
$company = '';
$position = '';
$address = '';
$tel = '';
$mailing_address = '';
$business_fields = '';
$age = '';
$get_info = '';

$aMessage = [];
$isValid = false;

if (isset($_POST['name']) && !empty($_POST['name'])) {
    $name = $_POST['name'];
    $isValid = true;
} else {
    array_push($aMessage, 'Name is required!');
    $isValid = false;
}
if (isset($_POST['gender']) && !empty($_POST['gender'])) {
    $gender = $_POST['gender'];
    $isValid = true;
} else {
    array_push($aMessage, 'Gender is required!');
    $isValid = false;
}
if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
    $isValid = true;
} else {
    array_push($aMessage, 'Email is required!');
    $isValid = false;
}
if (isset($_POST['company']) && !empty($_POST['company'])) {
    $company = $_POST['company'];
    $isValid = true;
} else {
    array_push($aMessage, 'Company is required!');
    $isValid = false;
}
if (isset($_POST['position']) && !empty($_POST['position'])) {
    $position = $_POST['position'];
    $isValid = true;
}
if (isset($_POST['address']) && !empty($_POST['address'])) {
    $address = $_POST['address'];
    $isValid = true;
} else {
    array_push($aMessage, 'Address is required!');
    $isValid = false;
}
if (isset($_POST['tel']) && !empty($_POST['tel'])) {
    $tel = $_POST['tel'];
    $isValid = true;
} else {
    array_push($aMessage, 'Tel is required!');
    $isValid = false;
}
if (isset($_POST['mailing_address']) && !empty($_POST['mailing_address'])) {
    $mailing_address = $_POST['mailing_address'];
    $isValid = true;
}
if (isset($_POST['business_fields']) && !empty($_POST['business_fields'])) {
    $business_fields = implode(',', $_POST['business_fields']);
    $isValid = true;
} else {
    array_push($aMessage, 'Business fields are required!');
    $isValid = false;
}
if (isset($_POST['age']) && !empty($_POST['age'])) {
    $age = $_POST['age'];
    $isValid = true;
} else {
    array_push($aMessage, 'Age is required!');
    $isValid = false;
}
if (isset($_POST['why_know']) && !empty($_POST['why_know'])) {
    $get_info = implode(',', $_POST['why_know']);
    $isValid = true;
} else {
    array_push($aMessage, 'Question is required!');
    $isValid = false;
}

$sql = "INSERT INTO users (name, gender, email, company, position, address, tel, mailing_address, business_fields, age, get_info)
        VALUES ('$name', '$gender', '$email', '$company', '$position', '$address', '$tel', '$mailing_address', '$business_fields', '$age', '$get_info')";;

$_SESSION["message"] = $aMessage;

if ($conn->query($sql) === TRUE && $isValid) {
    $_SESSION["message"] = [];
    $isSent = sendMail($name, $email, $gender);
    if ($isSent) {
        header('Location: thanks.php');
    } else {
        header('Location: register.php');    
    }
    
    exit;
} else {    
    header('Location: register.php');
    // echo "Error: " . $sql . "<br>" . $conn->error;
}


function sendMail($name = 'Guest', $address, $gender = 'Mr / Ms') {

    $isSentMail = false;

    $to = 'narhanoiforum@gmail.com';
    $subject = 'Register Nikkei Asian Review Hanoi Forum';
    $message =  '
        <div id="wrapper">
            <p>Dear '.$gender.' '.$name.'</p>
            <p>You have been successfully registered for Nikkei Asian Review Hanoi Forum.</p>
            <p>We will send our official invitation letter to your mailing address. Please bring along invitation letter when coming to event.</p>
            <p>This is an automated message, please do not reply this email.</p>
            <p>Thank you.</p>
            <p>Nikkei Asian Review Hanoi Forum</p>
        </div>
        ';
    
    //goi thu vien
    require_once ("lib/PHPMailer/src/Exception.php");
    require_once ("lib/PHPMailer/src/PHPMailer.php");
    require_once ("lib/PHPMailer/src/SMTP.php");

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'narhanoiforum@gmail.com';                 // SMTP username
        $mail->Password = 'more2017';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom($to, 'Nar Hanoi Forum');
        $mail->addAddress($to, 'Nar Hanoi Forum');     // Add a recipient
        $mail->addAddress($address, $name);               // Name is optional
        $mail->addReplyTo($to, 'Nar Hanoi Forum');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $isSentMail = $mail->send();
    } catch (Exception $e) {
        $isSentMail = false;
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }

    return $isSentMail;
}