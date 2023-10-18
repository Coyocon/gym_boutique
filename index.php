<?php
require_once 'controllers/loginController.php';
$logincontrol= new LoginController();
$method=$_SERVER['REQUEST_METHOD'];
if(false){
    $logincontrol->proximamente();
}else{
    $logincontrol->Login();
}
?>