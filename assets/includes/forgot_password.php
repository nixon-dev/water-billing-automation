<?php

include('db_conn.php');
require('forgot_mailer.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['forgotPasswordBtn'])) {
    $email = mysqli_real_escape_string($link, $_POST['InputEmail']);

    $checkEmail = "SELECT * FROM users WHERE u_email = ?";
    if ($checkEmailStmt = mysqli_prepare($link, $checkEmail)) {
        mysqli_stmt_bind_param($checkEmailStmt, "s", $email);
        mysqli_stmt_execute($checkEmailStmt);
        mysqli_stmt_store_result($checkEmailStmt);

        if (mysqli_stmt_num_rows($checkEmailStmt) > 0) {

            $key = "nanashi_was_here"; // Must be 16, 24, or 32 bytes for AES
            $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

            // Encrypt
            $encrypted = openssl_encrypt($email, 'aes-256-cbc', $key, 0, $iv);
            $encrypted = base64_encode($iv . $encrypted);
            $url_encoded_email = urlencode($encrypted);


            $_SESSION['forgotpasscode'] = $url_encoded_email;
            $_SESSION['email'] = $email;

            sendmail($email, $url_encoded_email);


        } else {
            $msg = "Account with $email does not exist.";
            header("Location: ../../forgot-password.php?error=" . urlencode($msg));
            mysqli_stmt_close($checkEmailStmt);
            exit();
        }


    }
}

