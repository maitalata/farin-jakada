<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Farin Jakada</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="<?= base_url(
        'vendors/bootstrap/dist/css/bootstrap.min.css'
    ) ?>">
    <link rel="stylesheet" href="<?= base_url(
        'vendors/font-awesome/css/font-awesome.min.css'
    ) ?>">
    <link rel="stylesheet" href="<?= base_url(
        'vendors/themify-icons/css/themify-icons.css'
    ) ?>">
    <link rel="stylesheet" href="<?= base_url(
        'vendors/flag-icon-css/css/flag-icon.min.css'
    ) ?>">
    <link rel="stylesheet" href="<?= base_url(
        'vendors/selectFX/css/cs-skin-elastic.css'
    ) ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        
                        <h1><b1>Farin</b1> Jakada</h1>
                    </a>
                    <?php if (session()->getFlashdata('errors')) { ?>
                <div class="alert alert-danger col-md-12">
                  <?php foreach (
                      session()->getFlashdata('errors')
                      as $error
                  ): ?>
                        <i class="fa fa-times"></i> <?= esc($error) ?>
                        <br>
                  <?php endforeach; ?>
                </div>
              <?php } elseif (session()->getFlashdata('success')) { ?>
                <div class="alert alert-success col-md-12">
                  <i class="fa fa-check"></i>  <?= session()->getFlashdata(
                      'success'
                  ) ?>
                </div>
              <?php } ?>
                </div>

                <div class="login-form">
                    <form action="<?= base_url(
                        'admin/loginChecker'
                    ) ?>" method="post">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                                <div class="checkbox">
                                    
                                    <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                                <div class="social-login-content">
                                    
                                </div>
                                <div class="register-link m-t-15 text-center">
                                    <p>&copy; <?= date('Y') ?> IWORLDOFTECH</p>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="<?= base_url('vendors/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url(
        'vendors/popper.js/dist/umd/popper.min.js'
    ) ?>"></script>
    <script src="<?= base_url(
        'vendors/bootstrap/dist/js/bootstrap.min.js'
    ) ?>"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>


</body>

</html>
