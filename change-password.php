<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">


    <!-- Change this to the correct title -->
    <title>Change Password - Diffun Water District</title>

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
                                        <h1 class="h4 text-gray-900 mb-4">Login your Account</h1>
                                    </div>

                                    <?php if (!empty($_GET['message'])): ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Invalid <strong>email</strong> or <strong>password!</strong>
                                        </div>
                                    <?php endif; ?>

                                    <?php

                                    $email = $_GET['code'];
                                    $key = "nanashi_was_here"; // Must be 16, 24, or 32 bytes for AES
                                    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

                                    $email = base64_decode($email);
                                    $iv = substr($email, 0, openssl_cipher_iv_length('aes-256-cbc'));
                                    $ciphertext = substr($email, openssl_cipher_iv_length('aes-256-cbc'));

                                    $decrypted = openssl_decrypt($ciphertext, 'aes-256-cbc', $key, 0, $iv);

                                    // echo $email;
                                    // echo $decrypted;
                                    
                                    ?>




                                    <form class="user needs-validation" action="assets/includes/change_password.php"
                                        method="POST">
                                        <div class="form-group has-validation">
                                            <input type="email" class="form-control" id="InputEmail" name="InputEmail"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address"
                                                value="<?php echo $decrypted; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="InputPassword"
                                                name="InputPassword" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="InputRepeatPassword"
                                                name="InputRepeatPassword" placeholder="Repeat Password" required>
                                        </div>

                                        <button class="btn btn-primary w-100 btn-block mb-4" type="submit"
                                            id="submitPasswordBtn" name="submitPasswordBtn">Change Password</button>
                                    </form>
                                    <div class="row">
                                        <div class="col-lg-6 text-left">
                                            <a href="forgot-password.php">Forgot Password?</a>
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <a href="register.php">Create an Account!</a>
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
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/sub.js"></script>
    <script>
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