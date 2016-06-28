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

    if(($data['bandata'][0]['Active']) >= 1) {
        $bantime = $_POST['suspend-form-time'];

        if (strtotime($bantime) < strtotime('now') || $bantime == null) {
            $bantime = "0-00-0000 00:00:00";
        }

        $reason = $_POST['edit-form-banreason'];
        $bannedip = $_POST['edit-form-bannedip'];
        $isuseripbanned = $_POST['edit-form-ipban'];
        $isuserbanned = $_POST['edit-form-regban'];

    }


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
                $rights,  $active) == true) {
            if(($data['bandata'][0]['Active']) >= 1) {

                $data['user']-> updateSespension($data['UserID'], $reason, $bantime, $isuseripbanned , $isuserbanned);
                //hier moet naar gekeken worden gegevens worden pas na tweede refresh correct geladen.
                //Waarschijnlijk omdat gegevens van de user eerst worden ingeladen voordat ze bewerkt worden.

                echo '<div class="container clearfix"><div class="alert alert-success center nobottommargin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon-gift"></i><strong>Well done!</strong> You successfully edited the user " ' . $username . '".
             and the suspension regarding him.</div></div>';
            } else {

                echo '<div class="container clearfix"><div class="alert alert-success center nobottommargin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon-gift"></i><strong>Well done!</strong> You successfully edited the user " ' . $username . '".
            </div></div>';
            }
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

                                <div class="col_full">
                                    <label for="edit-form-username">UserID:</label>
                                    <input type="text" id="edit-form-userid" name="edit-form-userid" value="<?php echo $item['UserID']; ?>" class="form-control" readonly />
                                </div>

                                <div class="col_half">
                                    <label for="edit-form-username">Username:</label>
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

                                    <?php
                                    if($item['RegularBan'] == 1 || $item['IPBanned'] == 1) {
                                        echo '<div class="clear"></div>
                                             <h3 style="color:red;">Account Banned</h3>
                                             <div class="col_half">
                                            <label for="edit-form-regban">Banned [Bans Table: ' . (($data['bandata'][0]['BanID']) ? 'Yes' : 'No') . ']</label>
                                            <input type="text" id="edit-form-regban" name="edit-form-regban" value="' . $item["RegularBan"] . '" class="form-control" />
                                            </div>

                                            <div class="col_half col_last">
                                            <label for="edit-form-ipban">IP Banned [Bans Table: ' . (($data['bandata'][0]['IPBan']) ? 'Yes' : 'No') . ']:</label>
                                            <input type="text" id="edit-form-ipban" name="edit-form-ipban" value="' . $item["IPBanned"] . '" class="form-control" />
                                            </div>
                                            
                                            <div class="col_full">
                                            <label for="edit-form-bannedip">Banned IP(s):</label>
                                            <input type="text" id="edit-form-bannedip" name="edit-form-bannedip" value="' . $data['bandata'][0]['BannedIPAddress'] . '" class="form-control" />
                                            </div>
                                           
                                            <div class="col_half">
                                            <label for="edit-form-banreason">Ban Reason:</label>
                                            <textarea id="edit-form-banreason" name="edit-form-banreason" class="form-control text-area" rows="5" cols="50"  />' . $data['bandata'][0]['BanReason'] . '</textarea>
                                            </div>
                                           
                                            <div class="col_half col_last">
                                            <label for="edit-form-bantime">Time of Ban:</label>
                                            <input type="text" id="edit-form-bantime" name="edit-form-bantime" value="' . $data['bandata'][0]['BanTime'] . '" class="form-control" readonly />
                                            </div>
                                            
                                            <div class="col_half col_last">
                                            <label for="edit-form-duration">Banned Till:</label>
                                            <input type="datetime-local" name="suspend-form-time" id="suspend-form-time" class="form-control center" value="' . DateTime::createFromFormat('Y-m-d H:i:s', $data['bandata'][0]['BanDuration'])->format('Y-m-d\TH:i:s') . '">
                                            </div>
                                 
                                         
                                            ';





                                    }
                                } ?>

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