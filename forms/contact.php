<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Load Composer's autoloader
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Set up the SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com'; // Hostinger SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'abdullah@mddcar.com'; // Your email address
        $mail->Password = 'Aa123456@'; // Your email password or app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // TLS encryption port

        // Set email format to HTML
        $mail->isHTML(true);

        // Set the sender and recipient
        $mail->setFrom('abdullah@mddcar.com', 'Abdullah');
        $mail->addAddress('abdullah@mddcar.com'); // Your email address to receive messages

        // Set the subject and body
        $mail->Subject = $subject;
        $mail->Body    = "<strong>Name:</strong> $name<br><strong>Email:</strong> $email<br><strong>Message:</strong><br>$message";

        // Send the email
        $mail->send();
        echo 'Message has been sent.';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
