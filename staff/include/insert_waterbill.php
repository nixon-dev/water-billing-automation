<?php

include('db_conn.php');

$allowed_types = ["image/jpeg", "image/png", "image/gif", "image/webp"]; // Define allowed types if not already defined



function sanitize_and_format_number($input)
{
    $sanitized_input = preg_replace('/[^0-9.]/', '', $input);
    return is_numeric($sanitized_input) ? (float) $sanitized_input : "Invalid number format";
}



function calculate_bill($type, $reading)
{
    if (!is_numeric($reading) || $reading < 0) {
        return "Invalid reading";
    }

    if ($type == 'Residential/Government') {
        if ($reading <= 10) {
            $bill = 333.00;
        } elseif ($reading <= 20) {
            $bill = 330.0 + ($reading - 10) * 36.65;
        } elseif ($reading <= 30) {
            $bill = 736.95 + ($reading - 21) * 40.45;
        } elseif ($reading <= 40) {
            $bill = 1145.60 + ($reading - 31) * 44.60;
        } else {
            $bill = 1595.75 + ($reading - 41) * 48.75;
        }
    } elseif ($type == 'Government I') {
        if ($reading <= 10) {
            $bill = 1056.0;
        } elseif ($reading <= 20) {
            $bill = 1056.0 + ($reading - 10) * 36.65;
        } elseif ($reading <= 30) {
            $bill = 1462.95 + ($reading - 21) * 40.45;
        } elseif ($reading <= 40) {
            $bill = 1871.60 + ($reading - 31) * 44.60;
        } else {
            $bill = 2321.75 + ($reading - 41) * 48.75;
        }
    } elseif ($type == 'Commercial A') {
        if ($reading <= 10) {
            $bill = 577.50;
        } elseif ($reading <= 20) {
            $bill = 577.50 + ($reading - 10) * 64.10;
        } elseif ($reading <= 40) {
            $bill = 1289.25 + ($reading - 31) * 70.75;
        } else {
            $bill = 2791.80 + ($reading - 41) * 85.30;
        }
    } elseif ($type == 'Commercial B') {
        if ($reading <= 10) {
            $bill = 495.00;
        } elseif ($reading <= 20) {
            $bill = 495.00 + ($reading - 10) * 54.95;
        } elseif ($reading <= 30) {
            $bill = 1105.15 + ($reading - 21) * 60.65;
        } elseif ($reading <= 40) {
            $bill = 1717.90 + ($reading - 31) * 66.90;
        } else {
            $bill = 2393.10 + ($reading - 41) * 73.10;
        }
    } elseif ($type == 'Commercial Industrial') {
        if ($reading <= 10) {
            $bill = 660.00;
        } elseif ($reading <= 20) {
            $bill = 660.00 + ($reading - 10) * 73.30;
        } elseif ($reading <= 30) {
            $bill = 1473.90 + ($reading - 21) * 80.90;
        } else {
            $bill = 1871.60 + ($reading - 41) * 97.50;
        }
    } else {
        $message = "Invalid Rate Type";
        header(header: "Location: ../watermetre.php?message=" . urlencode("$message"));
    }
    return number_format($bill, 2);
}


if (isset($_POST["submitBtn"])) {

    $consumer_id = intval($_POST['consumerName']);
    $wm_meter_number = intval($_POST['consumerMeterNumber']);
    $crt = $_POST['consumerRateType'];
    $consumer_rtm = sanitize_and_format_number($_POST["consumerRTM"]);
    $senior = intval($_POST['senior']);
    $consumer_rlm = empty($_POST['consumerRLM']) ? 0 : sanitize_and_format_number($_POST["consumerRLM"]);


    if (
        $_FILES["consumerPFF"]["error"] == UPLOAD_ERR_OK &&
        is_uploaded_file($_FILES["consumerPFF"]["tmp_name"]) &&
        in_array($_FILES["consumerPFF"]["type"], $allowed_types) &&
        $_FILES["consumerPFF"]["size"] <= 5000000 &&
        $_FILES["consumerPFF"]["size"] > 0
    ) {

        $date = date("Y-m-d");

        $duedate = date("Y-m-d", strtotime('+1 Month', strtotime($date)));

        // Total Water Consumption
        $twc = ($consumer_rtm - $consumer_rlm);
        if ($twc < 0) {
            $twc = 0;
        }




        // echo "consumer_rtm: $consumer_rtm<br>";
        // echo "consumer_rlm: $consumer_rlm<br>";
        // echo "twc: $twc<br>";
        // echo "rate type: $crt<br>";


        $bill = calculate_bill($crt, $twc);



        $bill_status = "Unpaid";
        $f_twc = number_format($twc, 2);

        $file_extension = pathinfo($_FILES["consumerPFF"]["name"], PATHINFO_EXTENSION);
        $file_name = uniqid() . "." . $file_extension;
        $tmp_file = $_FILES["consumerPFF"]["tmp_name"];
        $dest_file = "../../assets/proofs/" . $file_name;
        move_uploaded_file($tmp_file, $dest_file);

        $formatted_bill = str_replace(",", "", $bill);



        // Franchice Tax
        $ftax_bill = (floatval($formatted_bill) * 0.02) + $formatted_bill;

        // Senior Discount 5%
        $senior_discount = 0;
        if ($senior == 1) {
            if ((int) $twc <= 30) {
                $senior_discount = (floatval($ftax_bill) * 0.05);
            }
        }

        // Substract Senior Discount
        $ftax_bill = $ftax_bill - $senior_discount;

        // After Due Date Bill
        $afterdue_bill = (floatval($ftax_bill) * 0.1) + $ftax_bill;







        $query = "INSERT INTO water_reading (u_id, wm_meter_number, wr_date, wr_due_date, wr_rlm, wr_reading,wr_twc, wr_bill, wr_ftax_bill, wr_senior_discount, wr_due_bill, wr_type, wr_proof, wr_status)
        VALUES ('$consumer_id', '$wm_meter_number', '$date', '$duedate', '$consumer_rlm', '$consumer_rtm','$f_twc', '$formatted_bill', '$ftax_bill', '$senior_discount', '$afterdue_bill' , '$crt', '$file_name', '$bill_status')";
        if ($link->query($query) === TRUE) {
            $message = "Bill recorded successfully";
            header(header: "Location: ../watermetre.php?success=" . urlencode("$message"));
            exit();
        } else {
            $message = $query . $link->error;
            header(header: "Location: ../watermetre.php?error=" . urlencode("$message"));
            exit();
        }

    } else {
        $message = "File upload failed. Please check the file type and size.";
        header(header: "Location: ../watermetre.php?error=" . urlencode("$message"));
        exit();
    }
}
