<?php
include('../assets/includes/db_conn.php');

$query = "SELECT wr.*, u.*
          FROM water_reading wr 
          LEFT JOIN users u ON wr.u_id = u.u_id 
          WHERE u.u_role = ? AND wr.wr_status = ?
          ORDER BY u.updated_at DESC";

$role = 'User';
$status = 'Unpaid';
$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "ss", $role, $status);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$bills = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $bills[] = $row;
}