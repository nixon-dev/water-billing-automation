<?php
include('../assets/includes/db_conn.php');

$u_id = $_SESSION['id'];
$query = "SELECT * FROM water_reading WHERE u_id = '$u_id' ORDER BY wr_date ASC";
$result = mysqli_query($link, $query);

$bills = array();
$total_unpaid_bills = 0;

while ($row = mysqli_fetch_assoc($result)) {
    $bills[] = $row;
    if ($row['wr_status'] == 'Unpaid') {
        $total_unpaid_bills += $row['wr_bill'];
    }
}

if (!empty($bills)) {
    $last_bill = end($bills);
    $current_reading = $last_bill["wr_reading"];
    $previous_reading = $last_bill["wr_rlm"];
    $bill = $last_bill["wr_bill"];
    $total_consumption = $last_bill["wr_twc"];
} else {
    $current_reading = '0';
    $previous_reading = '0';
    $bill = '0';
    $total_consumption = '0';
}

mysqli_close($link);