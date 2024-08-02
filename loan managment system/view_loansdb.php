<?php

require('db_connect.php');

if (isset($_POST['loan_id']) && isset($_POST['new_status'])) {
    $loanId = $_POST['loan_id'];
    $newStatus = $_POST['new_status'];

    // Use prepared statement to prevent SQL injection
    $query = "UPDATE loan SET status = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ii", $newStatus, $loanId);

    if (mysqli_stmt_execute($stmt)) {
        echo "Loan status updated successfully!";
    } else {
        echo "Error updating loan status: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    //echo "Invalid parameters.";
}
?>
