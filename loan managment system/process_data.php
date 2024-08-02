<?php

//process_data.php

if (isset($_POST["name"])) {
    sleep(5);
    $connect = new PDO("mysql:host=localhost; dbname=testing", "root", "");

    if (!$connect) {
        die("Connection failed: " . $connect->errorInfo());
    }

    $success = '';

    $name = $_POST["name"];

    $interest = $_POST["interest"];

    $rate = $_POST["rate"];

    $comment = $_POST["comment"];

    $name_error = '';
    $interest_error = '';
    $rate_error = '';
    $comment_error = '';

    if (empty($name)) {
        $name_error = 'Name is Required';
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $name_error = 'Only Letters and White Space Allowed';
        }
    }

    if (empty($interest)) {
        $interest_error = 'Interest is Required';
    } else {
        if (!filter_var($interest, FILTER_VALIDATE_EMAIL)) {
            $interest_error = 'Interest is invalid';
        }
    }

    if (empty($rate)) {
        $rate_error = 'Rate is Required';
    } else {
        if (!is_numeric($rate)) {
            $rate_error = 'Invalid Rate';
        }
    }

    if (empty($comment)) {
        $comment_error = 'Comment is Required Field';
    }

    if ($name_error == '' && $interest_error == '' && $rate_error == '' && $comment_error == '') {
        $data = array(
            ':name'      => $name,
            ':interest'  => $interest,
            ':rate'      => $rate,
            ':comment'   => $comment,
        );

        $query = "
        INSERT INTO loan_plan 
        (name, interest, rate, comment) 
        VALUES (:name, :interest, :rate, :comment)
        ";

        $statement = $connect->prepare($query);

        $statement->execute($data);

        $success = '<div class="alert alert-success">Data Saved</div>';
    }

    $output = array(
        'success'        => $success,
        'name_error'     => $name_error,
        'interest_error' => $interest_error,
        'rate_error'     => $rate_error,
        'comment_error'  => $comment_error,
    );

    echo json_encode($output);
}
