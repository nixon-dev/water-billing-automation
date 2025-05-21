<?php
include('db_conn.php');

if (!$link) {
    echo "Connection to DB failed!";
}

if(isset($_POST['u_id'])) {
    $u_id = $_POST['u_id'];

    $query = "SELECT *
              FROM water_meter 
              WHERE wm_meter_number = '$u_id'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    echo $row['rate_id'];    
}