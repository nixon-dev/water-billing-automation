<?php

session_start();

function hasPermission($requiredRole) {
    if (!isset($_SESSION['id']) || $_SESSION['role'] !== $requiredRole) {
        return false;
    }
    return true;
}

if (!hasPermission('Staff')) {
    header('Location: ../403.php');
    session_destroy();
    exit;
} 