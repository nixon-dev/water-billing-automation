<?php
include('../assets/includes/db_conn.php');

$allBillQuery = "SELECT wr.*, u.u_fname, u.u_lname,  u.u_address 
          FROM water_reading wr 
          LEFT JOIN users u ON wr.u_id = u.u_id 
          WHERE u.u_role = ?
          ORDER BY updated_at DESC";

$role = 'User';
$allBillStmt = mysqli_prepare($link, $allBillQuery);
mysqli_stmt_bind_param($allBillStmt, "s", $role);
mysqli_stmt_execute($allBillStmt);
$allBillResult = mysqli_stmt_get_result($allBillStmt);

$bills = array();
while ($row = mysqli_fetch_array($allBillResult, MYSQLI_ASSOC)) {
    $bills[] = $row;
}


$unpaidBillQuery = "SELECT wr.*, u.u_fname, u.u_lname,  u.u_address 
          FROM water_reading wr 
          LEFT JOIN users u ON wr.u_id = u.u_id 
          WHERE u.u_role = ? AND wr_status = ?
          ORDER BY updated_at DESC";

$role = 'User';
$status = 'Unpaid';
$unpaidBillStmt = mysqli_prepare($link, $unpaidBillQuery);
mysqli_stmt_bind_param($unpaidBillStmt, "ss", $role, $status);
mysqli_stmt_execute($unpaidBillStmt);
$unpaidBillresult = mysqli_stmt_get_result($unpaidBillStmt);

$unpaid_bills = array();
while ($row = mysqli_fetch_array($unpaidBillresult, MYSQLI_ASSOC)) {
    $unpaid_bills[] = $row;
}

$paidBillQuery = "SELECT wr.*, u.u_fname, u.u_lname,  u.u_address 
          FROM water_reading wr 
          LEFT JOIN users u ON wr.u_id = u.u_id 
          WHERE u.u_role = ? AND wr_status = ?
          ORDER BY updated_at DESC";

$role = 'User';
$status = 'Paid';
$paidBillStmt = mysqli_prepare($link, $paidBillQuery);
mysqli_stmt_bind_param($paidBillStmt, "ss", $role, $status);
mysqli_stmt_execute($paidBillStmt);
$paidBillresult = mysqli_stmt_get_result($paidBillStmt);

$paid_bills = array();
while ($row = mysqli_fetch_array($paidBillresult, MYSQLI_ASSOC)) {
    $paid_bills[] = $row;
}