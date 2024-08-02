<?php

require 'dbcon.php';

if (isset($_POST['save_borrower'])) {
    $id = mysqli_real_escape_string($con, $_POST['b_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $garanter1 = mysqli_real_escape_string($con, $_POST['garanter1']);
    $garanter2 = mysqli_real_escape_string($con, $_POST['garanter2']);

    if ($id == NULL || $name == NULL || $address == NULL || $contact == NULL || $garanter1 == NULL || $garanter2 == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO borrowers (b_id, name, address, contact, garanter1, garanter2) VALUES ('$id', '$name', '$address', '$contact', '$garanter1', '$garanter2')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Borrower Created Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Borrower Not Created'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['update_borrower'])) {
    $borrower_id = mysqli_real_escape_string($con, $_POST['borrower_id']);

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $garanter1 = mysqli_real_escape_string($con, $_POST['garanter1']);
    $garanter2 = mysqli_real_escape_string($con, $_POST['garanter2']);
    $dates = mysqli_real_escape_string($con, $_POST['dates']);

    if ($id == NULL || $name == NULL || $address == NULL || $contact == NULL || $garanter1 == NULL || $garanter2 == NULL || $dates == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE borrowers SET b_id='$id', name='$name', address='$address', contact='$contact', garanter1='$garanter1', garanter2='$garanter2', dates='$dates' WHERE b_id='$borrower_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Borrower Updated Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Borrower Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_GET['borrower_id'])) {
    $borrower_id = mysqli_real_escape_string($con, $_GET['borrower_id']);

    $query = "SELECT * FROM borrowers WHERE b_id='$borrower_id'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) == 1) {
        $borrower = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Borrower Fetch Successfully by id',
            'data' => $borrower
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Borrower Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['delete_borrower'])) {
    $borrower_id = mysqli_real_escape_string($con, $_POST['borrower_id']);

    $query = "DELETE FROM borrowers WHERE b_id='$borrower_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Borrower Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Borrower Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>
