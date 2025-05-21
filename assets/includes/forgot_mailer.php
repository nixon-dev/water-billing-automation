<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';


function sendmail($email, $code)
{
    $mail = new PHPMailer(true);

    $email_code = array(
        'email' => $email,
        'code' => $code,
    );

    $body = file_get_contents('forgot.html');

    if (isset($email_code)) {
        foreach ($email_code as $k => $v) {
            $body = str_replace('{' . strtoupper($k) . '}', $v, $body);
        }
    }

    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.hostinger.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'admin@diffunwaterdistrict.com';                     //SMTP username
        $mail->Password = 'eaC@R:7/3C7^';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('admin@diffunwaterdistrict.com', 'Diffun Water District Administrator');
        $mail->addAddress($email);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset your password';
        $mail->Body = $body;

        $mail->send();

        $msg = "Check your email for verification code!";
        header("Location: ../../forgot-password.php?success=" . urlencode($msg));
        exit();
    } catch (Exception $e) {
        $msg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header("Location: ../../forgot-password.php?error=" . urlencode($msg));
        exit();
    }
}