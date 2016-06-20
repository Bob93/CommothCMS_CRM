<section id="content">

        <div class="container clearfix">

            <div class="fancy-title title-border center">
                <h3>Delete Users</h3>
            </div>
            <p class="text-center" style="margin-top: -20px;">Remember that actions here can <b>NOT</b> be undone.</p>

            <table class="table table-hover table-no-padding">
                <thead>
                <tr>
                    <th>UserID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Register Date</th>
                    <th>Rights</th>
                    <th>Modify</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    // alle data dat binnenkomt selecteren en laten zien wat wij willen laten zien. Verder het ID ophalen in de url.
                    foreach($data['users'] as $user)
                    {
                       echo "
                        <tr>
                            <td>" . $user['UserID'] . "</td>
                            <td>" . $user['Username'] . "</td>
                            <td>" . $user['FirstName'] . ' ' . $user['Insertion'] . ' ' . $user['Lastname'] . "</td>
                            <td>" . $user['DateSignedUp'] . "</td>
                            <td>" . $user['Rights'] . "</td>
                            <td><a href=\"" . $this->public_dir . "user_delete/0/". $user['UserID']."\" class=\"button button-3d button-mini button-rounded button-amber\">Delete</a></td>
                        </tr>
                       ";
                    }
                ?>
                </tbody>
            </table>

            <div class="center">
                <ul class="pagination">
                    <?php

                    $usercount = $data['count'];
                    $pagecount = $usercount / 10;
                    for($i = 0; $i <= $pagecount;$i++){
                        echo '<li><a href="'.$this->public_dir.'user_delete/'.$i.'">'.($i + 1).'</a></li>';
                    }


                    ?>
                </ul>
            </div>

    </div>

</section><!-- #content end -->