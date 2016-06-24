<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo Config::$public_dir ?>css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Config::$public_dir ?>css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Config::$public_dir ?>css/dark.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Config::$public_dir ?>css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Config::$public_dir ?>css/animate.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Config::$public_dir ?>css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="<?php echo Config::$public_dir ?>css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="<?php echo Config::$public_dir ?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Config::$public_dir ?>js/plugins.js"></script>

    <!-- Document Title
    ============================================= -->
    <title>CoMS | <?php echo $this->GetCurrentPage();  ?></title>

</head>

<body class="stretched">

<?php

if(isset($_POST['login-form-submit'])) {
    $username = $_POST['login-form-username'];
    $password = $_POST['login-form-password'];
    if($data['user']->userLogin($username, $password)) {
        $_SESSION['UserID'] = $data['user']->userLogin($username, $password);
        $now = time();
        $_SESSION['then'] = $now;
        header('Location: ' . $this->public_dir . 'index');
    } else {
        header('Location: ' . Config::$public_dir . 'index');
    }
}


?>

<section id="content">

    <div class="content-wrap nopadding">

        <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: #444;"></div>

        <div class="section nobg full-screen nopadding nomargin">
            <div class="container vertical-middle divcenter clearfix">

                <div class="row center">
                    <a href="index.html"><img src="<?php echo Config::$public_dir ?>images/logo.png" alt="Canvas Logo" height="55px" width="190px" style="margin-bottom: 10px"></a>
                </div>

                <div class="panel panel-default divcenter noradius noborder" style="max-width: 400px;">
                    <div class="panel-body" style="padding: 40px;">
                        <form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">
                            <h3>Login to CoMS Account</h3>

                            <div class="col_full">
                                <label for="login-form-username">Username:</label>
                                <input type="text" id="login-form-username" name="login-form-username" value="" class="form-control not-dark" />
                            </div>

                            <div class="col_full">
                                <label for="login-form-password">Password:</label>
                                <input type="password" id="login-form-password" name="login-form-password" value="" class="form-control not-dark" />
                            </div>

                            <div class="col_full nobottommargin">
                                <button class="button button-3d nomargin" id="login-form-submit" name="login-form-submit" style="background-color:orange;" value="login">Login</button>
                                <a href="" class="fright">Forgot Password?</a>
                            </div>
                        </form>

                        <div class="line line-sm"></div>
                    </div>
                </div>

                <div class="row center dark"><small>Copyrights <?php echo date('Y') ?> &copy; All Rights Reserved by Commoth V.O.F.</small></div>

            </div>
        </div>

    </div>

</section><!-- #content end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="<?php  echo Config::$public_dir  ?>js/functions.js"></script>

</body>
</html>