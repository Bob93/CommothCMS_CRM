<section id="content">

    <div class="container clearfix">

        <div class="row">

            <div class="col-md-12 bottommargin">

                <div class="col_full bottommargin-lg clearfix">

                    <div class="fancy-title title-border center">
                        <h3>Create Page</h3>
                    </div>

                    <div class="col-md-12 nobottommargin">

                        <h3>Page Credentials</h3>

                        <form id="create-pages-form" name="create-pages-form" class="nobottommargin" action="" method="post">

                                <div class="col_half">
                                    <label for="create-pages-title">Page Title:</label>
                                    <input type="text" id="create-pages-title" name="create-pages-title" value="" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="create-pages-template">Page Template:</label>
                                    <select id="create-pages-template" name="create-pages-template" class="sm-form-control">
                                        <option value="">-- Select One --</option>
                                        <option value="Index">Index</option>
                                        <option value="Tour">Tour</option>
                                        <option value="Aboutus">About Us</option>
                                        <option value="Contact">Contact</option>
                                        <option value="Portfolio">Portfolio</option>
                                    </select>
                                </div>

                            <script>
                                $("select#create-pages-template").on('change', function() {
                                    var template = '';

                                    switch (this.value) {
                                        case "Index":
                                            template = '<h3>Index Page Details</h3>" +
                                                "<div class=\"col_full\">" +
                                                "<label for=\"create-pages-pageid\">PageID:</label>" +
                                                "<input type=\"text\" id=\"create-pages-pageid\" name=\"create-pages-pageid\" value=\"\" class=\"form-control\" readonly />" +
                                                "</div>" + "<div class=\"col_half\">" +
                                                "<label for=\"edit-form-username\">Username:</label>" +
                                                "<input type=\"text\" id=\"edit-form-username\" name=\"edit-form-username\" value=\"\" class=\"form-control\" />" +
                                                 "</div>;
                                            break;

                                        case 'Aboutus':
                                            template = 4;
                                            break;

                                        case '3':
                                            template = 5;
                                            break;

                                        case '4':
                                            template = 6;
                                            break;
                                    }

                                    $("div#page_details").html(template);

                                    });
                            </script>

                                <div class="col_half">
                                    <label for="create-pages-menu">Menu Items:</label>
                                    <input type="text" id="create-pages-menu" name="create-pages-menu" value="" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="create-pages-submenu">Sub Menu (from):</label>
                                    <select id="create-pages-submenu" name="create-pages-submenu" class="sm-form-control">
                                        <option value="">-- Select One --</option>
                                        <option value="Index">Index</option>
                                    </select>
                                </div>

                                <div class="line"></div>
                                <div class="clear"></div>

                                <div id="page_details">
                                <h3>Page Details</h3>

                                <div class="col_full">
                                    <label for="create-pages-pageid">PageID:</label>
                                    <input type="text" id="create-pages-pageid" name="create-pages-pageid" value="" class="form-control" readonly />
                                </div>

                                <div class="col_half">
                                    <label for="edit-form-username">Username:</label>
                                    <input type="text" id="edit-form-username" name="edit-form-username" value="" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="edit-form-rights">Rights:</label>
                                    <input type="text" id="edit-form-rights" name="edit-form-rights" value="" class="form-control" />
                                </div>

                                <div class="clear"></div>

                                <div class="col_half">
                                    <label for="edit-form-password">Choose Password:</label>
                                    <input type="password" id="edit-form-password" name="edit-form-password" placeholder="Password" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="edit-form-repassword">Re-enter Password:</label>
                                    <input type="password" id="edit-form-repassword" name="edit-form-repassword" placeholder="Retype Password" class="form-control" />
                                </div>

                                <div class="col_half">
                                    <label for="edit-form-active">Active:</label>
                                    <input type="text" id="edit-form-active" name="edit-form-active" value="" class="form-control" />
                                </div>
                            </div>


                            <div class="clear"></div>

                            <div class="col_full nobottommargin center">
                                <button class="button button-desc button-3d button-rounded button-green center" id="edit-form-submit" name="edit-form-submit" value="edit" type="submit">Update User</button>
                            </div>



                        </form></div>

                    <div class="clear"></div>

                </div>

            </div>

        </div>

    </div>

</section><!-- #content end -->