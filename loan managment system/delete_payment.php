<?php
require('db_connect.php');

$response = ['status' => 500, 'message' => 'Unknown error occurred.'];

if (isset($_POST['payment_id'])) {
    $paymentId = mysqli_real_escape_string($conn, $_POST['payment_id']);

    $query = "DELETE FROM payment WHERE id='$paymentId'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $response = [
            'status' => 200,
            'message' => 'Payment record deleted successfully.'
        ];
    } else {
        $response['message'] = 'Error: ' . mysqli_error($conn);
    }
}

echo json_encode($response);
?>
