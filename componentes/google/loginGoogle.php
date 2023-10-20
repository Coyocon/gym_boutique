<?php
require_once 'vendor/autoload.php';
require_once 'componentes/google/datos.php';
session_start();
$google_client = new Google\Client();
$google_client -> setClientId($clienteID);
$google_client -> setClientSecret($clienteS);
$google_client -> setRedirectUri($url_redirecc);
$google_client ->addScope("email");
$google_client -> addScope("profile");
if (isset($_GET['code'])){
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
    $google_client ->setAccessToken($token['access_token']);
    $google_oauth = New Google_Service_Oauth2($google_client);
    $google_account_info=$google_oauth->userinfo->get();
    $datos['name']= $google_account_info->givenName;
    $datos['apell']= $google_account_info->familyName;
    $datos['gener']= $google_account_info->gender;
    $datos['email'] = $google_account_info->email;
    $datos['imagen']=$google_account_info->picture;
    session_start();
    $_SESSION=$datos;
    header("location:".URL);
}
?>