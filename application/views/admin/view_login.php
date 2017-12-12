<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= APP_NAME ?> Admin</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png">
    <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url() ?>assets/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="<?= base_url() ?>assets/admin/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url() ?>assets/admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url() ?>assets/admin/vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?= base_url() ?>assets/admin/custom.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/admin/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Parsley -->
    <script src="<?= base_url() ?>assets/admin/vendors/parsleyjs/dist/parsley.min.js" type="text/javascript"></script>
    <!-- PNotify -->
    <script src="<?= base_url() ?>assets/admin/vendors/pnotify/dist/pnotify.js" type="text/javascript"></script>

    <script type="text/javascript">
      $(function() {
        $('#loginForm').parsley();
      });
    </script>

    <?php if(isset($pMessage) == '1') { ?>
      <script type="text/javascript">
        $(function() {
          new PNotify({
            title: 'Error!',
            text: '<?= $pMessage ?>',
            type: 'error',
            styling: 'bootstrap3',
            delay: 2000
          });
        });
      </script>
    <?php } ?>
  </head>
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="loginForm" action="<?= site_url() ?>/admin/login" method="post" accept-charset="utf-8" data-parsley-validate class="form-horizontal form-label-left" novalidate>
              <h1>Admin Login</h1>
              <div>
                <input type="email" class="form-control" placeholder="Email Address" name="email_address" required="required" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="required" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" value="validate">Log in</button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>
              <input type="hidden" id="h_ip_address" name="h_ip_address" value="<?= $_SERVER['REMOTE_ADDR'] ?>">

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
