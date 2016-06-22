<?php

if(isset($_POST['suspend-form-submit'])) {
    $id = $_POST['suspend-form-id'];
    $username = $_POST['suspend-form-username'];
    if(isset($_POST['suspend-form-forever'])) {
        $bantime = "0000-00-00 00:00:00";
    } else {
        $bantime = $_POST['suspend-form-time'];
    }
    $reason = $_POST['suspend-form-reason'];
    if(isset($_POST['suspend-form-ipban'])) {
        $ipban = $_POST['suspend-form-ipban'];
    }

    if ((empty($username)) || (empty($bantime) || (empty($reason)))) {
        echo '<div class="container clearfix"><div class="alert alert-danger center nobottommargin">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon-remove-sign"></i><strong>Oh snap!</strong> Some fields are not (correctly) filled in.
	    </div></div>';
    } elseif ($data['user']->checkIfUserSuspended($id) == true) {
        echo '<div class="container clearfix"><div class="alert alert-danger center nobottommargin">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon-remove-sign"></i><strong>Oh snap!</strong> This user has already been banned.
	    </div></div>';
    } else if (isset($_POST['suspend-form-ipban']) && $data['user']->suspendUser($id, $reason, $bantime, $ipban = true) == true) {
        echo '<div class="container clearfix"><div class="alert alert-success center nobottommargin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon-gift"></i><strong>Well done!</strong> You successfully IP banned the user " ' . $username . '".
            </div></div>';
    } else if ($data['user']->suspendUser($id, $reason, $bantime) == true) {
        echo '<div class="container clearfix"><div class="alert alert-success center nobottommargin">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon-gift"></i><strong>Well done!</strong> You successfully banned the user " ' . $username . '".
            </div></div>';
    }
}

?>

<section id="content">

        <div class="container clearfix">

            <div class="row">

                    <div class="col_full nobottommargin">

                        <div class="fancy-title title-border center">
                            <h3>Suspend User</h3>
                        </div>
                        <?php
                        foreach($data['users'] as $item) {
                        ?>
                        <form id="suspend-form" name="suspend-form" class="nobottommargin center" action="#" method="post">

                            <div class="col_full center">
                                <label for="suspend-form-userid">UserID:</label>
                                <input type="text" id="suspend-form-id" name="suspend-form-id" value="<?php echo $item['UserID']; ?>" class="form-control center" readonly />
                            </div>

                            <div class="col_full center">
                                <label for="suspend-form-username">Username:</label>
                                <input type="text" id="suspend-form-username" name="suspend-form-username" value="<?php echo $item['Username']; ?>" class="form-control center" />
                            </div>

                            <div class="col_full center">
                                <label for="suspend-form-time">Ban Duration:</label>
                                <input type="datetime-local" name="suspend-form-time" id="suspend-form-time" class="form-control center">
                            </div>

                            <div class="col_full center">
                                <label for="suspend-form-forever">Forever:</label>
                                <input type="checkbox" id="suspend-form-forever" name="suspend-form-forever" value="" class="form-control center" style="box-shadow: none!important" />
                            </div>

                            <div class="col_full center">
                                <label for="suspend-form-reason">Reason:</label>
                                <textarea id="suspend-form-reason" name="suspend-form-reason" placeholder="Reason for banning this user." class="form-control text-area center" rows="4" cols="50"  /></textarea>
                            </div>

                            <div class="col_full center">
                                <label for="suspend-form-ipban">IP Address Ban:</label>
                                <input type="checkbox" id="suspend-form-ipban" name="suspend-form-ipban" value="" class="form-control center" style="box-shadow: none!important" />
                            </div>

                            <div class="col_full center">
                                <button class="button button-desc button-3d button-rounded button-red center" id="suspend-form-submit" name="suspend-form-submit" value="register">Ban User</button>
                            </div>
                            <?php } ?>

                        <div class="clear"></div>

                    </div>

                </div>

            </div>

</section><!-- #content end -->