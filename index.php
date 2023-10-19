<?php
require_once 'controllers/loginController.php';
session_start();
$logincontrol= new LoginController();
$method=$_SERVER['REQUEST_METHOD'];
if(false){
    $logincontrol->proximamente();
}else{
    if(isset($_SESSION['email'])){
        header("location:".'http://'.$_SERVER['HTTP_HOST'].'/gym_boutique/home');
    }else{
        session_destroy();
        $logincontrol->Login();
    }
}
?>