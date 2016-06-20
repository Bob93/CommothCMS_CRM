<?php

if(isset($_POST['register-form-submit'])) {

    $firstname = $_POST['register-form-firstname'];
    $insertion = $_POST['register-form-insertion'];
    $lastname = $_POST['register-form-lastname'];
    $username = $_POST['register-form-username'];
    $password = $_POST['register-form-password'];
    $redo_password = $_POST['register-form-repassword'];
    $phone = $_POST['register-form-phone'];
    $address = $_POST['register-form-address'];
    $country = $_POST['register-form-country'];
    $email = $_POST['register-form-email'];

    if ((empty($username)) && (empty($password) && (empty($firstname)) && (empty($lastname)))) {
        echo '<div class="container clearfix"><div class="alert alert-danger center nobottommargin">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon-remove-sign"></i><strong>Oh snap!</strong> Some fields are not (correctly) filled in.
	</div></div>';
    } elseif ($data['users']->checkUsername($username) == false) {
        echo '<div class="container clearfix"><div class="alert alert-danger center nobottommargin">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon-remove-sign"></i><strong>Oh snap!</strong> Username already exists in the database.
	</div></div>';
    } elseif ($data['users']->checkPassword($password, $redo_password) == false) {
        echo '<div class="container clearfix"><div class="alert alert-danger center nobottommargin">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon-remove-sign"></i><strong>Oh snap!</strong> Passwords do not match.
	</div></div>';
    } else {
        if ($data['users']->createUser($firstname, $insertion, $lastname, $username, $password, $phone, $address, $country, $email) == true) {
            echo '<div class="container clearfix"><div class="alert alert-success center nobottommargin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon-gift"></i><strong>Well done!</strong> You successfully created the user " ' . $username . '".
            </div></div>';
        }
    }
}

?>
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="fancy-title title-border center">
                <h3>Create User</h3>
            </div>

            <div class="col_full nobottommargin">

                <h3>Personal Details</h3>

                <form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">

                    <div class="col_half">
                        <label for="register-form-firstname">First Name:</label>
                        <input type="text" id="register-form-firstname" name="register-form-firstname" value="" class="form-control" />
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-insertion">Insertion:</label>
                        <input type="text" id="register-form-insertion" name="register-form-insertion" value="" class="form-control" />
                    </div>

                    <div class="col_half">
                        <label for="register-form-lastname">Last Name:</label>
                        <input type="text" id="register-form-lastname" name="register-form-lastname" value="" class="form-control" />
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-email">Email Address:</label>
                        <input type="text" id="register-form-email" name="register-form-email" value="" class="form-control" />
                    </div>

                    <div class="col_half">
                        <label for="register-form-country">Country:</label>
                        <input type="text" id="register-form-country" name="register-form-country" value="" class="form-control" />
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-address">Address:</label>
                        <input type="text" id="register-form-address" name="register-form-address" value="" class="form-control" />
                    </div>

                    <div class="col_half">
                        <label for="register-form-phone">Phone:</label>
                        <input type="text" id="register-form-phone" name="register-form-phone" value="" class="form-control" />
                    </div>

                    <div class="line"></div>
                    <div class="clear"></div>

                    <h3>Account Details</h3>

                    <div class="col_half">
                        <label for="register-form-username">Choose a Username:</label>
                        <input type="text" id="register-form-username" name="register-form-username" value="" class="form-control" />
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-rights">Rights:</label>
                        <input type="text" id="register-form-rights" name="register-form-rights" value="" class="form-control" />
                    </div>

                    <div class="clear"></div>

                    <div class="col_half">
                        <label for="register-form-password">Choose Password:</label>
                        <input type="password" id="register-form-password" name="register-form-password" value="" class="form-control" />
                    </div>

                    <div class="col_half col_last">
                        <label for="register-form-repassword">Re-enter Password:</label>
                        <input type="password" id="register-form-repassword" name="register-form-repassword" value="" class="form-control" />
                    </div>

                    <div class="col_half">
                        <label for="register-form-active">Active:</label>
                        <input type="text" id="register-form-active" name="register-form-active" value="" class="form-control" />
                    </div>

                    <div class="clear"></div>

                    <div class="col_full nobottommargin center">
                        <button class="button button-desc button-3d button-rounded button-green center" id="register-form-submit" name="register-form-submit" value="register">Create User</button>
                    </div>



                </form></div>

                </div>

            </div>

        </div>

    </div>

</section><!-- #content end -->