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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                    <h2>Water Meter</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Staff</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Water Meter</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content">


                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_GET['success']; ?>
                    </div>
                <?php elseif (isset($_GET['error'])): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['error']; ?>
                    </div>
                <?php endif; ?>

                <div class="alert alert-danger d-none" role="alert" id="billedText">
                    <span class="col-sm-12">Notice: This meter has already been
                        <strong>billed</strong> for this month!
                    </span>
                </div>

                <div class="row">

                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-content">
                                <form method="POST" class="needs-validation" id="my-dropzone"
                                    action="include/insert_waterbill.php" enctype="multipart/form-data" novalidation>

                                    <input class="d-none" name="consumerName" id="consumerName">
                                    <input class="d-none" name="senior" id="senior">


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Consumer's
                                            Meter Number</label>
                                        <div class="col-sm-10">
                                            <select id="consumerMeterNumber" name="consumerMeterNumber"
                                                placeholder="Search Consumer's Meter Number" required>
                                                <option value=""></option>
                                                <?php include('include/fetch_consumers.php') ?>
                                                <?php foreach ($consumers as $con): ?>
                                                    <option value="<?php echo $con['wm_meter_number'] ?>">
                                                        <?php echo $con['wm_meter_number'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Water Reading Last Month (Cubic)</label>
                                        <div class="col-sm-10"><input type="number" id="consumerRLM" name="consumerRLM"
                                                placeholder="0.00" class="form-control" required></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Water Reading This Month (Cubic)</label>
                                        <div class="col-sm-10"><input type="number" id="consumerRTM" name="consumerRTM"
                                                placeholder="0.00" class="form-control" required></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group row">

                                        <?php include('include/get_water_rate_type.php'); ?>
                                        <label class="col-sm-2 col-form-label">Consumer Rate Type</label>
                                        <div class="col-sm-10"><input type="text" id="consumerRateType"
                                                name="consumerRateType" placeholder="i.e., Residential"
                                                class="form-control" readonly></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="consumerPFF" id="consumerPFF" type="file"
                                                class="custom-file-input" accept="image/jpeg, image/png, image/webp"
                                                required>
                                            <label class="custom-file-label">Choose Picture for Proof
                                                (Required)</label>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>




                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary btn-sm" type="submit" id="submitBtn"
                                                name="submitBtn"><i class="fa fa-paper-plane"></i> Submit</button>
                                        </div>
                                    </div>
                                </form>
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

    <script src="../assets2/js/plugins/bs-custom-file/bs-custom-file-input.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {

            bsCustomFileInput.init()
        });
    </script>

    <script>
        $('select').selectize({
            sortField: 'text'
        });
    </script>

    <script>
        $('#consumerMeterNumber').change(function () {
            var u_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'include/get_user_id.php',
                data: { u_id: u_id },
                success: function (response) {
                    $('#consumerName').val(response);
                }
            });
        });
    </script>
    <script>
        $('#consumerMeterNumber').change(function () {
            var u_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'include/get_water_reading.php',
                data: { u_id: u_id },
                success: function (response) {
                    $('#consumerRLM').val(response);
                }
            });
        });

        $('#consumerMeterNumber').change(function () {
            var u_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'include/get_senior.php',
                data: { u_id: u_id },
                success: function (response) {
                    $('#senior').val(response);
                }
            });
        });



        $('#consumerMeterNumber').change(function () {
            var u_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'include/bill_this_month.php',
                data: { u_id: u_id },
                success: function (response) {
                    if (response.trim() === 'True') {

                        $('#submitBtn').prop('disabled', true);
                        $('#billedText').removeClass('d-none');

                    } else {
                        // Enable the button
                        $('#submitBtn').prop('disabled', false);
                        $('#billedText').addClass('d-none');

                    }
                },
                error: function () {
                    alert('Error occurred while fetching data.');
                }
            });
        });

    </script>
    <script>
        $('#consumerMeterNumber').change(function () {
            var u_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'include/get_water_rate_type.php',
                data: { u_id: u_id },
                success: function (response) {
                    var rateTypes = {
                        '1': 'Residential/Government',
                        '2': 'Government I',
                        '3': 'Commercial A',
                        '4': 'Commercial B',
                        '5': 'Commercial Industrial'
                    };
                    $('#consumerRateType').val(rateTypes[response]);
                }
            });
        });
    </script>

    <script>
        function validateDecimal(input) {
            const regex = /^\d+(\.\d+)?$/;
            return regex.test(input.value);
        }

        const consumerRLMInput = document.getElementById('consumerRLM');
        const consumerRTMInput = document.getElementById('consumerRTM');

        consumerRLMInput.addEventListener('input', () => {
            if (!validateDecimal(consumerRLMInput)) {
                // Handle invalid input, e.g., show an error message
                console.error('Invalid decimal number for consumerRLM');
            }
        });

        consumerRTMInput.addEventListener('input', () => {
            if (!validateDecimal(consumerRTMInput)) {
                // Handle invalid input, e.g., show an error message
                console.error('Invalid decimal number for consumerRTM');
            }
        });
    </script>

</body>

</html>