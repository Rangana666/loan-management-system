<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('db_connect.php');

if (isset($_POST['submit'])) {

    $loan = floatval($_POST['loan_amount']);
    $interest_rate = floatval($_POST['interest_rate']);
    $months = $_POST['month'];
    $s_date = $_POST['loanStartDate'];
    $borrowerID = $_POST['borrower'];
    $plan_id = $_POST['plan'];
    $l_status = $_POST['status'];


    $formattedLoanStartDate = date('Y-m-d', strtotime($s_date));


  // Calculate monthly payment
    $monthlyInterestRate = ($interest_rate / 100);
    $monthlyPayment = $loan * $monthlyInterestRate / (1 - pow(1 + $monthlyInterestRate, -$months));

    // Calculate totalInterest, totalPayment, and loanEndDate
    $totalInterest = 0;
    $totalPayment = 0;
    $loanEndDate = date('Y-m-d', strtotime($s_date . ' +' . $months . ' months'));

    // Calculate totalInterest and totalPayment
    for ($i = 1; $i <= $months; $i++) {
        $interest = $loan * $monthlyInterestRate;
        $totalInterest += $interest;
        $totalPayment += $monthlyPayment;

        //$loan -= $monthlyPayment - $interest;
        $totalInterest = $totalPayment-$loan;

    }
    // Using prepared statement to prevent SQL injection
    $query = "INSERT INTO `loan` (borrower_id, plan_id, loan_amount, interest_rate, months, loan_startdate, monthlyPayment, totalInterest, totalPayment, loanEndDate,status) VALUES (?, ?, ?,?,?,?,?,?,?,?,?)";

    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssddisdddsi",$borrowerID,$plan_id, $loan, $interest_rate, $months, $s_date, $monthlyPayment, $totalInterest, $totalPayment, $loanEndDate,$l_status);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header("Location:view_loans.php?data saved");
    } else {
        echo "Data save fail<br>";
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo 'Try again';
}
?>


