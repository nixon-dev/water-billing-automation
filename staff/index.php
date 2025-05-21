<!-- <?php require_once 'include/auth.php'; ?> -->
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
                            <a href="index.html">Staff</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Dashboard</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">

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
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Meter No.</th>
                                                <th>Date</th>
                                                <th>Previous</th>
                                                <th>Present</th>
                                                <th>Con⠀(m³)</th>
                                                <th>Senior Discount</th>
                                                <th>Total Bill</th>
                                                <th>Duedate</th>
                                                <th>After Duedate Bill</th>
                                                <th>Status</th>
                                                <th>Proof</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include('include/fetch_bills.php'); ?>
                                            <?php foreach ($bills as $b): ?>
                                                <tr>
                                                    <td><?php echo ucfirst($b['u_fname']) . " " . ucfirst($b['u_lname']); ?>
                                                    </td>
                                                    <td><?php echo $b['wm_meter_number']; ?></td>
                                                    <td><?php echo $b['wr_date']; ?></td>
                                                    <td><?php echo $b['wr_rlm']; ?></td>
                                                    <td><?php echo $b['wr_reading']; ?></td>
                                                    <td><?php echo $b['wr_twc']; ?></td>
                                                    <td>₱<?php echo number_format($b['wr_senior_discount'], 2); ?></td>
                                                    <td>₱<?php echo number_format($b['wr_ftax_bill'], 2); ?></td>
                                                    <td><?php echo $b['wr_due_date']; ?></td>
                                                    <td><?php echo $b['wr_due_bill']; ?></td>
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
                                                    <td>
                                                        <a href="include/delete_reading.php?id=<?php echo $b['wr_id']; ?>"
                                                            class="btn btn-sm btn-danger"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                                <path
                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                            </svg></a>
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
                order: [[2, 'desc']],
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy' },
                    { extend: 'csv' },
                    { extend: 'excel', title: 'Bills' },
                    { extend: 'pdf', title: 'Bills' },

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