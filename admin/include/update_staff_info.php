<?php

include("../../assets/includes/db_conn.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['setBtn'])) {
    $id = intval($_POST['id']);
    $fname = mysqli_real_escape_string($link, $_POST['InputFirstName']);
    $lname = mysqli_real_escape_string($link, $_POST['InputLastName']);
    $email = mysqli_real_escape_string($link, $_POST['InputEmail']);
    $password = mysqli_real_escape_string($link, $_POST['InputPassword']);

    $query = "UPDATE users SET u_fname = ?, u_lname = ?, u_email = ?, u_password = ? WHERE u_id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $fname, $lname, $email, $password, $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0){
        $message = "Staff details updated successfully.";
        header("Location: ../staff.php?success=" . urlencode($message));
    } else {
        $message = "Error preparing query: " . mysqli_error($link);
        header("Location: ../staff.php?error=" . urlencode($message));
    }
}

mysqli_close($link);
