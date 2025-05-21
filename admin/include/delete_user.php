<?php
include('../../assets/includes/db_conn.php');


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: ../users.php?error=Invalid%20User%20ID');
    exit;
}

$id = $_GET['id'];
$query = "DELETE FROM users WHERE u_id = ?";

$stmt = mysqli_prepare($link, $query);
mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_affected_rows($stmt); 

if ($result > 0) {
    $message = "User has been deleted successfully!";
    header("Location: ../users.php?success=". $message);
} else {
    $message = "Error: User has not been deleted!";
    header("Location: ../users.php?error=". $message);
}

exit();