<?php
require('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_id = $_POST['admin_id'];
    $full_name = $_POST['full_name'];
    $gmail = $_POST['gmail'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];

    // Perform the update query
    $query = "UPDATE admin SET full_name='$full_name', gmail='$gmail', contact='$contact', gender='$gender' WHERE id=$admin_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to the profile page or show a success message
        header('Location: admin_profile.php');
        exit();
    } else {
        // Handle update failure, redirect or show an error message
        header('Location: admin_profile.php?error=update_failed');
        exit();
    }
} else {
    // Invalid request, redirect or show an error message
    header('Location: admin_profile.php?error=invalid_request');
    exit();
}
?>
