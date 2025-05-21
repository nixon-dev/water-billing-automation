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
                    <h2>Staff Management</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Admin</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Staff Management</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addStaffModal" id="addStaffBtn">
                            Add Staff
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Staff</h1>
                        </div>
                        <div class="modal-body">
                            <form class="user needs-validation" action="include/add_staff.php" method="POST"
                                needs-validation>

                                <div class="form-group row has-validation">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" id="InputFirstName"
                                            name="InputFirstName" placeholder="First Name" required
                                            oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="InputLastName" name="InputLastName"
                                            placeholder="Last Name" required
                                            oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')">
                                    </div>
                                    <div class="invalid-feedback">Please enter your name!</div>
                                </div>

                                <!-- <div class="form-group has-validation">
                                            <input type="number" class="form-control" id="InputPhone" name="InputPhone"
                                                placeholder="Phone Number" required minlength="11"
                                                oninput="if(this.value.length > 11) this.value = this.value.slice(0, 11)">
                                            <div class="invalid-feedback">Please enter a valid Phone Number!</div>
                                        </div> -->

                                <div class="form-group has-validation">
                                    <input type="email" class="form-control" id="InputEmail" name="InputEmail"
                                        placeholder="Email Address"
                                        pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,63}$" required>
                                    <div class="invalid-feedback">Please enter a valid Email address!</div>

                                </div>

                                <div class="form-group row has-validation">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control" id="InputPassword"
                                            name="InputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="InputRepeatPassword"
                                            name="InputRepeatPassword" placeholder="Repeat Password" required>
                                    </div>
                                    <div class="invalid-feedback">Please choose your password!</div>
                                </div>

                                <div class="form-group row d-none">
                                    <select class="form-control m-b" name="roles">
                                        <option value="Staff" selected>Staff</option>
                                        <option value="Administrator">Administrator</option>
                                    </select>
                                </div>

                                <button class="btn btn-primary w-100 btn-block" type="submit" id="signupBtn"
                                    name="signupBtn">Register</button>
                                <br>
                            </form>


                        </div>
                    </div>
                </div>
            </div>




            <div class="wrapper wrapper-content animated fadeInRight">
                <?php if (!empty($_GET['error'])): ?>
                    <div class="alert alert-danger snow text-center" role="alert">
                        <?php echo $_GET['error']; ?>
                    </div>
                <?php elseif (!empty($_GET['message'])): ?>
                    <div class="alert alert-success snow text-center" role="alert">
                        <?php echo $_GET['message']; ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Staff</h5>
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
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>

                                            <tr>
                                                <th>Fullname</th>
                                                <th>Role</th>
                                                <th>Email</th>
                                                <th class="text-center">Edit</th>
                                                <th class="text-center">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include('include/fetch_staff.php'); ?>
                                            <?php foreach ($users as $u): ?>
                                                <tr class="gradeA">
                                                    <td><?php echo ucfirst($u['u_fname']) . " " . ucfirst($u['u_lname']); ?>
                                                    </td>
                                                    <td><?php echo $u['u_role']; ?></td>
                                                    <td><?php echo $u['u_email']; ?></td>
                                                    <td class="text-center"> <a href="edit-staff.php?id=<?php echo $u['u_id']; ?>"
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
                                        <tfoot>
                                            <tr>
                                                <th>Fullname</th>
                                                <th>Role</th>
                                                <th>Email</th>
                                                <th class="text-center">Edit</th>
                                                <th class="text-center">Delete</th>
                                            </tr>
                                        </tfoot>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



    <!-- Custom and plugin javascript -->
    <script src="../assets2/js/inspinia.js"></script>
    <script src="../assets2/js/plugins/pace/pace.min.js"></script>
    <script src="../assets2/js/plugins/dataTables/datatables.min.js"></script>
    <script>

        // Upgrade button class name
        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

        $(document).ready(function () {
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy' },
                    { extend: 'csv' },
                    { extend: 'excel', title: 'staff' },
                    { extend: 'pdf', title: 'staff' },

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