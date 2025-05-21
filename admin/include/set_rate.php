<?php

include("../../assets/includes/db_conn.php");

if (isset($_POST['setBtn'])) {

    $id = $_POST['id'];

    $query = "UPDATE users SET rate_id = ? WHERE u_id = ?";
    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, "ss", $rateType, $id);
        mysqli_stmt_execute($stmt);

        if (mysqli_affected_rows($link) > 0) {
            $msg = "Rate updated successfully!";
            header("Location: ../users.php?message=" . urlencode($msg));
            exit();
        } else {
            $msg = "Error: Rate updated failed!";
            header("Location: ../users.php?error=" . urlencode($msg));
            exit();
        }

    }
}