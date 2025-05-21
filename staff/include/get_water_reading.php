<?php
include('db_conn.php');


if (!$link) {
    echo "Connection to DB failed!";
}


if (isset($_POST['u_id'])) {
    $u_id = $_POST['u_id'];
    $query = "SELECT wr_reading as last_reading 
              FROM water_reading 
              WHERE wm_meter_number = '$u_id' ORDER BY wr_date DESC, wr_id DESC LIMIT 1";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) >= 1) {
        $row = mysqli_fetch_assoc($result);
        $last_reading = $row['last_reading'];
        echo number_format($last_reading, 2);
    }else {
        $last_reading = 0;
        echo number_format($last_reading, 2);
    }
}