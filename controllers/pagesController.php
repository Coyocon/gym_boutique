<?php  
require_once 'componentes/config/config.php';

class PagesController{
  public function __construct(){    
  }
  public function Page($page){
    require_once 'views/default/header.php';
    require_once "views/default/menu.php";
    require_once 'views/pages/'.$page.'.php';
    require_once 'views/default/footer.php';
  }

}
?>