<?php

include("../../assets/includes/db_conn.php");


if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($link, $_GET['id']);
    $status = "Unpaid";

    $query = "UPDATE water_reading SET wr_status = ? WHERE wr_id = ?";
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "si", $status, $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0){
        $message = "Bill details updated successfully.";
        header("Location: ../index.php?success=" . urlencode($message));
    } else {
        $message = "Error preparing query: " . mysqli_error($link);
        header("Location: ../index.php?error=" . urlencode($message));
    }
}

mysqli_close($link);
