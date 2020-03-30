        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © 2020 Upcube - Crafted with by InfinityP.Soft.
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- jQuery  -->
        <script src="public/assets/js/jquery.min.js"></script>
        <script src="public/assets/js/popper.min.js"></script>
        <script src="public/assets/js/bootstrap.min.js"></script>
        <script src="public/assets/js/modernizr.min.js"></script>
        <script src="public/assets/js/waves.js"></script>
        <script src="public/assets/js/jquery.slimscroll.js"></script>
        <script src="public/assets/js/jquery.nicescroll.js"></script>
        <script src="public/assets/js/jquery.scrollTo.min.js"></script>


        <!-- App js -->
        <script src="public/assets/js/app.js"></script>


        <!-- Required datatable js -->
        <script src="public/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="public/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="public/assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="public/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="public/assets/plugins/datatables/jszip.min.js"></script>
        <script src="public/assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="public/assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="public/assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="public/assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="public/assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="public/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="public/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#board').change(function() {
                    var provinces_id = $('#board').val();
                    if (provinces_id != '') {
                        $.ajax({
                            url: 'fetch_state',
                            method: "POST",
                            data: {
                                PROVINCE_ID: provinces_id
                            },
                            success: function(data) {
                                $('#subject').html(data);
                            }
                        })
                    }
                    console.log(provinces_id);
                });
                $('#subject').change(function() {
                    var amphures_id = $('#subject').val();
                    if (amphures_id != '') {
                        $.ajax({
                            url: 'fetch_city',
                            method: 'POST',
                            data: {
                                AMPHUR_ID: amphures_id
                            },
                            success: function(data) {
                                $('#branch').html(data);
                            }
                        })
                    }
                    console.log(amphures_id);
                });
            });
        </script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            <?php if ($suss = $this->session->flashdata('save_ss2')) : ?>
                swal("Good job!", '<?php echo $suss; ?>', "success");
            <?php endif; ?>
            <?php if ($error = $this->session->flashdata('del_ss2')) : ?>
                swal("Fail !", '<?php echo $error; ?>', "error");
            <?php endif; ?>
        </script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);
            <?php
            $this->db->select('count(*) AS countas,year');
            $this->db->from('tbl_thesis');
            $this->db->group_by('year');
            $thesis = $this->db->get()->result();
            ?>

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php foreach ($thesis as $key => $thesis) { ?>['<?php echo $thesis->year ?>', <?php echo $thesis->countas; ?>],
                    <?php } ?>
                ]);

                var options = {
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>




        </body>

        </html>