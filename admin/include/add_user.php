<?php

include ('../../assets/includes/db_conn.php');

if (isset($_POST['addBtn'])) {

    $fname = $_POST['InputFirstName'];
    $lname = $_POST['InputLastName'];
    $address = $_POST['InputAddress'];
    $email = $_POST['InputEmail'];
    $password = $_POST['InputPassword'];
    $repeatpassword = $_POST['InputRepeatPassword'];


    $checkName = "SELECT * FROM users WHERE u_email = ?";
    if ($checkNameStmt = mysqli_prepare($link, $checkName)) {
        mysqli_stmt_bind_param($checkNameStmt, "s", $email);
        mysqli_stmt_execute($checkNameStmt);
        mysqli_stmt_store_result($checkNameStmt);

        if (mysqli_stmt_num_rows($checkNameStmt) > 0) {
            $msg = "Error: $email has already an account";
            header("Location: ../add-users.php?error=" . urlencode($msg));
            mysqli_stmt_close($checkNameStmt);
            exit();
        } 
        mysqli_stmt_close($checkNameStmt);
    } else {
        $msg = "Error checking Email: " . mysqli_error($link);
        header("Location: ../add-users.php?error=" . urlencode($msg));
        exit();
    }


    $insertQuery = "INSERT INTO users (u_fname, u_lname, u_address,  u_email, u_password) VALUES (?, ?, ?, ?, ?)";
    if ($insertStmt = mysqli_prepare($link, $insertQuery)) {
        mysqli_stmt_bind_param($insertStmt, "sssss", $fname, $lname, $address,  $email, $password);
        mysqli_stmt_execute($insertStmt);
        mysqli_stmt_close($insertStmt);

        $msg = "Account created successfully!";
        header("Location: ../add-users.php?message=" . urlencode($msg));
        exit();
    } else {
        $msg = "Error: Unable to insert account" . mysqli_error($link);
        header("Location: ../add-users.php?error=" . urlencode($msg));
        exit();
    }
} else {
    echo "Invalid post";
}
