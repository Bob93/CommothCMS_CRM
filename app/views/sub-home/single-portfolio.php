<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="../style.css" type="text/css" />
	<link rel="stylesheet" href="../css/dark.css" type="text/css" />
	<link rel="stylesheet" href="../css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="../css/animate.css" type="text/css" />
	<link rel="stylesheet" href="../css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="../css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/plugins.js"></script>

	<!-- Document Title
	============================================= -->
	<title>Portfolio Single - Commoth VOF</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.php" class="standard-logo" data-dark-logo="../images/commoth-logo.png"><img src="../images/commoth-logo.png" alt="Commoth Logo"></a>
						<a href="index.php" class="retina-logo" data-dark-logo="../images/logo-dark@2x.png"><img src="../images/logo@2x.png" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>
							<li><a href="index.php"><div>Home</div></a></li>
							<li class="current"><a href="portfolio.php"><div>Portfolio</div></a></li>
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

		</header><!-- #header end -->

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>vandenbrandadvies.nl</h1>
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li><a href="portfolio.php">Portfolio</a></li>
					<li class="active">Portfolio Single</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Portfolio Single Image
					============================================= -->
					<div class="col_two_third portfolio-single-image nobottommargin">
						<a href="#"><img src="../images/portfolio/vandenbrand-single.png" alt=""></a>
					</div><!-- .portfolio-single-image end -->

					<!-- Portfolio Single Content
					============================================= -->
					<div class="col_one_third portfolio-single-content col_last nobottommargin">

						<!-- Portfolio Single - Description
						============================================= -->
						<div class="fancy-title title-bottom-border">
							<h2>Project Info:</h2>
						</div>
						<p>Een informatieve website waar je alles kan vinden wat Van den Brand advies kan doen voor je als BHV voorlichter.</p>
						<p>Op deze website kan je de kwalificaties zien van de heer Van den Brand en kan ook contact met hem opnemen via de website.</p>
						<!-- Portfolio Single - Description End -->

						<div class="line"></div>

						<!-- Portfolio Single - Meta
						============================================= -->
						<ul class="portfolio-meta bottommargin">
							<li><span><i class="icon-user"></i>Created by:</span> Commoth VOF</li>
							<li><span><i class="icon-calendar3"></i>Completed on:</span> 17th March 2014</li>
							<li><span><i class="icon-lightbulb"></i>Skills:</span> HTML5 / PHP / CSS3</li>
							<li><span><i class="icon-link"></i>Client:</span> <a href="http://www.vandenbrandadvies.nl/">Van den Brand advies</a></li>
						</ul>
						<!-- Portfolio Single - Meta End -->

						<!-- Portfolio Single - Share
						============================================= -->
						<div class="si-share clearfix">
							<span>Share:</span>
							<div>
								<a href="#" class="social-icon si-borderless si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon si-borderless si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
							</div>
						</div>
						<!-- Portfolio Single - Share End -->

					</div><!-- .portfolio-single-content end -->

					<div class="clear"></div>

					<script type="text/javascript">

						jQuery(document).ready(function($) {

							var relatedPortfolio = $("#related-portfolio");

							relatedPortfolio.owlCarousel({
								margin: 20,
								nav: false,
								dots:true,
								autoplay: true,
								autoplayHoverPause: true,
								responsive:{
									0:{ items:1 },
									480:{ items:2 },
									768:{ items:3 },
									992: { items:4 }
								}
							});

						});

					</script>

				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">

					<div class="col_one_third">

						<div class="widget clearfix">

							<img src="../images/commoth-logo.png" alt="" class="footer-logo">

							<p>Wij geloven in  <strong>simpele</strong>, <strong>creatieve</strong> &amp; <strong>flexibele</strong> design standaarden.</p>

						</div>

					</div>

					<div class="col_one_third">

						<div style="background: url('../images/world-map.png') no-repeat center center; background-size: 100%;">
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
						Copyrights &copy; <?php echo date('Y'); ?> All Rights Reserved by Commoth VOF.<br>
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
	<script type="text/javascript" src="../js/functions.js"></script>

</body>
</html>