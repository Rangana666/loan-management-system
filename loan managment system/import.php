<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['import_file']) && $_FILES['import_file']['error'] == UPLOAD_ERR_OK) {
        $file_name = $_FILES['import_file']['name'];
        $file_tmp = $_FILES['import_file']['tmp_name'];

        // Read the SQL file
        $sql_contents = file_get_contents($file_tmp);

        // Split the SQL file into separate queries
        $queries = explode(';', $sql_contents);

        // Execute each query
        foreach ($queries as $query) {
            $query = trim($query);
            if (!empty($query)) {
                // Check if the table exists before executing the CREATE TABLE query
                $table_name = getTableNameFromQuery($query);
                if (!tableExists($conn, $table_name)) {
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        echo 'Error executing SQL query: ' . mysqli_error($conn);
                    }
                }
            }
        }



         // Set the session variable to indicate success
        session_start();
        $_SESSION['import_success'] = true;

        // Redirect to the setting.php page
        header("Location: setting.php");
        exit();
    } else {
        // Handle file upload error
        echo 'Error uploading file.';
    }
}

mysqli_close($conn);

function getTableNameFromQuery($query)
{
    preg_match('/CREATE TABLE `(.+?)`/', $query, $matches);
    return isset($matches[1]) ? $matches[1] : null;
}

function tableExists($conn, $table_name)
{
    $result = mysqli_query($conn, "SHOW TABLES LIKE '$table_name'");
    return mysqli_num_rows($result) > 0;
}

    //database connection close
        mysql_close($conn);
?>
