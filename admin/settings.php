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
                    <h2>Settings</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Admin</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>settings</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <?php include("include/fetch_user_info.php"); ?>
            <div class="wrapper wrapper-content">
                <?php if (!empty($_GET['success'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_GET['success']; ?>
                    </div>
                <?php elseif (!empty($_GET['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['error']; ?>
                    </div>
                <?php endif; ?>
                <div class="animated fadeIn">
                    <form action="include/update_user_info.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="fname" value="<?php echo $row['u_fname']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lname" value="<?php echo $row['u_lname']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address"
                                value="<?php echo $row['u_address']; ?>">
                        </div>
                        <div class="mb-3 d-none">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $row['u_phone']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email"
                                value="<?php echo $row['u_email']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password"
                                value="<?php echo $row['u_password']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary" id="update" name="update">Submit</button>
                    </form>
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


</body>

</html>