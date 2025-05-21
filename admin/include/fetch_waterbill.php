<?php
include('../assets/includes/db_conn.php');


$em_query = "SELECT
SUM(wr_bill) as total
FROM
water_reading
WHERE wr_status = 'Paid' 
AND MONTH(wr_date) = MONTH(CURRENT_DATE);";
$em_result = mysqli_query($link, $em_query);
if (mysqli_num_rows($em_result) > 0) {
    $em_row = mysqli_fetch_array($em_result);
    $earnings_monthly = $em_row['total'];
} else {
    $earnings_monthly = 0;
}

$ea_query = "SELECT
SUM(wr_bill) as total
FROM
water_reading
WHERE wr_status = 'Paid' 
AND YEAR(wr_date) = YEAR(CURRENT_DATE);";
$ea_result = mysqli_query($link, $ea_query);
if (mysqli_num_rows($ea_result) > 0) {
    $ea_row = mysqli_fetch_array($ea_result);
    $earning_annually = $ea_row['total'];
} else {
    $earning_annually = 0;
}

$tub_query = "SELECT SUM(CASE WHEN wr_status = 'Unpaid' THEN CAST(wr_bill AS FLOAT) ELSE 0 END) as total_unpaid FROM water_reading";
$tub_result = mysqli_query($link, $tub_query);
if (mysqli_num_rows($tub_result) > 0) {
    $tub_row = mysqli_fetch_array($tub_result);
    $total_unpaid_bills = $tub_row['total_unpaid'];
} else {
    $total_unpaid_bills = 0;
}


$count_query = "SELECT COUNT(wr_bill) AS bill FROM water_reading";
$count_result = mysqli_query($link, $count_query);
if ($count_result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($count_result)) {
        $tc = $row["bill"];
    }
}

$paid_query = "SELECT COUNT(wr_bill) AS bill FROM water_reading WHERE wr_status = 'Paid'";
$paid_result = mysqli_query($link, $paid_query);
if ($paid_result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($paid_result)) {
        $pc = $row["bill"];
    }
}

if (!empty($pc) && !empty($tc)) {
    $percentage = ($pc / $tc) * 100;
} else {
    $percentage = 0;
}


mysqli_close($link);