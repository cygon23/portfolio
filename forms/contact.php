<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;   // Enable verbose debug output
    $mail->isSMTP();                         // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                // Enable SMTP authentication
    $mail->Username   = 'godfreymuganyizi45@gmail.com'; // SMTP username
    $mail->Password   = 'gimrwpyiizqcnuwc ';   // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
    $mail->Port       = 465;                 // TCP port to connect to

    // Get user input
    $recipient = $_POST['recipient'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Recipients
    $mail->setFrom('godfreymuganyizi45@gmail.com', 'kyomah');
    $mail->addAddress($recipient);           // Add a recipient
    $mail->addReplyTo('rweyemamu088@gmail.com', 'Information');

    // Content
    $mail->isHTML(true);                     // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
