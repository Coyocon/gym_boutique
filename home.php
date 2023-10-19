<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
require_once 'controllers/pagesController.php';
$pagescontrol= new PagesController();
$method=$_SERVER['REQUEST_METHOD'];
if(false){
    $pagescontrol->proximamente();
}else{
    if($method == 'GET'){
        if(isset($_GET['page'])){
            switch($_GET['page']){
                case 'home':
                    $pagescontrol->Page($_GET['page']);
                break;
                case 'eventos':
                    $pagescontrol->Page($_GET['page']);
                break;
                case 'logout':
                    $pagescontrol->Page($_GET['page']);
                break;
            }
        }
    }
}
?>