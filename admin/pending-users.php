<?php require_once 'include/auth.php'; ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Diffun Water District - Online Reading Tool</title>

    <link href="../assets2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets2/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../assets2/css/animate.css" rel="stylesheet">
    <link href="../assets2/css/style.css" rel="stylesheet">

</head>

<body class="">

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
                    <h2>Users</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Admin</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Users</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <?php
            $error = filter_input(INPUT_GET, 'error', FILTER_SANITIZE_STRING);
            $success = filter_input(INPUT_GET, 'success', FILTER_SANITIZE_STRING);

            if (!empty($error)):
                ?>
                <div class="alert alert-danger snow" role="alert">
                    <?= $error ?>
                </div>
                <?php
            elseif (isset($success)):
                ?>
                <div class="alert alert-success snow" role="alert">
                    <?= $success ?>
                </div>
                <?php
            endif;
            ?>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Pending Users</h5>

                            </div>
                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>

                                            <tr>
                                                <th>Fullname</th>
                                                <th>Barangay</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th class="text-center">Accept</th>
                                                <th class="text-center">Reject</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include('include/fetch_pending_users.php'); ?>
                                            <?php foreach ($users as $u): ?>
                                                <tr class="gradeA">
                                                    <td><?php echo ucfirst($u['u_fname']) . " " . ucfirst($u['u_lname']); ?>
                                                    </td>
                                                    <td><?php echo $u['u_address']; ?></td>
                                                    <td><?php echo $u['u_email']; ?></td>
                                                    <td><?php if ($u['u_account_number'] == Null) {
                                                        echo 'Pending';
                                                    } ?></td>
                                                    <td class="text-center"> <a
                                                            href="edit-users.php?id=<?php echo $u['u_id']; ?>"
                                                            class="btn btn-info btn-circle">
                                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </td>
                                                    <td class="text-center"> <a
                                                            href="include/delete_user.php?id=<?php echo $u['u_id']; ?>"
                                                            class="btn btn-danger btn-circle">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
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

    <script>

        // Upgrade button class name
        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                order: [],
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