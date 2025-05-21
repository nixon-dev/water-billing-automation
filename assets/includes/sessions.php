<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    // Start the session
    session_start();
}
include('db_conn.php');

if (!isset($_SESSION['id'])) {
    // Redirect to login page if user is not logged in
    session_destroy();
    header('Location: ../login.php');
    exit;
}

$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE u_id = $id";
$result = mysqli_query($link, $query);
if ($result && mysqli_num_rows($result) >= 0) {
    $row = mysqli_fetch_assoc($result);
    $fname = $row['u_fname'];
    $lname = $row['u_lname'];
    $name = "$fname $lname";
    $roles = $row['u_role'];
    $email = $row['u_email'];
} else {
    $name = 'Unknown';
    $roles = 'Unknown';
}

