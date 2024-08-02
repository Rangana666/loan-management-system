<?php
session_start(); 
include "db_connect.php";



if (isset($_POST['uname']) && isset($_POST['pass'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $enteredPassword = validate($_POST['pass']);
$hashedEnteredPassword = password_hash($enteredPassword, PASSWORD_DEFAULT);


    $uname = validate($_POST['uname']);
    $pass = validate($_POST['pass']);

    if (empty($uname)) {
        header("Location: login.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
       $sql = "SELECT * FROM admin WHERE uname=?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: login.php?error=SQL Error");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "s", $uname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $hashedPassword = $row['pass'];

        if (password_verify($enteredPassword, $hashedPassword) && $row['user_type'] === 'admin') {
            $_SESSION['uname'] = $row['uname'];
            $_SESSION['id'] = $row['id'];
            header("Location:index.php");
            exit();
        } else {
            header("Location: login.php?error=Incorrect User name or password");
            exit();
        }
    } else {
        header("Location: login.php?error=Incorrect User name or password");
        exit();
    }
}
    }
} else {
    header("Location: login.php");
    exit();
}
?>
