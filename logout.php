<?php
session_start();
session_destroy();
DEFINE('URL','http://'.$_SERVER['HTTP_HOST']);
header("location:".URL);
?>