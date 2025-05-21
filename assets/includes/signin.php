<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include('db_conn.php');


if (isset($_POST['InputEmail'])) {
    $email = $_POST['InputEmail'];
}
if (isset($_POST['InputPassword'])) {
    $password = $_POST['InputPassword'];
}



if ((!$email) || (!$password)) {
    $msg = 'Please fill all the fields!';
    header("Location: ../../login.php?error=" . urlencode($msg));
    exit();
} else {


    if (isset($_REQUEST['rememberMe'])) {

        $expiryTime = time() + (30 * 24 * 60 * 60);
        setcookie('email', $_REQUEST['InputEmail'], $expiryTime, "/", "", false, true);
        setcookie('password', $_REQUEST['InputPassword'], $expiryTime, "/", "", false, true);
    }

    $query = "SELECT u_id, CONCAT (u_fname, u_lname) AS fullname, u_email, u_role FROM users WHERE u_email = ? AND u_password = ?";
    if ($queryStmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($queryStmt, "ss", $email, $password);
        mysqli_stmt_execute($queryStmt);
        mysqli_stmt_store_result($queryStmt);

        if (mysqli_stmt_num_rows($queryStmt) > 0) {
            mysqli_stmt_bind_result($queryStmt, $user_id, $fullname, $email, $roles);
            mysqli_stmt_fetch($queryStmt);

            $_SESSION['id'] = $user_id;
            $_SESSION['name'] = $fullname;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $roles;
            $_SESSION['username'] = $username;

            if ($roles == "Administrator") {
                header("Location: ../../admin/");
                exit();
            }
            
            if ($roles == "Staff") {
                header("Location: ../../staff/");
                exit();
            }
            
            if ($roles == "User") {
                header("Location: ../../user/");
                exit();
            }
            exit();
        } else {
            $msg = "Invalid <strong>email</strong> or <strong>password</strong>!";
            header("Location: ../../index.php?error=" . urlencode($msg));
        }
    }



}