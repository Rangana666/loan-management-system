<?php
include_once("db_connect.php");

if (isset($_GET['b_id'])) {
    $borrowerId = $_GET['b_id'];

    $sql = "SELECT * FROM loan WHERE borrower_id = '$borrowerId' ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $loanData = mysqli_fetch_assoc($result);

        // Send loan details as JSON response
        echo json_encode($loanData);
    } else {
        // Handle query error
        echo json_encode(['error' => 'Failed to fetch loan details.']);
    }
} else {
    // Handle missing borrower ID parameter
    echo json_encode(['error' => 'Borrower ID not provided.']);
}


?>
