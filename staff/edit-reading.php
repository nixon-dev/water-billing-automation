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

    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

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
                    <h2>Manage Water Meter Reading</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Staff</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Manage Reading</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content">

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
                    <div class="col-lg-6">
                        <div class="ibox ">
                            <div class="ibox-content">

                                <?php include('include/fetch_edit_users.php'); ?>
                                <form method="POST" class="needs-validation" action="include/set_account_number.php">


                                    <input class="d-none" name="id" value="<?php echo $_GET['id']; ?>">

                                    <div class="form-group  row">
                                        <label class="col-sm-12 col-form-label">Name</label>
                                        <div class="col-sm-12"><input type="text" id="InputFirstName"
                                                name="InputFirstName" placeholder="First Name" class="form-control"
                                                value="<?php echo ucfirst($fname) . " " . ucfirst($lname); ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group  row">
                                        <label class="col-sm-12 col-form-label">Account Number</label>
                                        <div class="col-sm-12">
                                            <input type="text" id="InputAccountNumber" name="InputAccountNumber"
                                                placeholder="Account Number" class="form-control"
                                                value="<?php echo $account_number; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm 12 col-form-label">Senior</label>
                                        <div class="col-sm-12">
                                            <select class="form-control m-b" name="isSenior">
                                                <option value="0" <?php if ($senior === 0) { echo "selected"; } ?>>No</option>
                                                <option value="1" <?php if ($senior === 1) { echo "selected"; } ?>>Yes</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary btn-sm" type="submit" name="setBtn"
                                                id="setBtn"></i>Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Water Meter</h5>
                            </div>
                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>

                                            <tr>
                                                <th>Water Meter Number</th>
                                                <th>Rate ID</th>
                                                <th class="text-center">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $id = intval($row['u_account_number']);

                                            $query = "SELECT wm.*, r.*
                                            FROM water_meter wm
                                            LEFT JOIN rates r ON wm.rate_id = r.rate_id
                                            WHERE u_account_number = ?";

                                            $stmt = mysqli_prepare($link, $query);
                                            mysqli_stmt_bind_param($stmt, "s", $id);
                                            mysqli_stmt_execute($stmt);
                                            $result = mysqli_stmt_get_result($stmt);

                                            $watermeters = array();
                                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                $watermeters[] = $row;
                                            } ?>


                                            <?php foreach ($watermeters as $wm): ?>
                                                <tr>
                                                    <td><?php echo $wm['wm_meter_number']; ?></td>
                                                    <td><?php echo $wm['rate_name']; ?></td>
                                                    <td class="text-center"> <a
                                                            href="include/delete_water_meter_number.php?id=<?php echo $_GET['id']; ?>&wmid=<?php echo $wm['wm_id']; ?>"
                                                            class="btn btn-danger btn-circle">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </td>
                                                </tr>

                                            <?php endforeach ?>
                                            <?php if (empty($watermeters)): ?>
                                                <tr>
                                                    <td class="text-center" colspan="3">No Water Meter Found</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>

                                    <?php if (!empty($account_number)): ?>
                                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#waterMeterModal">Add Water Meter</a>
                                    <?php else: ?>
                                        <button class="btn btn-secondary" disabled>Add Account Number First</button>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="waterMeterModal" tabindex="-1" aria-labelledby="waterMeterModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-1" id="waterMeterModal">Water Meter Number</h1>
                </div>

                <?php include('include/fetch_edit_users.php'); ?>


                <form class="needs-validation" action="include/add_water_meter.php" method="POST">
                    <div class="modal-body">
                        <input class="d-none" name="id" value="<?php echo $row['u_id']; ?>" readonly>

                        <div class="form-group has-validation mb-4">
                            <label>Account Number</label>
                            <?php if (!empty($row['u_account_number'])): ?>
                                <input type="number" class="form-control" id="inputAccountNumber" name="inputAccountNumber"
                                    value="<?php echo $row['u_account_number']; ?>" readonly>
                            <?php else: ?>
                                <input type="text" class="form-control" id="inputAccountNumber" name="inputAccountNumber"
                                    value="Insert Account Number First" readonly>
                            <?php endif; ?>
                        </div>

                        <div class="form-group mb-4">
                            <label>Water Meter Number</label>
                            <input type="text" class="form-control" id="InputWaterNumber" name="InputWaterNumber"
                                style="appearance: none; -moz-appearance: textfield;" pattern="[A-Za-z0-9\-]+" required
                                title="Only letters, numbers, and dashes are allowed."
                                oninput="this.value = this.value.replace(/[^A-Za-z0-9\-]/g, '');">
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Rate Type</label>
                            <?php include('include/get_water_rate_type.php'); ?>
                            <div class="col-sm-12">
                                <select class="form-control m-b" id="InputRateType" name="InputRateType">
                                    <?php foreach ($rates as $r): ?>
                                        <option value="<?php echo $r['rate_id']; ?>">
                                            <?php echo $r['rate_name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <?php include('include/fetch_edit_users.php'); ?>
                        <?php if ($row['u_account_number'] == Null): ?>

                        <?php else: ?>
                            <button class="btn btn-primary" type="submit" id="insertBtn" name="insertBtn">Insert</button>

                        <?php endif; ?>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Mainly scripts -->
    <script src="../assets2/js/jquery-3.1.1.min.js"></script>
    <script src="../assets2/js/popper.min.js"></script>
    <script src="../assets2/js/bootstrap.js"></script>
    <script src="../assets2/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../assets2/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../assets2/js/inspinia.js"></script>
    <script src="../assets2/js/plugins/pace/pace.min.js"></script>

    <script>
        const myModal = document.getElementById('waterMeterModal');
        myModal.addEventListener('shown.bs.modal', () => {
            const myInput = document.querySelector('#waterMeterModal input'); // Adjust selector if needed
            if (myInput) {
                myInput.focus();
            }
        });


    </script>


</body>

</html>