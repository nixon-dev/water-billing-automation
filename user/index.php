<?php require_once 'include/auth.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <title>Diffun Water District - Online Reading Tool</title>

    <link href="../assets2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets2/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../assets2/css/animate.css" rel="stylesheet">
    <link href="../assets2/css/style.css" rel="stylesheet">
    <link href="../assets2/css/plugins/dataTables/datatables.min.css" rel="stylesheet">


</head>

<body>
    <div id="wrapper">

        <?php include('include/sidebar.php'); ?>


        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>

                    </div>



                    <ul class="nav navbar-top-links navbar-right">
                    <?php
                        include('../assets/includes/db_conn.php');
                        $u_id = $_SESSION['id'];
                        $countQuery = "SELECT COUNT(*) AS unpaid_count FROM water_reading WHERE u_id = '$u_id' AND wr_status = 'Unpaid'";
                        $countResult = mysqli_query($link, $countQuery);
                        $unpaid_bills_count = 20;

                        if ($countRow = mysqli_fetch_assoc($countResult)) {
                            $unpaid_bills_count = $countRow['unpaid_count'];
                        }
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i>
                                <?php if (!empty($unpaid_bills_count)): ?>
                                    <span class="label label-danger"><?php echo $unpaid_bills_count; ?></span>
                                <?php endif; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">

                                <li class="text-center">
                                    <strong>
                                        You have <?php echo $unpaid_bills_count; ?> Unpaid bills.
                                    </strong>
                                </li>
                            </ul>
                        </li>



                        <li>
                            <a href="include/logout.php">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Dashboard</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">User</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Dashboard</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content">
                <?php include('include/fetch_waterbill.php'); ?>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <!-- <span class="label label-success float-right">Monthly</span> -->
                                </div>
                                <h5>Bills</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">₱ <?php echo number_format($total_unpaid_bills); ?></h1>
                                <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                                <small>To be paid</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <!-- <span class="label label-info float-right">Annual</span> -->
                                </div>
                                <h5>Last Month</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo number_format($previous_reading); ?></h1>
                                <!-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> -->
                                <small>m<sup>3</sup></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <!-- <span class="label label-primary float-right">Overall</span> -->
                                </div>
                                <h5>This Month</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo number_format($current_reading); ?></h1>
                                <!-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> -->
                                <small>m<sup>3</sup></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <!-- <span class="label label-danger float-right">Overall</span> -->
                                </div>
                                <h5>Total This Month</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo number_format($total_consumption); ?></h1>
                                <!-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i>
                                </div> -->
                                <small>m<sup>3</sup></small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Bills</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">

                                    <div class="table-responsive">
                                        <table
                                            class="table table-striped table-bordered table-hover dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Meter Number</th>
                                                    <th>Date</th>
                                                    <th>Previous</th>
                                                    <th>Present</th>
                                                    <th>Con⠀(m³)</th>
                                                    <th>Net Bill</th>
                                                    <th>FTax</th>
                                                    <th>Total Bill</th>
                                                    <th>Duedate</th>
                                                    <th>After Duedate Bill</th>
                                                    <th>Status</th>
                                                    <th>Proof</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach ($bills as $b): ?>
                                                    <tr class="gradeA">
                                                        <td><?php echo $b['wm_meter_number']; ?></td>
                                                        <td><?php echo $b['wr_date']; ?></td>
                                                        <td><?php echo $b['wr_rlm']; ?></td>
                                                        <td><?php echo $b['wr_reading']; ?></td>
                                                        <td><?php echo $b['wr_twc']; ?></td>
                                                        <td>₱<?php echo number_format($b['wr_bill'], 1); ?></td>
                                                        <td>₱<?php echo number_format((floatval($b['wr_bill']) * 0.02), 1); ?>
                                                        </td>
                                                        <td>₱<?php echo number_format($b['wr_ftax_bill'], 2); ?></td>

                                                        <td><?php echo $b['wr_due_date']; ?></td>
                                                        <td>₱<?php echo number_format($b['wr_due_bill'], 2); ?></td>
                                                        <td class="<?php if ($b['wr_status'] == 'Unpaid') {
                                                            echo 'text-danger';
                                                        } else {
                                                            echo 'text-success';
                                                        } ?>">
                                                            <?php echo $b['wr_status']; ?>
                                                        </td>
                                                        <td><a href="#" class="open-modal"
                                                                data-img="../assets/proofs/<?php echo $b['wr_proof']; ?>"><img
                                                                    width="50px" height="auto"
                                                                    src="../assets/proofs/<?php echo $b['wr_proof']; ?>"></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>








            </div>
        </div>

    </div>

    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" class="img-fluid" alt="Image">
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="../assets2/js/jquery-3.1.1.min.js"></script>
    <script src="../assets2/js/popper.min.js"></script>
    <script src="../assets2/js/bootstrap.js"></script>
    <script src="../assets2/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../assets2/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../assets2/js/inspinia.js"></script>
    <script src="../assets2/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="../assets2/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="../assets2/js/plugins/dataTables/datatables.min.js"></script>

    <script>
        // JavaScript to handle opening the modal with the selected image
        document.querySelectorAll('.open-modal').forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent the default link behavior
                var imgSrc = link.getAttribute('data-img'); // Get the image source from the data-img attribute
                document.getElementById('modalImage').src = imgSrc; // Set the image source in the modal
                $('#imageModal').modal('show'); // Show the modal
            });
        });
    </script>

    <script>

        // Upgrade button class name
        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                order: [[1, 'desc']],
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy' },
                    { extend: 'csv' },
                    { extend: 'excel', title: 'ExampleFile' },
                    { extend: 'pdf', title: 'ExampleFile' },

                    {
                        extend: 'print',
                        customize: function (win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>

</body>

</html>