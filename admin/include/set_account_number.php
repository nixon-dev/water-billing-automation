<?php

include("../../assets/includes/db_conn.php");

if (isset($_POST['setBtn'])) {

    $id = intval($_POST['id']);
    $account_number = $_POST['InputAccountNumber'];
    $senior = $_POST['isSenior'];

    $checkMeter = "SELECT * FROM users WHERE u_account_number = ?";
    if ($checkMeterStmt = mysqli_prepare($link, $checkMeter)) {
        mysqli_stmt_bind_param($checkMeterStmt, "s", $account_number);
        mysqli_stmt_execute($checkMeterStmt);
        mysqli_stmt_store_result($checkMeterStmt);

        if (mysqli_stmt_num_rows($checkMeterStmt) > 0) {
            $msg = "Error: $account_number has already in used";
            header("Location: ../edit-users.php?id=" . urlencode($id) . "&error=" . urlencode($msg));
            mysqli_stmt_close($checkMeterStmt);
            exit();
        }
        mysqli_stmt_close($checkMeterStmt);
    }


    $query = "UPDATE users SET u_account_number = ?, u_senior = ? WHERE u_id = ?";
    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, "sii", $account_number, $senior, $id);
        mysqli_stmt_execute($stmt);

        if (mysqli_affected_rows($link) > 0) {
            $msg = "Account updated successfully!";
            header("Location: ../users.php?message=" . urlencode($msg));
            exit();
        } else {
            $msg = "Error: Account updated failed!";
            header("Location: ../users.php?error=" . urlencode($msg));
            exit();
        }

    }
}