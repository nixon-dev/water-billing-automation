<?php require_once 'include/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">


    <!-- Change this to the correct title -->
    <title>Diffun Water District - Online Reading Tool</title>

    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../assets/css/sub.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('include/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <!-- Topbar -->
                <?php include('include/topbar.php'); ?>
                <!-- End of Topbar -->

                <?php include('include/fetch_users.php'); ?>

                    <div class="container-fluid">

                        <h1 class="h3 mb-2 text-gray-800">Users</h1>
                        <p class="mb-4">Users Information</p>

                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover border-primary center" id="dataTable" width="100%">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Address</th>
                                                <th>Phone Number</th>
                                                <th>Type</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Address</th>
                                                <th>Phone Number</th>
                                                <th>Type</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach($users as $u): ?>
                                            <tr>
                                                <td><?php echo $u['u_fname']; ?></td>
                                                <td><?php echo $u['u_lname']; ?></td>
                                                <td><?php echo $u['u_address']; ?></td>
                                                <td><?php echo $u['u_phone']; ?></td>
                                                <td><?php echo $u['rate_name']; ?></td>
                                                <!-- <td>
                                                    <a href="#" class="btn-sm btn-success btn-circle">
                                                        <i class="fas fa-check"></i>
                                                </td>
                                                <td> <a href="#" class="btn-sm btn-danger btn-circle">
                                                        <i class="fas fa-trash"></i></td>
                                                </td> -->
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

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../assets/js/sub.js"></script>
    <script src="../assets/js/demo/datatables-demo.js"></script>


</body>

</html>

