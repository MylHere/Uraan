<?php
// Include the Composer autoloader
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $vision = $_POST['vision'];
    $address = $_POST['address'];
    $message = $_POST['message'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'uraan');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO volunteers (name,email, mobile, vision, address, message) VALUES ('$name', '$email','$mobile', '$vision', '$address', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";

        // Send email using PHPMailer
    //     $mail = new PHPMailer(true);

    //     try {
    //         //Server settings
    //         $mail->isSMTP();
    //         $mail->Host       = 'smtp.gmail.com';
    //         $mail->SMTPAuth   = true;
    //         $mail->Username   = 'info.uraanofficial@gmail.com';  // Your Gmail address
    //         $mail->Password   = 'jjnpomwotcoqbvqp';        // Your Gmail App Password
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //         $mail->Port       = 587;

    //         //Recipients
    //         $mail->setFrom('your_gmail_username@gmail.com', 'Uraan');
    //         $mail->addAddress('info.uraanofficial@gmail.com');

    //         // Content
    //         $mail->isHTML(true);
    //         $mail->Subject = 'New Volunteer Submission';
    //         $mail->Body    = "Name: $name<br>Email: $email<br>Mobile: $mobile<br>Vision: $vision<br>Address: $address<br>Message: $message";

    //         $mail->send();
    //         echo 'Email has been sent';
    //     } catch (Exception $e) {
    //         echo "Email sending failed. Mailer Error: {$mail->ErrorInfo}";
    //     }
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
