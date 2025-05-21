<?php
include('../assets/includes/db_conn.php');

$query = "SELECT * FROM rates";

$stmt = mysqli_prepare($link, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$rates = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $rates[] = $row;
}