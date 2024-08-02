<?php

require('db_connect.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);
$response = [
    'status' => 500,
    'message' => 'Internal Server Error',
    'data' => null,
];

if (isset($_GET['loan_id'])) {
    $loan_id = mysqli_real_escape_string($conn, $_GET['loan_id']);

    // Use JOIN to get data from 'loan' and 'borrowers' tables
    $query = "SELECT loan.*, borrowers.name, borrowers.contact, borrowers.address, borrowers.garanter1, borrowers.garanter2
              FROM loan
              JOIN borrowers ON loan.borrower_id = borrowers.b_id
              WHERE loan.id='$loan_id'";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        if (mysqli_num_rows($query_run) == 1) {
            $loan = mysqli_fetch_assoc($query_run);

            $response = [
                'status' => 200,
                'message' => 'Loan fetched successfully',
                'data' => $loan,
            ];
        } else {
            $response = [
                'status' => 404,
                'message' => 'Loan ID not found',
                'data' => null,
            ];
        }
    } else {
        // Log the error
        error_log("MySQL Error: " . mysqli_error($conn));

        $response = [
            'status' => 500,
            'message' => 'Query execution error',
            'data' => null,
        ];
    }
}

echo json_encode($response);
?>
