<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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

<body class="stretched no-transition">

<?php

if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else if (time() - $_SESSION['CREATED'] > 900) { //15 minutes
    // session started more than 15 minutes ago
    session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
}

if(!isset($_SESSION['UserID'])) {
   header('Location: ' . $this->public_dir . 'login');
    die();
} else {

}
?>

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Top Bar
    ============================================= -->
    <div id="top-bar">

        <div class="container clearfix">

            <div class="col_half nobottommargin">

                <!-- Top Links
                ============================================= -->
                <div class="top-links">
                    <ul>
                        <li><a href="#">Welcome, <?php echo $_SESSION['UserID']['username']; ?></a></li>
                        <li><a href="<?php  echo $this->public_dir ?>logout">Logout</a></li>
                    </ul>
                </div><!-- .top-links end -->

            </div>

        </div>

    </div><!-- #top-bar end -->

    <!-- Header
    ============================================= -->
    <header id="header" class="sticky-style-2">

        <div class="container clearfix">

            <!-- Logo
            ============================================= -->
            <div id="logo">
                <a href="index.html" class="standard-logo" data-dark-logo="<?php echo Config::$public_dir ?>images/logo-dark.png"><img src="<?php echo Config::$public_dir ?>images/logo.png" alt="Canvas Logo"></a>
                <a href="index.html" class="retina-logo" data-dark-logo="<?php echo Config::$public_dir ?>images/logo-dark@2x.png"><img src="<?php echo Config::$public_dir ?>images/logo@2x.png" alt="Canvas Logo"></a>
            </div><!-- #logo end -->

        </div>

        <div id="header-wrap">

            <!-- Primary Navigation
            ============================================= -->
            <nav id="primary-menu" class="style-2">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <ul>
                        <li class="<?php echo ($this->GetCurrentPage() == "index") ? "current" : "" ?>"><a href="<?php  echo $this->public_dir ?>index"><div>Home</div></a></li>
                        <li class="<?php echo (strlen(strstr($this->GetCurrentPage(),'user'))) ? "current" : "" ?>"><a href="<?php  echo $this->public_dir ?>user_overview"><div>Users</div></a>
                            <ul>
                                <li><a href="<?php  echo $this->public_dir ?>user_overview"><div><i class="icon-stack"></i>Overview</div></a>
                                <li><a href="<?php  echo $this->public_dir ?>user_create"><div><i class="icon-adjust"></i>Create User(s)</div></a></li>
                                <li><a href="<?php  echo $this->public_dir ?>user_suspend"><div><i class="fa fa-times fa-x2"></i>Suspend User(s)</div></a></li>
                            </ul>
                        </li>
                        <li class="<?php echo (strlen(strstr($this->GetCurrentPage(),'pages'))) ? "current" : "" ?>"><a href="<?php  echo $this->public_dir ?>pages_overview"><div>Pages</div></a>
                            <ul>
                                <li><a href="<?php  echo $this->public_dir ?>pages_overview"><div><i class="icon-stack"></i>Overview</div></a>
                                <li><a href="<?php  echo $this->public_dir ?>pages_create"><div><i class="icon-adjust"></i>Create Page/Menu</div></a></li>
                                <li><a href="<?php  echo $this->public_dir ?>pages_portfolio"><div><i class="icon-adjust"></i>Create/Edit Portfolio</div></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><div>SEO</div></a>
                            <ul>
                                <li><a href="#"><div><i class="icon-stack"></i>Overview</div></a>
                                <li><a href="#"><div><i class="icon-adjust"></i>Reserved</div></a></li>
                                <li><a href="#"><div><i class="icon-adjust"></i>Reserved</div></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><div>Invoices</div></a>
                            <ul>
                                <li><a href="#"><div><i class="icon-stack"></i>Overview</div></a>
                                <li><a href="#"><div><i class="icon-adjust"></i>Reserved</div></a></li>
                                <li><a href="#"><div><i class="icon-adjust"></i>Reserved</div></a></li>
                                <li><a href="#"><div><i class="icon-adjust"></i>Reserved</div></a></li>
                                <li><a href="#"><div><i class="icon-adjust"></i>Reserved</div></a></li>
                            </ul>
                        </li>
                        <li><a href="#"><div>Other</div></a>
                            <ul>
                                <li><a href="#"><div><i class="icon-stack"></i>Admin Logs</div></a>
                                <li><a href="#"><div><i class="icon-stack"></i>News Feed</div></a></li>
                            </ul>
                        </li>
                </div>
            </nav><!-- #primary-menu end -->

        </div>

    </header><!-- #header end -->