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
    <link href="https://cdn.datatables.net/fixedheader/4.0.1/css/fixedHeader.bootstrap5.css" rel="stylesheet">
    <link
        href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-html5-3.2.0/b-print-3.2.0/fh-4.0.1/r-3.0.3/sp-2.3.3/datatables.min.css"
        rel="stylesheet">



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
                            <a href="index.php">Admin</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Dashboard</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content">
                <?php include('include/fetch_waterbill.php'); ?>
                <?php if (!empty($_GET['error'])): ?>
                    <div class="alert alert-danger snow text-center" role="alert">
                        <?php echo $_GET['error']; ?>
                    </div>
                <?php elseif (!empty($_GET['success'])): ?>
                    <div class="alert alert-success snow text-center" role="alert">
                        <?php echo $_GET['success']; ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <select id="month_select">
                                        <option value="1" <?php echo (date("m") == 1) ? 'selected' : ''; ?>>January
                                        </option>
                                        <option value="2" <?php echo (date("m") == 2) ? 'selected' : ''; ?>>February
                                        </option>
                                        <option value="3" <?php echo (date("m") == 3) ? 'selected' : ''; ?>>March</option>
                                        <option value="4" <?php echo (date("m") == 4) ? 'selected' : ''; ?>>April</option>
                                        <option value="5" <?php echo (date("m") == 5) ? 'selected' : ''; ?>>May</option>
                                        <option value="6" <?php echo (date("m") == 6) ? 'selected' : ''; ?>>June</option>
                                        <option value="7" <?php echo (date("m") == 7) ? 'selected' : ''; ?>>July</option>
                                        <option value="8" <?php echo (date("m") == 8) ? 'selected' : ''; ?>>August
                                        </option>
                                        <option value="9" <?php echo (date("m") == 9) ? 'selected' : ''; ?>>September
                                        </option>
                                        <option value="10" <?php echo (date("m") == 10) ? 'selected' : ''; ?>>October
                                        </option>
                                        <option value="11" <?php echo (date("m") == 11) ? 'selected' : ''; ?>>November
                                        </option>
                                        <option value="12" <?php echo (date("m") == 12) ? 'selected' : ''; ?>>December
                                        </option>
                                    </select>


                                </div>
                                <h5>Income</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">₱ <strong id="month_earning_result">0.00</strong></h1>
                                <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                                <small>Monthly Earnings</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <select id="year_select">
                                        <?php
                                        $current_year = date("Y");
                                        for ($year = $current_year; $year >= $current_year - 20; $year--) {
                                            echo "<option value='$year'>$year</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <h5>Income</h5>
                            </div>
                            <div class="ibox-content">

                                <h1 class="no-margins">₱ <strong id="earning_result">0.00</strong></h1>
                                <!-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> -->
                                <small>Yearly Earnings</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-primary float-right">Overall</span>
                                </div>
                                <h5>Payment %</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo number_format($percentage, 2); ?>%</h1>
                                <!-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> -->
                                <small>&nbsp;</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <div class="ibox-tools">
                                    <span class="label label-danger float-right">Overall</span>
                                </div>
                                <h5>Unpaid Bills</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">₱<?php echo number_format($total_unpaid_bills); ?></h1>
                                <!-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i>
                                </div> -->
                                <small>&nbsp;</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Unpaid Customer Bills</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#" class="dropdown-item">Config option 1</a>
                                            </li>
                                            <li><a href="#" class="dropdown-item">Config option 2</a>
                                            </li>
                                        </ul>
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
                                                    <th>Name</th>
                                                    <th>Meter No.</th>
                                                    <th>Date</th>
                                                    <th class="noSearchCols">Con⠀(m³)</th>
                                                    <th class="noSearchCols">Senior Discount</th>
                                                    <th class="noSearchCols">Total Bill</th>
                                                    <th>Duedate</th>
                                                    <th class="noSearchCols">After Duedate Bill</th>
                                                    <th class="noSearchCols">Status</th>
                                                    <th class="noSearchCols">Proof</th>
                                                    <th class="noSearchCols">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php include('include/fetch_bills.php'); ?>
                                                <?php foreach ($unpaid_bills as $b): ?>
                                                    <tr class="gradeA">
                                                        <td><?php echo ucfirst($b['u_fname']) . " " . ucfirst($b['u_lname']); ?>
                                                        </td>
                                                        <td><?php echo $b['wm_meter_number']; ?></td>
                                                        <td><?php echo $b['wr_date']; ?></td>
                                                        <td><?php echo $b['wr_twc']; ?></td>
                                                        <td>₱<?php echo number_format($b['wr_senior_discount'], 2); ?></td>
                                                        <td>₱<?php echo number_format($b['wr_ftax_bill'], 2); ?></td>
                                                        <td><?php echo $b['wr_due_date']; ?></td>
                                                        <td>₱<?php echo number_format($b['wr_due_bill'], 2); ?></td>

                                                        <td class="<?php if ($b['wr_status'] == 'Unpaid') {
                                                            echo 'text-danger';
                                                        } else {
                                                            echo 'text-success';
                                                        } ?>">
                                                            <strong><?php echo $b['wr_status']; ?></strong>
                                                        </td>
                                                        <td><a href="#" class="open-modal"
                                                                data-img="../assets/proofs/<?php echo $b['wr_proof']; ?>"><img
                                                                    width="50px" height="auto"
                                                                    src="../assets/proofs/<?php echo $b['wr_proof']; ?>"></a>
                                                        </td>
                                                        <td class="text-center"><a
                                                                href="include/update_bill.php?id=<?php echo $b['wr_id']; ?>"
                                                                class="btn btn-primary btn-sm"><i class="fa fa-check"
                                                                    aria-hidden="true"></i></a></td>

                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <h5>Paid Customer Bills</h5>

                                </div>
                                <div class="ibox-content">

                                    <div class="table-responsive">
                                        <table
                                            class="table table-striped table-bordered table-hover dataTables-example2">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Meter No.</th>
                                                    <th>Date</th>
                                                    <th class="noSearchCols">Con⠀(m³)</th>
                                                    <th class="noSearchCols">Net Bill</th>
                                                    <th class="noSearchCols">FTax</th>
                                                    <th class="noSearchCols">Total Bill</th>
                                                    <th>Duedate</th>
                                                    <th class="noSearchCols">After Duedate Bill</th>
                                                    <th class="noSearchCols">Status</th>
                                                    <th class="noSearchCols">Proof</th>
                                                    <th class="noSearchCols">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php include('include/fetch_bills.php'); ?>
                                                <?php foreach ($paid_bills as $b): ?>
                                                    <tr class="gradeA">
                                                        <td><?php echo ucfirst($b['u_fname']) . " " . ucfirst($b['u_lname']); ?>
                                                        </td>
                                                        <td><?php echo $b['wm_meter_number']; ?></td>
                                                        <td><?php echo $b['wr_date']; ?></td>
                                                        <td><?php echo $b['wr_twc']; ?></td>
                                                        <td>₱<?php echo number_format($b['wr_bill']); ?></td>

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
                                                            <strong><?php echo $b['wr_status']; ?></strong>
                                                        </td>
                                                        <td><a href="#" class="open-modal"
                                                                data-img="../assets/proofs/<?php echo $b['wr_proof']; ?>"><img
                                                                    width="50px" height="auto"
                                                                    src="../assets/proofs/<?php echo $b['wr_proof']; ?>"></a>
                                                        </td>
                                                        <td class="text-center"><a
                                                                href="include/undo_bill.php?id=<?php echo $b['wr_id']; ?>"
                                                                class="btn btn-danger btn-sm"><i class="fa fa-undo"
                                                                    aria-hidden="true"></i></a></td>

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
    <script src="../assets2/js/plugins/dataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/dataTables.fixedHeader.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/4.0.1/js/fixedHeader.bootstrap5.js"></script>




    <!-- jQuery UI -->
    <script src="../assets2/js/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#year_select").change(function () {
                var selectedYear = $(this).val();

                $.ajax({
                    url: "include/fetch_earnings.php",
                    method: "POST",
                    data: { selected_year: selectedYear },
                    success: function (response) {
                        console.log("Server response:", response); // Debugging
                        $("#earning_result").text(response.trim()); // Trim to remove unwanted spaces
                    },
                    error: function (xhr, status, error) {
                        console.log("AJAX Error:", xhr.responseText); // Log error details
                        alert("Error retrieving earnings: " + xhr.status + " - " + error);
                    }
                });



            });

            // Trigger change event to load initial earnings for the default selected year
            $("#year_select").trigger("change");
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#month_select").change(function () {
                var selectedMonth = $(this).val();

                $.ajax({
                    url: "include/fetch_earnings_month.php",
                    method: "POST",
                    data: { selected_month: selectedMonth },
                    success: function (response) {
                        console.log("Server response:", response); // Debugging
                        $("#month_earning_result").text(response.trim()); // Trim to remove unwanted spaces
                    },
                    error: function (xhr, status, error) {
                        console.log("AJAX Error:", xhr.responseText); // Log error details
                        alert("Error retrieving earnings: " + xhr.status + " - " + error);
                    }
                });



            });

            // Trigger change event to load initial earnings for the default selected year
            $("#year_select").trigger("change");
        });
    </script>

    <script>
        document.querySelectorAll('.open-modal').forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                var imgSrc = link.getAttribute('data-img');
                document.getElementById('modalImage').src = imgSrc;
                $('#imageModal').modal('show');
            });
        });
    </script>

    <script>

        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                order: [],
                pageLength: 10,
                responsive: true,
                columnDefs: [
                    { targets: "noSearchCols", searchable: false },
                ],
                fixedHeader: {
                    header: true,
                    footer: true
                },
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy' },
                    { extend: 'csv' },
                    { extend: 'excel', title: 'Unpaid Bills' },
                    { extend: 'pdf', title: 'Unpaid Bills' },

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

    <script>

        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

        $(document).ready(function () {
            $('.dataTables-example2').DataTable({
                order: [],
                pageLength: 10,
                responsive: true,
                columnDefs: [
                    { targets: "noSearchCols", searchable: false },
                ],
                fixedHeader: {
                    header: true,
                    footer: true
                },
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy' },
                    { extend: 'csv' },
                    { extend: 'excel', title: 'Paid Bills' },
                    { extend: 'pdf', title: 'Paid Bills' },

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