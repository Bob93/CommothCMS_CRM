<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 24-5-2016
 * Time: 12:57
 */
/* niet dingen echo'en in de controller maar in de view */

class Home extends Controller {

    public function index($name = '', $otherName = '') {

        $user =  $this->model('User');
        //echo $user->name;

        $this->view('home/index', [ 'name'=> $user->name]);
}

    public function contact() {
        if(isset($_POST['email'])){
            //Handel contact formulier af
        }{
            //Laat contact formulier zien
            $this->view('defaults/header');
            $this->view('home/contact');
        }


    }

    public function test() {
        echo 'home/test';

        $userm = $this->model('user');
        $userm->getUserById(3);
        echo $userm->name;
    }

    protected function ImportHeader() {
        return '<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <header id="header" class="full-header">

        <div id="header-wrap">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="index.php" class="standard-logo" data-dark-logo="' . Config::$public_dir  . 'images/logo.png"><img src="' . Config::$public_dir  . 'images/logo.png" alt="Commoth Logo"></a>
                    <a href="index.php" class="retina-logo" data-dark-logo="' . Config::$public_dir  . 'images/logo-dark@2x.png"><img src="' . Config::$public_dir  . 'images/logo@2x.png" alt="Canvas Logo"></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu">

                    <ul>
                        <li class="current"><a href="index.php"><div>Home</div></a></li>
                        <li><a href="portfolio.php"><div>Portfolio</div></a></li>
                        <li><a href="aboutus.php"><div>Over ons</div></a></li>
                        <li><a href="contact.php"><div>Contact</div></a></li>
                    </ul>

                    <!-- Top Search
                    ============================================= -->
                    <!--<div id="top-search">
                        <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                        <form action="search.html" method="get">
                            <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                        </form>
                    </div><!-- #top-search end -->

                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header><!-- #header end -->';

    }

    protected function ImportFooter() {
        return '<footer id="footer" class="dark">
        <div class="container">
            <div class="footer-widgets-wrap clearfix">
                <div class="col_one_third">
                    <div class="widget clearfix">
                        <img src="' . Config::$public_dir . 'images/commoth-logo.png" alt="" class="footer-logo">
                        <p>Wij geloven in  <strong>simpele</strong>, <strong>creatieve</strong> &amp; <strong>flexibele</strong> design standaarden.</p>
                    </div>
                </div>
                <div class="col_one_third">
                    <div style="background: url(' . Config::$public_dir . '"images/world-map.png") no-repeat center center; background-size: 100%;">
                        <address>
                            Schaapsdrift 76<br>
                            6824GT, Arnhem<br>
                        </address>
                        <abbr title="Phone Number"><strong>Phone 1:</strong></abbr> +31 6 5359 22 11<br>
                        <abbr title="Phone Number"><strong>Phone 2:</strong></abbr> +31 6 8117 69 49<br>
                        <abbr title="Email Address"><strong>Email:</strong></abbr> commothnet@gmail.com
                    </div>

                </div>

                <div class="col_one_third col_last">
                    <div class="widget clearfix" style="margin-bottom: -20px;">
                        <div class="row">
                            <div class="col-md-6 clearfix bottommargin-sm">
                                <a href="http://www.facebook.com/commoth/" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>
                                <a href="http://www.facebook.com/commoth/"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
                            </div>

                            <div class="col-md-6 clearfix bottommargin-sm">
                                <a href="http://twitter.com/CommothVOF" class="social-icon si-dark si-colored si-twitter nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>
                                <a href="http://twitter.com/CommothVOF"><small style="display: block; margin-top: 3px;"><strong>Follow us</strong><br>on Twitter</small></a>
                            </div>

                            <div class="col-md-6 clearfix bottommargin-sm">
                                <a href="#" class="social-icon si-dark si-colored si-linkedin nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-linkedin"></i>
                                    <i class="icon-linkedin"></i>
                                </a>
                                <a href="#"><small style="display: block; margin-top: 3px;"><strong>Follow us</strong><br>on LinkedIn</small></a>
                            </div>

                            <div class="col-md-6 clearfix bottommargin-sm">
                                <a href="#" class="social-icon si-dark si-colored si-github nobottommargin" style="margin-right: 10px;">
                                    <i class="icon-github"></i>
                                    <i class="icon-github"></i>
                                </a>
                                <a href="#"><small style="display: block; margin-top: 3px;"><strong>Follow us</strong><br>on Github</small></a>
                          </div>
                        </div>
                   </div>
                </div>
            </div><!-- .footer-widgets-wrap end -->
        </div>

        <!-- Copyrights
        ============================================= -->
        <div id="copyrights">
            <div class="container clearfix">
                <div class="col_half">
                    Copyrights &copy; <?php echo date(\'Y\'); ?> All Rights Reserved by Commoth VOF.<br>
                    <!--<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>-->
                </div>
                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        <a href="http://www.facebook.com/commoth/" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="http://twitter.com/CommothVOF" class="social-icon si-small si-borderless si-twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>
                    </div>
                    <div class="clear"></div>
                    <i class="icon-envelope2"></i> commothnet@gmail.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +31 6 5359 22 11 <span class="middot">&middot;</span> <i class="icon-headphones"></i> +31 6 8117 69 49
                </div>
           </div>
        </div><!-- #copyrights end -->
    </footer><!-- #footer end -->
</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="\' . Config::$public_dir . \'js/functions.js"></script>';
    }


}