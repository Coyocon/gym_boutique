<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'assest/composer/vendor/autoload.php';

session_start();
$method=$_SERVER['REQUEST_METHOD'];
if($method == 'POST'){
    if(isset($_POST['codigo'])){
        if($_SESSION['code']==$_POST['codigo'])
        echo 'Codigo Correcto <br><hr>';

    }else{

$mail = new PHPMailer(true);

try{
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pruebas@development.cescoyoc.dev';
    $mail->Password = '#123456789aA';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('pruebas@development.cescoyoc.dev','App en Desarrollo');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $code='';
    for ($i=0; $i < 6 ; $i++) { 
        $code.=rand(0,9);
    }
    $_SESSION['code']=$code;
    $mail->Subject = 'Codigo de acceso a cuenta';
    $mail->msgHTML(file_get_contents('body.html'), __DIR__);
    $mail->send();
} catch(Exception $e){
    echo 'Mensaje'. $mail->ErrorInfo;
}
    }
}
?>
<form action="" method="POST">
<?php if(isset($code)) { ?>
    <input name="codigo" type="text">
    <button> Verificar codigo </button>
<?php }else{ ?>

    <input name="email" type="Mail">
    <button> Enviar codigo </button>    
<?php } ?>
</form>
