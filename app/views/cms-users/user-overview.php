<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="fancy-title title-border center">
                <h3>User Overview</h3>
            </div>

            <div class="col_half" id="lineChart" style="opacity: 0;">
                <h3 class="center">Website Visitors</h3>
                <canvas id="lineChartCanvas" width="547" height="300"></canvas>
            </div>

            <div class="col_half col_last" id="barChart" style="opacity: 0;">
                <h3 class="center">Registered Users</h3>
                <canvas id="barChartCanvas" width="547" height="300"></canvas>
            </div>

            <div class="clear"></div>

            <script type="text/javascript">

                jQuery(window).load( function(){
                    var lineChartData = {
                        labels : ["January","February","March","April","May","June","July"],
                        datasets : [
                            {
                                fillColor : "rgba(255,140,0,0.6)",
                                strokeColor : "rgba(220,220,220,1)",
                                pointColor : "rgba(220,220,220,1)",
                                pointStrokeColor : "#fff",
                                data : [65,59,90,81,56,55,40]
                            }
                        ]
                    };

                    var barChartData = {
                        labels : ["January","February","March","April","May","June","July"],
                        datasets : [
                            {
                                fillColor : "rgba(255,140,0,0.6",
                                strokeColor : "rgba(220,220,220,1)",
                                data : [65,59,90,81,56,55,50]
                            }
                        ]

                    };

                    var globalGraphSettings = {animation : Modernizr.canvas};

                    function showLineChart(){
                        var ctx = document.getElementById("lineChartCanvas").getContext("2d");
                        new Chart(ctx).Line(lineChartData,globalGraphSettings);
                    }

                    function showBarChart(){
                        var ctx = document.getElementById("barChartCanvas").getContext("2d");
                        new Chart(ctx).Bar(barChartData,globalGraphSettings);
                    }

                    $('#lineChart').appear( function(){ $(this).css({ opacity: 1 }); setTimeout(showLineChart,300); },{accX: 0, accY: -155},'easeInCubic');

                    $('#barChart').appear( function(){ $(this).css({ opacity: 1 }); setTimeout(showBarChart,300); },{accX: 0, accY: -155},'easeInCubic');

                });

            </script>

            <div class="fancy-title title-border center">
                <h3>All Users</h3>
            </div>

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
                    // Ophalen van alle gebruikers uit de database en die printen op de overview pagina.
                    foreach($data['users'] as $user)
                    {
                        echo "<tr>
                                <td>" . $user['UserID'] . "</td>
                                <td>" . $user['Username'] . "</td>
                                <td>" . $user['FirstName'] . ' ' . $user['Insertion'] . ' ' . $user['Lastname'] . "</td>
                                <td>" . $user['DateSignedUp'] . "</td>
                                <td>" . $user['Rights'] . "</td>
                        <td><a href=\"/CommothCMS_CRM/public/cms/user_edit/".$user['UserID']."\" class='button button-3d button-mini button-rounded button-amber'>Edit</a></td>
                        </tr>";
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

    </div>

</section><!-- #content end -->