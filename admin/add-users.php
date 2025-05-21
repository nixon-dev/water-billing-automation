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
                    <h2>Add Users</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Admin</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Add Users</strong>
                        </li>
                    </ol>
                </div>
            </div>



            <div class="wrapper wrapper-content">

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
                            <div class="ibox-content">
                                <form method="POST" class="needs-validation" action="include/add_user.php">

                                    <div class="form-group  row">
                                        <label class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-10"><input type="text" id="InputFirstName"
                                                name="InputFirstName" placeholder="First Name" class="form-control"
                                                oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')" required>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10"><input type="text" id="InputLastName"
                                                oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')"
                                                name="InputLastName" placeholder="Last Name" class="form-control"
                                                required></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group row"><label class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <select id="InputAddress" name="InputAddress" placeholder="Search Address"
                                                required>
                                                <option value=""></option>
                                                <option value="Aklan Village">Aklan Village</option>
                                                <option value="Andres Bonifacio (Poblacion)">Andres Bonifacio
                                                    (Poblacion)</option>
                                                <option value="Aurora East (Poblacion)">Aurora East (Poblacion)</option>
                                                <option value="Aurora West (Poblacion)">Aurora West (Poblacion)</option>
                                                <option value="Baguio Village">Baguio Village</option>
                                                <option value="Balagbag">Balagbag</option>
                                                <option value="Bannawag">Bannawag</option>
                                                <option value="Cajel">Cajel</option>
                                                <option value="Campamento">Campamento</option>
                                                <option value="Diego Silang">Diego Silang</option>
                                                <option value="Sittio Der-an">Sittio Der-an</option>
                                                <option value="Don Mariano Perez, Sr.">Don Mariano Perez, Sr.</option>
                                                <option value="Doña Imelda">Doña Imelda</option>
                                                <option value="Dumanisi">Dumanisi</option>
                                                <option value="Gabriela Silang">Gabriela Silang</option>
                                                <option value="Gulac">Gulac</option>
                                                <option value="Guribang">Guribang</option>
                                                <option value="Ifugao Village">Ifugao Village</option>
                                                <option value="Isidro Paredes">Isidro Paredes</option>
                                                <option value="Rizal (Poblacion)">Rizal (Poblacion)</option>
                                                <option value="Liwayway">Liwayway</option>
                                                <option value="Luttuad">Luttuad</option>
                                                <option value="Magsaysay">Magsaysay</option>
                                                <option value="Makate">Makate</option>
                                                <option value="Maria Clara">Maria Clara</option>
                                                <option value="Rafael Palma (Don Sergio Osm)">Rafael Palma (Don Sergio
                                                    Osm)</option>
                                                <option value="Ricarte Norte">Ricarte Norte</option>
                                                <option value="Ricarte Sur">Ricarte Sur</option>
                                                <option value="San Antonio">San Antonio</option>
                                                <option value="San Isidro">San Isidro</option>
                                                <option value="San Pascual">San Pascual</option>
                                                <option value="Villa Pascua">Villa Pascua</option>
                                                <option value="Gregorio Pimentel">Gregorio Pimentel</option>
                                                <option value="Don Faustino Pagaduan">Don Faustino Pagaduan</option>


                                            </select>
                                        </div>
                                    </div>

                                    <div class="hr-line-dashed"></div>

                                    <!-- <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phone Number</label>
                                        <div class="col-sm-10">
                                            <input type="number" id="InputPhone" name="InputPhone"
                                                placeholder="Phone Number"
                                                oninput="if(this.value.length > 11) this.value = this.value.slice(0, 11)"
                                                class="form-control" required>
                                        </div>
                                    </div> -->

                                    <div class="hr-line-dashed"></div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10"><input type="email" id="InputEmail" name="InputEmail"
                                                placeholder="Email Address" class="form-control" required></div>
                                    </div>

                                    <div class="hr-line-dashed"></div>


                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" id="InputPassword" name="InputPassword"
                                                class="form-control" name="password" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class=" hr-line-dashed">
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Confirm Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" id="InputRepeatPassword" name="InputRepeatPassword"
                                                class="form-control" name="password" placeholder="Repeat Password"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <button class="btn btn-primary btn-sm" type="submit" id="addBtn"
                                                name="addBtn"><i class="fa fa-plus"></i> Add User</button>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#InputAddress").selectize({
            sortField: 'text'
        });
    </script>

    <script>
        document.querySelector("#InputEmail").addEventListener("input", function () {
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,63}$/;
            if (!emailPattern.test(this.value)) {
                this.setCustomValidity("Please enter a valid Email address!");
            } else {
                this.setCustomValidity(""); // Reset validity
            }
        });

        // document.querySelector('#InputPhone').addEventListener("input", function () {
        //     const phonePattern = /^\d{11}$/;

        //     if (!phonePattern.test(this.value)) {
        //         this.setCustomValidity("Please enter a valid phone number!");
        //     } else {
        //         this.setCustomValidity("");
        //     }
        // });

        // document.querySelector('#InputPassword').addEventListener("input", function () {
        //     const passwordPattern = /^\d{8}$/;

        //     if (!passwordPattern.test(this.value)) {
        //         this.setCustomValidity("Passwords should be at least 8 characters long.")
        //     } else {
        //         this.setCustomValidity("")
        //     }
        // });

        document.querySelector('#InputRepeatPassword').addEventListener('input', function () {
            const password = document.getElementById('InputPassword').value;
            const repeatPassword = document.getElementById('InputRepeatPassword').value;

            if (password !== repeatPassword) {
                document.getElementById('InputRepeatPassword').setCustomValidity("Passwords do not match!");
            } else {
                document.getElementById('InputRepeatPassword').setCustomValidity("");
            }
        });



    </script>


</body>

</html>