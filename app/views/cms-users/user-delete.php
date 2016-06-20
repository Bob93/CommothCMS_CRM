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
                            <td><a href=\"/CommothCMS_CRM/public/cms/user_delete/".$user['UserID']."\" class=\"button button-3d button-mini button-rounded button-amber\">Delete</a></td>
                        </tr>
                       ";
                    }
                ?>
                </tbody>
            </table>

            <div class="center">
                <ul class="pagination">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>

    </div>

</section><!-- #content end -->