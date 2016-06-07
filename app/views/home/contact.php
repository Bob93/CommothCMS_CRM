<section id="page-title">

    <div class="container clearfix">
        <h1>Contact</h1>
				<span>	Om met ons in contact te komen kunt u altijd naar ons mailen: commothnet@gmail.com.<br>
					U kunt ook altijd in contact met ons komen met het onderstaand contact formulier.</span>
        <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">Contact</li>
        </ol>
    </div>

</section><!-- #page-title end -->

<!-- Google Map
============================================= -->
<section id="google-map" class="gmap slider-parallax"></section>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="<?php echo $this->public_dir ?>js/jquery.gmap.js"></script>

<script type="text/javascript">

    $('#google-map').gMap({

        address: 'Arnhem, Netherlands',
        maptype: 'ROADMAP',
        zoom: 14,
        markers: [
            {
                address: "Arnhem, Netherlands",
                html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Hallo, wij zijn <span>Commoth</span></h4><p class="nobottommargin">Our mission is to help people to <strong>earn</strong> and to <strong>learn</strong> online. We operate <strong>marketplaces</strong> where hundreds of thousands of people buy and sell digital goods every day, and a network of educational blogs where millions learn <strong>creative skills</strong>.</p></div>',
                icon: {
                    image: "images/icons/map-icon-red.png",
                    iconsize: [32, 39],
                    iconanchor: [13,39]
                }
            }
        ],
        doubleclickzoom: false,
        controls: {
            panControl: true,
            zoomControl: true,
            mapTypeControl: true,
            scaleControl: false,
            streetViewControl: false,
            overviewMapControl: false
        }

    });

</script><!-- Google Map End -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Postcontent
            ============================================= -->
            <div class="postcontent nobottommargin">

                <h3>Stuur ons een e-mail</h3>

                <div id="contact-form-result" data-notify-type="success" data-notify-msg="<i class=icon-ok-sign></i> Message Sent Successfully!"></div>

                <form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">

                    <div class="form-process"></div>

                    <div class="col_one_third">
                        <label for="template-contactform-name">Naam <small>*</small></label>
                        <input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
                    </div>

                    <div class="col_one_third">
                        <label for="template-contactform-email">E-mail <small>*</small></label>
                        <input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
                    </div>

                    <div class="col_one_third col_last">
                        <label for="template-contactform-phone">Telefoon</label>
                        <input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
                    </div>

                    <div class="clear"></div>

                    <div class="col_two_third">
                        <label for="template-contactform-subject">Onderwerp <small>*</small></label>
                        <input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="required sm-form-control" />
                    </div>

                    <div class="col_one_third col_last">
                        <label for="template-contactform-service">Service</label>
                        <select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
                            <option value="">-- Selecteer --</option>
                            <option value="PHP / MySQL">PHP / MySQL</option>
                            <option value="HTML5 / CSS3">HTML5 / CSS3</option>
                            <option value="Graphic Design">Graphic Design</option>
                        </select>
                    </div>

                    <div class="clear"></div>

                    <div class="col_full">
                        <label for="template-contactform-message">Reactie <small>*</small></label>
                        <textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
                    </div>

                    <div class="col_full hidden">
                        <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
                    </div>

                    <div class="col_full">
                        <button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Send Message</button>
                    </div>

                </form>

                <script type="text/javascript">

                    $("#template-contactform").validate({
                        submitHandler: function(form) {
                            $('.form-process').fadeIn();
                            $(form).ajaxSubmit({
                                target: '#contact-form-result',
                                success: function() {
                                    $('.form-process').fadeOut();
                                    $(form).find('.sm-form-control').val('');
                                    $('#contact-form-result').attr('data-notify-msg', $('#contact-form-result').html()).html('');
                                    SEMICOLON.widget.notifications($('#contact-form-result'));
                                }
                            });
                        }
                    });

                </script>

            </div><!-- .postcontent end -->

            <!-- Sidebar
            ============================================= -->
            <div class="sidebar col_last nobottommargin">

                <address>
                    Schaapsdrift 76<br>
                    6824GT, Arnhem<br>
                </address>
                <abbr title="Phone Number"><strong>Phone 1:</strong></abbr> +31 6 5359 22 11<br>
                <abbr title="Phone Number"><strong>Phone 2:</strong></abbr> +31 6 8117 69 49<br>
                <abbr title="Email Address"><strong>E-mail:</strong></abbr> commothnet@gmail.com

                <div class="widget noborder notoppadding">

                    <a href="http://www.facebook.com/commoth/" class="social-icon si-small si-dark si-facebook">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                    </a>

                    <a href="http://twitter.com/CommothVOF" class="social-icon si-small si-dark si-twitter">
                        <i class="icon-twitter"></i>
                        <i class="icon-twitter"></i>
                    </a>

                </div>

            </div><!-- .sidebar end -->

        </div>

    </div>

</section><!-- #content end -->