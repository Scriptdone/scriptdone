
<?php
session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php'; {
    //    $fullname = $_POST['fullname'];
    //    $Email = $_POST['email'];
    //    $mobile = $_POST['mobile'];
    //    $message = $_POST['message'];

    $mail = new PHPMailer(true);


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $msg = "<h3>Hello, you got a new inquiry</h3>";

        foreach ($_POST as $key => $value) {
            $msg .= "<p><strong>" . htmlspecialchars(strtoupper($key)) . ":</strong> " . htmlspecialchars($value) . "</p>";
        }
    }


    try {

        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->SMTPAuth = true; //Enable SMTP authentication

        $mail->Host = 'smtp.gmail.com'; //Correct SMTP server
        $mail->Username = 'market.scriptdone@gmail.com'; //SMTP username
        $mail->Password = 'usvp rcci zidq nkxz'; //SMTP password

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Use STARTTLS for port 587
        $mail->Port = 587; //TCP port to connect to

        //Recipients
        $mail->setFrom('no-replay@scriptdone.com', 'scriptdone');
        $mail->addAddress('market.scriptdone@gmail.com', 'IT-scriptdone-software');

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'Free website for six months';
        $mail->Body = $msg;
        //    $mail->AltBody = "New Inquiry\nFull Name: $fullname\nEmail: $Email\nPhone: $mobile\nMessage: $message";

        if ($mail->send()) {
            $_SESSION['status'] = "Thank you for contacting us - scriptdone";
            
            echo json_encode(["code"=> 201 , "msg"=>"Thank you for contacting us. Our team will get in touch with you shortly"]);
            exit(0);
        } else {
            $_SESSION['status'] = "Message could not be sent: {$mail->ErrorInfo}";
            //    header("Location: ".$_SERVER["HTTP_REFERER"]);
            exit(0);
        }
    } catch (Exception $e) {
        $_SESSION['status'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        //    header("Location: ".$_SERVER["HTTP_REFERER"]);
        exit(0);
    }
}