<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'assest/PHPMailer/Exception.php';
require 'assest/PHPMailer/PHPMailer.php';
require 'assest/PHPMailer/SMTP.php';
$mail = new PHPMailer(true);

try{
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pruebas@development.cescoyoc.dev';
    $mail->Password = '#123456789aA';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('pruebas@development.cescoyoc.dev','App en Desarrollo');
    $mail->addAddress('cesarcoyoc@gmail.com');
    $mail->isHTML(true);
    $code='';
    for ($i=0; $i < 6 ; $i++) { 
        $code.=rand(0,9);
    }
    $mail->Subject = 'Codigo de acceso a cuenta';
    $mail->Body="Tu codigo de acceso es <b>$code</b>";
    $mail->send();
    echo 'Correo enviado';
    echo 'Codigo '.$code;
} catch(Exception $e){
    echo 'Mensaje'. $mail->ErrorInfo;
}
?>