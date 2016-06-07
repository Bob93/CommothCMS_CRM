<?php
/**
 * Created by PhpStorm.
 * User: Tijs
 * Date: 24-5-2016
 * Time: 12:57
 */
/* niet dingen echo'en in de controller maar in de view */

class Home extends Controller {
    public $public_dir = "/COMMOTH CO-1.0/website/CommothCMS_CRM/public/";

    public function index($name = '', $otherName = '') {
        $user =  $this->model('User');
        //echo $user->name;

        $this->view('defaults/header');
        $this->view('home/index', [ 'name'=> $user->name]);
        $this->view('defaults/footer');
}

    public function contact() {
        //if(isset($_POST['email'])){
            //Test deze informatie wordt gepushed naar de view:
            $user =  $this->model('User');

            $this->view('defaults/header');
            //De informatie wordt hier gepushed naar de view.
            $this->view('home/contact', [ 'name'=> $user->name]);
            $this->view('defaults/footer');
        //}
    }

    public function portfolio() {
        //if(isset($_POST['email'])){
        //Test deze informatie wordt gepushed naar de view:
        $user =  $this->model('User');

        $this->view('defaults/header');
        //De informatie wordt hier gepushed naar de view.
        $this->view('home/portfolio', [ 'name'=> $user->name]);
        $this->view('defaults/footer');
        //}
    }

    public function aboutus() {
        //if(isset($_POST['email'])){
        //Test deze informatie wordt gepushed naar de view:
        $user =  $this->model('User');

        $this->view('defaults/header');
        //De informatie wordt hier gepushed naar de view.
        $this->view('home/aboutus', [ 'name'=> $user->name]);
        $this->view('defaults/footer');
        //}
    }

    public function test() {
        echo 'home/test';

        $userm = $this->model('user');
        $userm->getUserById(3);
        echo $userm->name;
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