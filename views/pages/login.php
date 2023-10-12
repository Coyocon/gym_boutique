<?php
ini_set('display_errors', 1);
error_reporting(E_ALL); 
require_once 'vendor/autoload.php';
$google_client = new Google\Client();
$google_client -> setClientId('283601058959-806grcattvnmrlcbtgijn2upqfv9fttq.apps.googleusercontent.com');
$google_client -> setClientSecret('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');
$google_client -> setRedirectUri('http://localhost/gym_boutique/');
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
    echo'<pre>';
    var_dump($datos);
    echo '</pre>';
    echo "<img src=".$datos['imagen'].">";
}
?>
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="<?= $google_client->createAuthUrl() ?>" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>