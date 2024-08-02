<?php
include_once("db_connect.php");

if (isset($_GET['b_id'])) {
    $borrowerId = $_GET['b_id'];

    // Fetch total payment from payment table for the selected borrower
    $sqlTotalPayment = "SELECT SUM(payment) AS total_payment FROM payment WHERE borrower_id = '$borrowerId'";
    $resultTotalPayment = mysqli_query($conn, $sqlTotalPayment);
    $rowTotalPayment = mysqli_fetch_assoc($resultTotalPayment);
    $totalPayment = $rowTotalPayment['total_payment'];

    // Fetch total payment from loan table for the selected borrower
    $sqlLoanTotalPayment = "SELECT totalPayment FROM loan WHERE borrower_id = '$borrowerId'";
    $resultLoanTotalPayment = mysqli_query($conn, $sqlLoanTotalPayment);
    $rowLoanTotalPayment = mysqli_fetch_assoc($resultLoanTotalPayment);
    $loanTotalPayment = $rowLoanTotalPayment['totalPayment'];

    // Calculate remaining payment
    $remainingPayment = $loanTotalPayment - $totalPayment;

    // Fetch total months from loan table for the selected borrower
    $sqlTotalMonths = "SELECT months FROM loan WHERE borrower_id = '$borrowerId'";
    $resultTotalMonths = mysqli_query($conn, $sqlTotalMonths);
    $rowTotalMonths = mysqli_fetch_assoc($resultTotalMonths);
    $totalMonths = $rowTotalMonths['months'];

    // Fetch count of payments from payment table for the selected borrower
    $sqlPaymentsCount = "SELECT COUNT(*) AS payments_count FROM payment WHERE borrower_id = '$borrowerId'";
    $resultPaymentsCount = mysqli_query($conn, $sqlPaymentsCount);
    $rowPaymentsCount = mysqli_fetch_assoc($resultPaymentsCount);
    $paymentsCount = $rowPaymentsCount['payments_count'];

    // Calculate remaining installments
$remainingInstallments = $totalMonths - $paymentsCount;

echo json_encode([
    'remaining_payment' => $remainingPayment,
    'remaining_installments' => $remainingInstallments,
]);
} else {
    echo json_encode(['error' => 'Borrower ID not provided']);
}

mysqli_close($conn);
?>
