<?php
require 'PHPMailerAutoload.php';

require "credintial.php";

$mail = new PHPMailer;

$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'fmm2071@gmail.com';                 // SMTP username
$mail->Password = 'FMM20182071';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 456;                                    // TCP port to connect to

$mail->setFrom('fmm2071@gmail.com', 'Futsal match maker');
$mail->addAddress('skhadka200ns@gmail.com', 'Saroj');     // Add a recipient
// $mail->addAddress
/*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Booking Message';
$mail->Body    = 'Congratulations,You have successfully booked.';
$mail->AltBody = 'Congratulations,You have successfully booked.';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}