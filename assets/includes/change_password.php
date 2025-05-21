<?php

include('db_conn.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['submitPasswordBtn'])) {
    $email = mysqli_real_escape_string($link, $_POST['InputEmail']);
    $password = mysqli_real_escape_string($link, $_POST['InputPassword']);


    $query = "UPDATE users SET u_password = ? WHERE u_email = ?";
    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, "ss", $password, $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_affected_rows($stmt);

        if ($result > 0) {
            $message = "Password has been changed successfully!";
            header("Location: ../../index.php?message=" . urlencode($message));
            exit();
        } else {
            $message = "Error: Unable to change password!";
            header("Location: ../../forgot-password.php?error=" . urlencode($message));
            exit();
        }
    } else {
        $message = "An error occurred. Please try again later.";
        header("Location: ../../forgot-password?error=" . urlencode($message));
        exit();
    }
}