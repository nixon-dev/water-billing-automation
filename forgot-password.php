<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


    <!-- Change this to the correct title -->
    <title>Forgot Password - Diffun Water District</title>

    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="assets/css/sub.css" rel="stylesheet">

</head>

<body class="bg-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <a href="/"><img src="assets/img/dwd-logo.png" class="img-fluid mb-4"
                                                width="100px" alt="img-fluid"></a>
                                        <h1 class="h4 text-gray-900 mb-4">Forgot Password</h1>
                                    </div>

                                    <?php if (!empty($_GET['success'])): ?>
                                        <div class="alert alert-success text-center" role="alert">
                                            <?php echo $_GET['success']; ?>
                                        </div>
                                    <?php elseif (!empty($_GET['error'])): ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            <?php echo $_GET['error']; ?>
                                        </div>
                                    <?php endif; ?>

                                    <form class="user needs-validation" action="assets/includes/forgot_password.php"
                                        method="POST" novalidate>
                                        <div class="form-group has-validation">
                                            <input type="email" class="form-control" id="InputEmail" name="InputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address" required>
                                            <div class="invalid-feedback">Please enter your email.</div>
                                        </div>

                                        <button class="btn btn-primary w-100 btn-block mb-4" type="submit"
                                            id="forgotPasswordBtn" name="forgotPasswordBtn">Forgot Password</button>
                                    </form>
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
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/sub.js"></script>


</body>

</html>