<?php

session_start();

function hasPermission($requiredRole) {
    if (!isset($_SESSION['id']) || $_SESSION['role'] !== $requiredRole) {
        return false;
    }
    return true;
}

if (!hasPermission('Administrator')) {
    header('Location: ../403.php');
    session_destroy();
    exit;
} 