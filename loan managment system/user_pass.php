 <?php
require('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_id = $_POST['admin_id'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
 

 //hash password
    $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

    // Perform the update query
    $query = "UPDATE admin SET uname='$uname', pass='$hashedPassword' WHERE id=$admin_id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to the profile page or show a success message
        header('Location: setting.php');
        exit();
    } else {
        // Handle update failure, redirect or show an error message
        header('Location: setting.php?error=update_failed');
        exit();
    }
} else {
    // Invalid request, redirect or show an error message
    header('Location: setting.php?error=invalid_request');
    exit();
}
?>
