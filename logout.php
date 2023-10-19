<?php
session_start();
session_destroy();
DEFINE('URL','http://'.$_SERVER['HTTP_HOST'].'/gym_boutique/');
header("location:".URL);
?>