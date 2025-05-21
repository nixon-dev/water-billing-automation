<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


    <!-- Change this to the correct title -->
    <title>Diffun Water District - Online Reading Tool</title>

    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="assets/css/sub.css" rel="stylesheet">

</head>

<body class="bg-primary">

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-5 col-md-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="assets/img/dwd-logo.png" class="img-fluid mb-4" width="100px"
                                            alt="img-fluid">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account</h1>
                                    </div>

                                    <?php if (!empty($_GET['error'])): ?>
                                        <div class="alert alert-danger snow text-center" role="alert">
                                            <?php echo $_GET['error']; ?>
                                        </div>
                                    <?php elseif (!empty($_GET['message'])): ?>
                                        <div class="alert alert-success snow text-center" role="alert">
                                            <?php echo $_GET['message']; ?>
                                        </div>
                                    <?php endif; ?>

                                    <form class="user needs-validation" action="assets/includes/signup.php"
                                        method="POST" needs-validation>

                                        <div class="form-group row has-validation">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control" id="InputFirstName"
                                                    name="InputFirstName" placeholder="First Name" required
                                                    oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="InputLastName"
                                                    name="InputLastName" placeholder="Last Name" required
                                                    oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '')">
                                            </div>
                                            <div class="invalid-feedback">Please enter your name!</div>
                                        </div>

                                        <div class="form-group has-validation">
                                            <input type="text" class="form-control" id="InputAddress"
                                                name="InputAddress" placeholder="Address" required>
                                            <div class="invalid-feedback">Please enter a valid adddress!</div>
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
                                                    name="InputPassword" placeholder="Password" pattern=".{8,}" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control" id="InputRepeatPassword"
                                                    name="InputRepeatPassword" placeholder="Repeat dPassword" pattern=".{8,}" required>
                                            </div>
                                            <div class="invalid-feedback">Please choose your password!</div>
                                        </div>
                                        <button class="btn btn-primary w-100 btn-block" type="submit" id="signupBtn"
                                            name="signupBtn">Register</button>
                                        <br>
                                    </form>
                                    <div class="row">
                                        <div class="col-lg-5 text-right"></div>
                                        <div class="col-lg-7 text-right"><span>Already have an account? </span>
                                            <a href="index.php">Sign in</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="assets/js/sub.js"></script>
    <script>
        document.querySelector("#InputEmail").addEventListener("input", function () {
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,63}$/;
            if (!emailPattern.test(this.value)) {
                this.setCustomValidity("Please enter a valid Email address!");
            } else {
                this.setCustomValidity(""); // Reset validity
            }
        });

        document.querySelector('#InputPhone').addEventListener("input", function () {
            const phonePattern = /^\d{11}$/;;

            if (!phonePattern.test(this.value)) {
                this.setCustomValidity("Please enter a valid phone number!");
            } else {
                this.setCustomValidity("");
            }
        });

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