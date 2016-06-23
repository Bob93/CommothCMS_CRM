<?php session_destroy(); ?>

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

            <div class="col_full center">
                <form method="POST">
                    <label for="edit-form-search">Search:</label>
                    <input type="text" id="edit-form-search" name="edit-form-search" placeholder="Search Term" class="form-control" />
                </form>
            </div>

            <script>
                $(document).ready(function()
                {
                $( "#edit-form-search" ).on('change keyup paste click', function() {
                        var flickerAPI = "<?php  echo $this->public_dir ?>user_search/" + $('#edit-form-search').val();
                        $.ajax({
                            type: "POST",
                            url: flickerAPI,
                            dataType: "JSON",
                            cache: false,
                            success: function (result) {
                                $("tr > td").remove();
                                $(result).each(function (index, value) {
                                    $("#not_found").remove();
                                    $("#table-overview").append("<tr><td>" + result[index]['UserID'] + "</td><td>" + result[index]['Username'] + "</td><td>" + result[index]['FirstName'] + " " +  result[index]['Lastname'] + "</td>" +
                                        "<td><a href=\"user_edit/" + +  result[index]['UserID'] + "\" class='button button-3d button-mini button-rounded button-amber'>Edit</a>"
                                        + "<td><a href=\"user_suspend/" + +  result[index]['UserID'] + "\" class='button button-3d button-mini button-rounded button-red'>Suspend</a>"
                                        + "<td><a href=\"user_delete/" + +  result[index]['UserID'] + "\" class='button button-3d button-mini button-rounded button-red'>Delete</a>");
                                    });

                                if( !$(result).val() ) {
                                    $("#not_found").remove();
                                    $("#table-overview").after("<div class='col_full' id='not_found'><h1 class='center' style='margin-top: 20px;'>No users found</h1></div>");
                                };
                            },
                            error: function (req, status, error) {
                                console.log("ERROR:" + error.toString() + " " + status + " " + req.responseText);
                            }
                        });
                    });
                });
            </script>

            <table class="table table-hover table-no-padding" id="table-overview">
                <thead>
                <tr>
                    <th>UserID</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Modify</th>
                    <th>Suspend</th>
                    <th>Delete</th>
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
                        <td><a href=\"" . $this->public_dir . "user_edit/" .$user['UserID'] . "\" class='button button-3d button-mini button-rounded button-amber'>Edit</a></td>
                        <td><a href=\"" . $this->public_dir . "user_suspend/" .$user['UserID'] . "\"  class='button button-3d button-mini button-rounded button-red'>Suspend</a></td>
                        <td><a href=\"" . $this->public_dir . "user_delete/" .$user['UserID'] . "\"  class='button button-3d button-mini button-rounded button-red'>Delete</a></td>
                        </tr>";
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
                echo '<li><a href="'.$this->public_dir.'user_overview/'.$i.'">'.($i + 1).'</a></li>';
            }


            ?>
                </ul>
            </div>

        </div>

    </div>

</section><!-- #content end -->