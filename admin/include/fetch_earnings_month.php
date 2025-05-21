<?php
include('../../assets/includes/db_conn.php');

if (isset($_POST['selected_month'])) {
    $selected_month = intval($_POST['selected_month']); // Sanitize the year

    // Use a prepared statement to prevent SQL injection
    $stmt = $link->prepare("SELECT SUM(wr_bill) as total FROM water_reading WHERE wr_status = 'Paid' AND MONTH(wr_date) = ?");
    $stmt->bind_param("i", $selected_month); // Bind the selected year as an integer parameter
    $stmt->execute();

    $result = $stmt->get_result(); // Get the result from the query
    if ($result->num_rows > 0) {
        $ea_row = $result->fetch_assoc();
        echo number_format($ea_row['total'], 2); // Format as currency
    } else {
        echo "0.00";
    }

    $stmt->close(); // Close the prepared statement
}