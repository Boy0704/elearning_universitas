
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login E-LEARNING</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<base href="https://colorlib.com/etc/lf/Login_v16/">

<link rel="icon" type="image/png" href="images/icons/favicon.ico" />

<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
<div class="limiter">
<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
<div class="wrap-login100 p-t-30 p-b-50">
<span class="login100-form-title p-b-41">
E- Learning
</span>
<form class="login100-form validate-form p-b-33 p-t-5" method="post">
<div class="wrap-input100 validate-input" data-validate="Enter NIM/NIDN">
<input class="input100" type="text" name="username" placeholder="NIM / NIDN" autocomplete="off">
<span class="focus-input100" data-placeholder="&#xe82a;"></span>
</div>
<div class="wrap-input100 validate-input" data-validate="Enter password">
<input class="input100" type="password" name="password" placeholder="Password">
<span class="focus-input100" data-placeholder="&#xe80f;"></span>
</div>
<div class="container-login100-form-btn m-t-32">
<button class="login100-form-btn" type="submit">
Login
</button>
</div>
</form>
</div>
</div>
</div>
<div id="dropDownSelect1"></div>

<script src="vendor/jquery/jquery-3.2.1.min.js" type="23b23e0dad9d642bc99bc0b9-text/javascript"></script>

<script src="vendor/animsition/js/animsition.min.js" type="23b23e0dad9d642bc99bc0b9-text/javascript"></script>

<script src="vendor/bootstrap/js/popper.js" type="23b23e0dad9d642bc99bc0b9-text/javascript"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js" type="23b23e0dad9d642bc99bc0b9-text/javascript"></script>

<script src="vendor/select2/select2.min.js" type="23b23e0dad9d642bc99bc0b9-text/javascript"></script>

<script src="vendor/daterangepicker/moment.min.js" type="23b23e0dad9d642bc99bc0b9-text/javascript"></script>
<script src="vendor/daterangepicker/daterangepicker.js" type="23b23e0dad9d642bc99bc0b9-text/javascript"></script>

<script src="vendor/countdowntime/countdowntime.js" type="23b23e0dad9d642bc99bc0b9-text/javascript"></script>

<script src="js/main.js" type="23b23e0dad9d642bc99bc0b9-text/javascript"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="23b23e0dad9d642bc99bc0b9-text/javascript"></script>
<script type="23b23e0dad9d642bc99bc0b9-text/javascript">
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-23581568-13');
    </script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="23b23e0dad9d642bc99bc0b9-|49" defer=""></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript"><?php echo $this->session->userdata('message') ?></script>
</body>
</html>
