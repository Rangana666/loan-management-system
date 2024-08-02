<?php
include_once("db_connect.php");

if (isset($_GET['b_id'])) {
    $borrowerId = $_GET['b_id'];

    // Fetch total payment from payment table for the selected borrower
    $sqlTotalPayment = "SELECT SUM(payment) AS total_payment FROM payment WHERE borrower_id = '$borrowerId'";
    $resultTotalPayment = mysqli_query($conn, $sqlTotalPayment);
    $rowTotalPayment = mysqli_fetch_assoc($resultTotalPayment);
    $totalPayment = $rowTotalPayment['total_payment'];

    echo json_encode(['total_payment' => $totalPayment]);
} else {
    echo json_encode(['error' => 'Borrower ID not provided']);
}

mysqli_close($conn);
?>
