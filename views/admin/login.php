<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap -->
    <link href="/views/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/views/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/views/assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/views/assets/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/views/assets/layout-admin/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="" method="post">
              <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
              <h1>Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="user_name" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="user_pass" />
              </div>
              <div class="form-inline">
                <input class="btn btn-default submit" type="submit" name="login" value="Log in" />
              </div>
              <div class="clearfix"></div>
            </form>
          </section>
          <hr/>
          <div class="text-center">
            <a style="text-decoration: none;" href="/login/loginfacebook" class="btn btn-primary">Login With Facebook</a><br/>
            <a style="text-decoration: none;" href="/login/logingoogle" class="btn btn-danger">Login With Google</a>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
