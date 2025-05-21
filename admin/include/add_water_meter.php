<?php

include('../../assets/includes/db_conn.php');


if (isset($_POST['insertBtn'])) {
    $u_id = intval($_POST['id']);
    $account_number = intval($_POST['inputAccountNumber']);
    $meter_number = $_POST['InputWaterNumber'];
    $rate_id = intval($_POST['InputRateType']);

    $checkMeter = "SELECT * FROM water_meter WHERE wm_meter_number = ?";
    if ($checkMeterStmt = mysqli_prepare($link, $checkMeter)) {
        mysqli_stmt_bind_param($checkMeterStmt, "s", $meter_number);
        mysqli_stmt_execute($checkMeterStmt);
        mysqli_stmt_store_result($checkMeterStmt);

        if (mysqli_stmt_num_rows($checkMeterStmt) > 0) {
            $msg = "Error: $meter_number has already in used";
            header("Location: ../edit-users.php?id=" . urlencode($u_id) . "&error=" . urlencode($msg));
            mysqli_stmt_close($checkMeterStmt);
            exit();
        }
        mysqli_stmt_close($checkMeterStmt);
    }

    $insertQuery = "INSERT INTO water_meter (u_id, u_account_number, wm_meter_number, rate_id) VALUES (?, ?, ?, ?)";
    if ($insertStmt = mysqli_prepare($link, $insertQuery)) {
        mysqli_stmt_bind_param($insertStmt, "iisi", $u_id, $account_number, $meter_number, $rate_id);
        mysqli_stmt_execute($insertStmt);
        mysqli_stmt_close($insertStmt);

        $msg = "Water Meter inserted successfully!";
        header("Location: ../edit-users.php?id=" . urlencode(string: $u_id) . "&message=" . urlencode($msg));
        exit();
    } else {
        $msg = "Error: Unable to insert Water Meter!";
        header("Location: ../edit-users.php?id=" . urlencode(string: $u_id) . "&error=" . urlencode($msg));
        exit();

    }
} else {
    header("Location: ../users.php");
    exit();

}