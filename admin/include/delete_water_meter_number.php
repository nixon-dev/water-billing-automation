<?php
include('../../assets/includes/db_conn.php');

$id = intval($_GET['id']);

if (!isset($_GET['wmid']) || !is_numeric($_GET['wmid'])) {
    header('Location: ../edit-users.php?id?='. $id . '&error=Invalid%20Water%20Meter%20Number');
    exit;
}

$wmid = intval($_GET['wmid']);
$query = "DELETE FROM water_meter WHERE wm_id = ?";

$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "i", $wmid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_affected_rows($stmt); 

if ($result > 0) {
    $message = "Water Meter Number has been deleted successfully!";
    header("Location: ../edit-users.php?id=" . $id . "&success=". $message);
} else {
    $message = "Error: Water Meter Number has not been deleted!";
    header("Location: ../edit-users.php??id=" . $id . "&error=". $message);
}

exit();