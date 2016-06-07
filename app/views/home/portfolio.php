<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="heading-block nobottomborder center">
                <h1>Hallo! Wij zijn een in <span>Arnhem</span> gesticht web bedrijf</h1>
						<span>	Om een beeld te krijgen bij onze projecten waar wij aan hebben gewerkt, staan hier de projecten met een korte uitleg erbij.<br>
							Wij hebben tot nu toe voornamelijk gewerkt aan informatieve websites en webwinkels.</span>
            </div>

            <div class="clear"></div>

            <!-- Portfolio Items
            ============================================= -->
            <div id="portfolio" class="portfolio-margin portfolio-ajax clearfix">

                <article id="portfolio-item-1" data-loader="<?php echo $this->public_dir ?>include/ajax/portfolio-ajax-image.php" class="portfolio-item pf-media pf-icons">
                    <div class="portfolio-image">
                        <a href="portfolio-single.php">
                            <img src="<?php echo $this->public_dir ?>images/portfolio/vandenbrand.png" alt="Open Imagination">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="pages/vandenbrand-portfolio.php"><i class="icon-line-expand"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single.php">VANDENBRANDADVIES.NL</a></h3>
                        <span>CSS, HTML & JS</span>
                    </div>
                </article>

                <article id="portfolio-item-2" data-loader="<?php echo $this->public_dir ?>include/ajax/portfolio-ajax-image.php" class="portfolio-item pf-media pf-icons">
                    <div class="portfolio-image">
                        <a href="portfolio-single.php">
                            <img src="<?php echo $this->public_dir ?>images/portfolio/wantedfashion.png" alt="Open Imagination">
                        </a>
                        <div class="portfolio-overlay">
                            <a href="pages/wantedfashion-portfolio.php"><i class="icon-line-expand"></i></a>
                        </div>
                    </div>
                    <div class="portfolio-desc">
                        <h3><a href="portfolio-single.php">VANDENBRANDADVIES.NL</a></h3>
                        <span>CSS, HTML & JS</span>
                    </div>
                </article>

            </div><!-- #portfolio end -->

            <!-- Portfolio Script
            ============================================= -->
            <script type="text/javascript">

                jQuery(window).load(function(){

                    var $container = $('#portfolio');

                    $container.isotope({ transitionDuration: '0.65s' });

                    $(window).resize(function() {
                        $container.isotope('layout');
                    });

                });

            </script><!-- Portfolio Script End -->

        </div>

    </div>

</section><!-- #content end -->