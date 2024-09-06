<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";

$errors = [];
$popUp = [];
// Check if form was submitted and type is submit
if (!empty($_POST) && !empty($_POST['type'])) {
    if ($_POST['type'] == 'submit') {

        // Initialize variables

        $firstname = $lastname = $email = $message = '';

        // Validate first name
        if (!empty($_POST['firstname'])) {
            $firstname = htmlspecialchars(trim($_POST['firstname']));
        } else {
            $error['firstname'] = 'First name is required';
        }

        // Validate last name
        if (!empty($_POST['lastname'])) {
            $lastname = htmlspecialchars(trim($_POST['lastname']));
        } else {
            $error['lastname'] = 'Last name is required';
        }

        // Validate email
        if (!empty($_POST['email'])) {
            $email = htmlspecialchars(trim($_POST['email']));
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Invalid email format';
            }
        } else {
            $error['email'] = 'Email is required';
        }

        // Validate message
        if (!empty($_POST['message'])) {
            $message = htmlspecialchars(trim($_POST['message']));
        } else {
            $error['message'] = 'Message is required';
        }

        // Proceed only if there are no validation errors
        if (empty($error)) {
            // Mail configuration
            $debug = false; // Set to true to enable debug mode
            try {
                // Create instance of PHPMailer class
                $mail = new PHPMailer($debug);

                if ($debug) {
                    // Enable SMTP debug logging
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                }

                // SMTP configuration
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587;
                $mail->Username = 'madhulivezz@gmail.com';
                $mail->Password = 'dkir cmzm jetc yzap';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                // Email settings
                $mail->setFrom($email, $firstname . ' ' . $lastname);
                $mail->addAddress('madhulivezz@gmail.com', 'Madhavan');
                $mail->CharSet = 'UTF-8';
                $mail->Encoding = 'base64';
                $mail->isHTML(true);
                $mail->Subject = 'Mail for iniyan etudios';
                $mail->Body = $message . $email;
                $mail->AltBody = strip_tags($message);

                // Send the email
                $mail->send();
                $popUp['status'] = "Message sent successfully!";
            } catch (Exception $e) {
                $popUp['status'] = "Message could not be sent";
            }
        }
    }
}

