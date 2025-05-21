<?php
include('db_conn.php');


if (!$link) {
    echo "Connection to DB failed!";
}


if (isset($_POST['u_id'])) {
    $wm_id = $_POST['u_id'];
    $query = "SELECT u_id
              FROM water_meter
              WHERE wm_meter_number	 = '$wm_id'";
    $result = mysqli_query($link, $query);
    if ($result && mysqli_num_rows($result) >= 1) {
        $row = mysqli_fetch_assoc($result);
        $u_id = $row['u_id'];

        $uquery = "SELECT u_senior FROM users WHERE u_id = '$u_id'";
        $uresult = mysqli_query($link, $uquery);

        if ($uresult && mysqli_num_rows($uresult) > 0) {
            $urow = mysqli_fetch_assoc($uresult);
            $senior = $urow['u_senior'];
            echo $senior;
        } else {
            echo "0";
        }
    } else {
        $senior = 0;
        echo $wm_id;
    }
}