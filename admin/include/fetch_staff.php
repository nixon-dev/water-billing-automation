<?php
include('../assets/includes/db_conn.php');

$query = "SELECT u.* 
          FROM users u 
          WHERE u.u_role = ?";

$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "s", $role);
$role = 'Staff';
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$users = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $users[] = $row;
    $fname = $row['u_fname'];
    $lname = $row['u_lname'];
}