<?php
// form data save 

include_once("db_connect.php");

if (isset($_POST['pay'])) {
    //echo "database connerct";
    $borrower=$_POST['borrower'];
    $payment =$_POST['payment'];

    $query = "INSERT INTO payment (borrower_id,payment) VALUES ('$borrower' , '$payment')";
    $result = mysqli_query($conn , $query);

    if ($result) {
        //echo "data save into database";
        header('Location:payment.php?data_saved');
    }else{
        echo "data save fail";
    }



}

?>