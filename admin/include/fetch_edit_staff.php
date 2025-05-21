<?php

ob_start();
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $role = 'Staff';

    $query = "SELECT * FROM users WHERE u_id = ? AND u_role = ?";

    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "is", $id, $role);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $fname = $row['u_fname'];
        $lname = $row['u_lname'];
        $email = $row['u_email'];
        $password = $row['u_password'];
    } else {
        echo '<meta http-equiv="refresh" content="0;url=../admin/users.php">';
        exit;
    }

} else {
    echo '<meta http-equiv="refresh" content="0;url=../admin/users.php">';
    exit;
}

ob_end_flush();