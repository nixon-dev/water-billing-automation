<?php

include("../../assets/includes/db_conn.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['update'])) {
    $id = intval($_SESSION['id']);
    $fname = mysqli_real_escape_string($link, $_POST['fname']);
    $lname = mysqli_real_escape_string($link, $_POST['lname']);
    $address = mysqli_real_escape_string($link, $_POST['address']);
    $phone = mysqli_real_escape_string($link, $_POST['phone']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    $query = "UPDATE users SET u_fname = ?, u_lname = ?, u_address = ?, u_phone = ?, u_email = ?, u_password = ? WHERE u_id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ssssssi", $fname, $lname, $address, $phone, $email, $password, $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0){
        $message = "User details updated successfully.";
        header("Location: ../settings.php?success=" . urlencode($message));
    } else {
        $message = "Error preparing query: " . mysqli_error($link);
        header("Location: ../settings.php?error=" . urlencode($message));
    }
}

mysqli_close($link);
