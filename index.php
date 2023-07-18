<?php
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
            }
        }else{
            $pagescontrol->Page("home");
        }
    }
}
?>