<?php
var_dump($data['users']);

foreach($data['users'] as $item) {
    echo $item['FirstName'];
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
                                <input type="text" id="suspend-form-userid" name="suspend-form-userid" value="<?php echo $item['UserID']; ?>" class="form-control center" disabled />
                            </div>

                            <div class="col_full center">
                                <label for="suspend-form-username">Username:</label>
                                <input type="text" id="suspend-form-username" name="suspend-form-username" value="<?php echo $item['Username']; ?>" class="form-control center" />
                            </div>

                            <div class="col_full center">
                                <label for="suspend-form-time">Time:</label>
                                <input type="text" id="suspend-form-time" name="suspend-form-time" value="" class="form-control center" />
                            </div>

                            <div class="col_full center">
                                <label for="suspend-form-reason">Reason:</label>
                                <input type="textarea" id="suspend-form-reason" name="suspend-form-reason" value="<?php echo $item['FirstName']; ?>" class="form-control center"  />
                            </div>

                            <div class="col_full center">
                                <label for="suspend-form-ipban">IP Address Ban:</label>
                                <input type="checkbox" id="suspend-form-ipban" name="suspend-form-ipban" value="" class="form-control center" style="box-shadow: none!important" />
                            </div>

                            <div class="col_full center">
                                <button class="button button-desc button-3d button-rounded button-red center" id="register-form-submit" name="register-form-submit" value="register">Ban User</button>
                            </div>
                            <?php } ?>

                        <div class="clear"></div>

                    </div>

                </div>

            </div>

</section><!-- #content end -->