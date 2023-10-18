<?php  
class LoginController{
  public function __construct(){    
  }
  public function Login(){
    $login = true;
    require_once 'views/default/header.php';
    require_once 'views/pages/login.php';
    require_once 'views/default/footer.php';
  }

}
?>