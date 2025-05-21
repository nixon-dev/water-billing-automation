<?php

ob_start();
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $query = "SELECT * FROM users WHERE u_id = ?";

    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $fname = $row['u_fname'];
        $lname = $row['u_lname'];
        $account_number = $row['u_account_number'];
        $senior = $row['u_senior'];
    } else {
        echo '<meta http-equiv="refresh" content="0;url=../admin/users.php">';
        exit;
    }

} else {
    echo '<meta http-equiv="refresh" content="0;url=../admin/users.php">';
    exit;
}

ob_end_flush();