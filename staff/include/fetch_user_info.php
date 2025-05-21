<?php

include("db_conn.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['id'])) {
    $id = intval($_SESSION['id']); 

    $query = "SELECT * FROM users WHERE u_id = ?";
    
    if ($stmt = mysqli_prepare($link, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $id);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {

        } else {
            echo "No user found with the provided ID.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing the query: " . mysqli_error($link);
    }
} else {
    echo "Session ID is not set.";
}

mysqli_close($link);
