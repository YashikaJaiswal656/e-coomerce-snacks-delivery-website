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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'yashikajaiswal30@gmail.com';
        $mail->Password   = 'aurmddwyknpnrzby';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom($_POST["email"], $_POST["name"]);
        $mail->addAddress('yashikajaiswal30@gmail.com');
        $mail->addReplyTo($_POST["email"], $_POST["name"]);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Order Received';
        $mail->Body    = "
            <h2>Order Details</h2>
            <p><strong>Subtotal:</strong> Rs {$_POST['subtotal']}</p>
            <p><strong>GST:</strong> Rs {$_POST['gst']}</p>
            <p><strong>Total:</strong> Rs {$_POST['total']}</p>
        ";

        // Send to admin
        
        if ($mail->send()) {
            // Send confirmation email to the user
            $confirmationMail = new PHPMailer(true);
            $confirmationMail->isSMTP();
            $confirmationMail->Host = 'smtp.gmail.com';
            $confirmationMail->SMTPAuth = true;
            $confirmationMail->Username = 'yashikajaiswal30@gmail.com';
            $confirmationMail->Password = 'aurmddwyknpnrzby';
            $confirmationMail->SMTPSecure = 'ssl';
            $confirmationMail->Port = 465;

            // Recipients for confirmation email
            $confirmationMail->setFrom('yashikajaiswal30@gmail.com', 'Yashika');
            $confirmationMail->addAddress($_POST["email"], $_POST["name"]);

            // Confirmation email content
            $confirmationMail->isHTML(true);
            $confirmationMail->Subject = 'Bill Details';
            $confirmationMail->Body = "
                <h2>Thank you for your order, {$_POST['name']}!</h2>
                <p>Your product will be delivered soon.</p>
                <h3>Product Details:</h3>
                <p><strong>Subtotal:</strong> Rs {$_POST['subtotal']}</p>
                <p><strong>GST:</strong> Rs {$_POST['gst']}</p>
                <p><strong>Total:</strong> Rs {$_POST['total']}</p>
            ";

            // Send confirmation email
            if ($confirmationMail->send()) {
                echo "
                <script>
                    window.location.href = 'del_2.php';
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
    } catch (Exception $e) {
        echo "
        <script>
            swal('Error!', 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}', 'error');
        </script>
        ";
    }
}
?>

</body>
</html>
