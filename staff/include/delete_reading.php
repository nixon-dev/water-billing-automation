<?php
include('../../assets/includes/db_conn.php');


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: ../index.php?error=Invalid%20Bill');
    exit;
}

$id = intval($_GET['id']);
$query = "DELETE FROM water_reading WHERE wr_id = ?";

$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_affected_rows($stmt); 

if ($result > 0) {
    $message = "Water Meter Reading has been deleted successfully!";
    header("Location: ../index.php?success=". $message);
} else {
    $message = "Error: Water Meter Reading has not been deleted!";
    header("Location: ../index.php?error=". $message);
}

exit();