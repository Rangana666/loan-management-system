<?php
include_once("db_connect.php");

if (isset($_GET['b_id'])) {
    $borrowerId = $_GET['b_id'];

    $sql = "SELECT MAX(pay_date) AS latest_pay_date FROM payment WHERE borrower_id = '$borrowerId'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row['latest_pay_date']) {
            $payDate = $row['latest_pay_date'];
            echo json_encode(['pay_date' => $payDate]);
        } else {
            echo json_encode(['pay_date' => null]);
        }

        mysqli_free_result($result);
    } else {
        echo json_encode(['pay_date' => null]);
    }
} else {
    echo json_encode(['pay_date' => null]);
}

mysqli_close($conn);
?>
