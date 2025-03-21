<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>
<body>

<?php

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    // Server settings
    $mail->isSMTP();                              // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                     // Enable SMTP authentication
    $mail->Username   = 'yashikajaiswal30@gmail.com'; // SMTP write your email
    $mail->Password   = 'aurmddwyknpnrzby';      // SMTP password
    $mail->SMTPSecure = 'ssl';                    // Enable implicit SSL encryption
    $mail->Port       = 465;                      // TCP port to connect to

    // Recipients
    $mail->setFrom($_POST["email"], $_POST["name"]); // Sender Email and name
    $mail->addAddress('yashikajaiswal30@gmail.com');   // Add a recipient email  
    $mail->addReplyTo($_POST["email"], $_POST["name"]); // Reply to sender email

    // Content
    $mail->isHTML(true);                     // Set email format to HTML
    $mail->Subject = $_POST["subject"];     // Email subject headings
    $mail->Body    = $_POST["message"];     // Email message

    // Success sent message alert
    if ($mail->send()) {
        // Send confirmation email to the user
        $confirmationMail = new PHPMailer(true);
        $confirmationMail->isSMTP();
        $confirmationMail->Host = 'smtp.gmail.com';
        $confirmationMail->SMTPAuth = true;
        $confirmationMail->Username = 'yashikajaiswal30@gmail.com'; // SMTP email
        $confirmationMail->Password = 'aurmddwyknpnrzby';           // SMTP password
        $confirmationMail->SMTPSecure = 'ssl';
        $confirmationMail->Port = 465;

        // Recipients
        $confirmationMail->setFrom('yashikajaiswal30@gmail.com', 'Yashika'); // Admin email
        $confirmationMail->addAddress($_POST["email"], $_POST["name"]);  // Send confirmation to the user

        // Confirmation email content
        $confirmationMail->isHTML(true);
        $confirmationMail->Subject = 'Message Sent Confirmation';
        $confirmationMail->Body = "
        <h2>Thank you for contacting us, {$_POST['name']}!</h2>
        <p>Your message has been successfully sent to our team. We will get back to you as soon as possible.</p>
        
        ";

        // Send the confirmation email
        if ($confirmationMail->send()) {
            echo "
            <script>
                alert('Your message has been sent successfully! A confirmation email has been sent to your address.');
                window.location.href = 'contact.php';  // Redirect back to contact page
            </script>
            ";
        } else {
            echo "
            <script>
                swal('Error!', 'Message could not be sent to the user. Please try again.', 'error');
            </script>
            ";
        }
    } 
} 

?>

</body>
</html>
