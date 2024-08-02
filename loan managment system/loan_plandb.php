<?php

require 'dbcon.php';

if(isset($_POST['save_plan']))
{
   
    $name = mysqli_real_escape_string($con, $_POST['plan_name']);
    $interest = mysqli_real_escape_string($con, $_POST['interest']);
    $rate = mysqli_real_escape_string($con, $_POST['rate']);
    $discription = mysqli_real_escape_string($con, $_POST['discription']);
   

    if($name == NULL || $interest == NULL || $rate == NULL || $discription == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO loan_plan (plan_name,interest,rate,discription) VALUES ('$name','$interest','$rate','$discription')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'plan Created Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'plan Not Created'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['update_plan']))
{
    $plan_id = mysqli_real_escape_string($con, $_POST['plan_id']);

   
    $name = mysqli_real_escape_string($con, $_POST['plan_name']);
    $interest = mysqli_real_escape_string($con, $_POST['interest']);
    $rate = mysqli_real_escape_string($con, $_POST['rate']);
    $discription = mysqli_real_escape_string($con, $_POST['discription']);
  

    if($name == NULL || $interest == NULL || $rate == NULL || $discription == NULL )
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "UPDATE loan_plan SET plan_name='$name', interest='$interest', rate='$rate', discription='$discription' WHERE id='$plan_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'plan Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'plan Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_GET['plan_id']))
{
    $plan_id = mysqli_real_escape_string($con, $_GET['plan_id']);

    $query = "SELECT * FROM loan_plan WHERE id='$plan_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $plan = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'plan Fetch Successfully by id',
            'data' => $plan
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'plan Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['delete_plan']))
{
    $plan_id = mysqli_real_escape_string($con, $_POST['plan_id']);

    $query = "DELETE FROM loan_plan WHERE id='$plan_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'plan Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'plan Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>