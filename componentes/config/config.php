<?php
session_start();
DEFINE('URL','http://'.$_SERVER['HTTP_HOST'].'/gym_boutique/');
if(!isset($_SESSION['email'])){
  header("location:".URL);
}
?>
