<?php

if(isset($_POST['edit-form-submit'])) {

    $firstname = $_POST['edit-form-firstname'];
    $insertion = $_POST['edit-form-insertion'];
    $lastname = $_POST['edit-form-lastname'];
    $username = $_POST['edit-form-username'];
    $password = $_POST['edit-form-password'];
    $redo_password = $_POST['edit-form-repassword'];
    $phone = $_POST['edit-form-phone'];
    $address = $_POST['edit-form-address'];
    $country = $_POST['edit-form-country'];
    $email = $_POST['edit-form-email'];
    $active = $_POST['edit-form-active'];
    $rights = $_POST['edit-form-rights'];
    $bantime = $_POST['edit-form-bantime'];


    if ((empty($username)) && (empty($password) && (empty($firstname)) && (empty($lastname))))
    {
        echo '<div class="container clearfix"><div class="alert alert-danger center nobottommargin">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon-remove-sign"></i><strong>Oh snap!</strong> Some fields are not (correctly) filled in.
	    </div></div>';
    } elseif ($data['user']->checkPassword($password, $redo_password) == false) {
        echo '<div class="container clearfix"><div class="alert alert-danger center nobottommargin">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon-remove-sign"></i><strong>Oh snap!</strong> Passwords do not match.
	</div></div>';
    } else
    {
        if ($data['user']->updateUser($data['UserID'], $firstname, $insertion, $lastname, $username, $password, $phone, $address, $country, $email,
                $rights,  $active, $bantime) == true)
        {
            echo '<div class="container clearfix"><div class="alert alert-success center nobottommargin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon-gift"></i><strong>Well done!</strong> You successfully edited the user " ' . $username . '".
            </div></div>';
        }
    }
}

?>
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
                                    <input type="text" id="edit-form-firstname" name="edit-form-firstname" value="<?php echo $item['FirstName']; ?>" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="edit-form-insertion">Insertion:</label>
                                    <input type="text" id="edit-form-insertion" name="edit-form-insertion" value="<?php echo $item['Insertion']; ?>" class="form-control" />
                                </div>

                                <div class="col_half">
                                    <label for="edit-form-lastname">Last Name:</label>
                                    <input type="text" id="edit-form-lastname" name="edit-form-lastname" value="<?php echo $item['Lastname']; ?>" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="edit-form-email">Email Address:</label>
                                    <input type="text" id="edit-form-email" name="edit-form-email" value="<?php echo $item['Email']; ?>" class="form-control" />
                                </div>

                                <div class="col_half">
                                    <label for="edit-form-country">Country:</label>
                                    <input type="text" id="edit-form-country" name="edit-form-country" value="<?php echo $item['Country']; ?>" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="edit-form-address">Address:</label>
                                    <input type="text" id="edit-form-address" name="edit-form-address" value="<?php echo $item['Address']; ?>" class="form-control" />
                                </div>

                                <div class="col_half">
                                    <label for="edit-form-phone">Phone:</label>
                                    <input type="text" id="edit-form-phone" name="edit-form-phone" value="<?php echo '0' . $item['Phone']; ?>" class="form-control" />
                                </div>

                                <div class="line"></div>
                                <div class="clear"></div>

                                <h3>Account Details</h3>

                                <div class="col_half">
                                    <label for="edit-form-username">Choose a Username:</label>
                                    <input type="text" id="edit-form-username" name="edit-form-username" value="<?php echo $item['Username']; ?>" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="edit-form-rights">Rights:</label>
                                    <input type="text" id="edit-form-rights" name="edit-form-rights" value="<?php echo $item['Rights']; ?>" class="form-control" />
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
                                    <input type="text" id="edit-form-active" name="edit-form-active" value="<?php echo $item['Active']; ?>" class="form-control" />
                                </div>

                                <div class="col_half col_last">
                                    <label for="edit-form-bantime">Banned:</label>
                                    <input type="text" id="edit-form-bantime" name="edit-form-bantime" value="<?php echo $item['RegularBan']; ?>" class="form-control" />
                                </div>
                                <?php } ?>

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