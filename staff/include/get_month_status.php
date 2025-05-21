<?php
include('db_conn.php');

if (!$link) {
    echo "Connection to DB failed!";
}

if (isset($_POST['u_id'])) {
    $u_id = $_POST['u_id'];

    $query = "SELECT wr_date
              FROM water_reading 
              WHERE wm_meter_number = '$u_id'";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $submittedDate = $row['wr_date'];
    $today = date("Y-m-d");

    $submittedYearMonth = date("Y-m", strtotime($submittedDate));
    $currentYearMonth = date("Y-m", strtotime($today));

    if ($submittedYearMonth === $currentYearMonth) {
        echo False;
    } else {
        echo "You can submit data.";
    }

}