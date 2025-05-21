<?php
include('../assets/includes/db_conn.php');

if (isset($_GET['id'])) {

    $id = intval($_GET['id']);

    $query = "SELECT *
          FROM water_meter
          WHERE u_account_number = ?";

    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $watermeters = array();
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $watermeters[] = $row;
    }

}

