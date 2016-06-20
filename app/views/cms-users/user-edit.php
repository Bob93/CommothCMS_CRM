<section id="content">

        <div class="container clearfix">

            <div class="row">

                <div class="col-md-12 bottommargin">

                    <div class="col_full bottommargin-lg clearfix">

                        <div class="fancy-title title-border center">
                            <h3>Edit User</h3>
                        </div>

                        <div class="col-md-12 nobottommargin">

                            <h3>Personal Details</h3>

                            <form id="edit-form" name="edit-form" class="nobottommargin" action="" method="post">

                                <?php foreach($data['users'] as $item)
                                {?>
                                <div class="col_half">
                                    <label for="edit-form-firstname">First Name:</label>
                                    <input type="text" id="edit-form-firstname" name="firstname" value="<?php echo $item['FirstName']; ?>" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="edit-form-insertion">Insertion:</label>
                                    <input type="text" id="edit-form-insertion" name="insertion" value="<?php echo $item['Insertion']; ?>" class="form-control" />
                                </div>

                                <div class="col_half">
                                    <label for="edit-form-lastname">Last Name:</label>
                                    <input type="text" id="edit-form-lastname" name="lastname" value="<?php echo $item['Lastname']; ?>" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="edit-form-email">Email Address:</label>
                                    <input type="text" id="edit-form-email" name="email" value="<?php echo $item['Email']; ?>" class="form-control" />
                                </div>

                                <div class="col_half">
                                    <label for="edit-form-country">Country:</label>
                                    <input type="text" id="edit-form-country" name="country" value="<?php echo $item['Country']; ?>" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="edit-form-address">Address:</label>
                                    <input type="text" id="edit-form-address" name="address" value="<?php echo $item['Address']; ?>" class="form-control" />
                                </div>

                                <div class="col_half">
                                    <label for="edit-form-phone">Phone:</label>
                                    <input type="text" id="edit-form-phone" name="phone" value="<?php echo '0' . $item['Phone']; ?>" class="form-control" />
                                </div>

                                <div class="line"></div>
                                <div class="clear"></div>

                                <h3>Account Details</h3>

                                <div class="col_half">
                                    <label for="edit-form-username">Choose a Username:</label>
                                    <input type="text" id="edit-form-username" name="username" value="<?php echo $item['Username']; ?>" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="edit-form-rights">Rights:</label>
                                    <input type="text" id="edit-form-rights" name="rights" value="<?php echo $item['Rights']; ?>" class="form-control" />
                                </div>

                                <div class="clear"></div>

                                <div class="col_half">
                                    <label for="edit-form-password">Choose Password:</label>
                                    <input type="password" id="edit-form-password" name="password" value="<?php echo $item['Password']; ?>" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="edit-form-repassword">Re-enter Password:</label>
                                    <input type="password" id="edit-form-repassword" name="repassword" value="<?php echo $item['Password']; ?>" class="form-control" />
                                </div>

                                <div class="col_half">
                                    <label for="edit-form-active">Active:</label>
                                    <input type="text" id="edit-form-active" name="active" value="<?php echo $item['Active']; ?>" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="edit-form-bantime">Ban Time:</label>
                                    <input type="text" id="edit-form-bantime" name="bantime" value="<?php echo $item['BanTime']; ?>" class="form-control" />
                                </div>
                                <?php } ?>

                                <div class="clear"></div>

                                <div class="col_full nobottommargin center">
                                    <button class="button button-desc button-3d button-rounded button-green center" id="edit-form-submit" name="submit" value="edit" type="submit">Update User</button>
                                </div>



                            </form></div>

                        <div class="clear"></div>

                    </div>

                </div>

            </div>

        </div>

</section><!-- #content end -->