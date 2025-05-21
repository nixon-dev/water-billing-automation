<?php
include('db_conn.php');

$query = "SELECT * FROM water_meter";
$result = mysqli_query($link, $query);

if (!$result) {
    die('Invalid query: ' . mysqli_error($link));
}

$consumers = array();
while ($row_consumers = mysqli_fetch_assoc($result)) {
    $consumers[] = $row_consumers;
}

