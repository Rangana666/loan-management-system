<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('db_connect.php');

$database_name = 'my_loan';
$filename = $database_name . '_backup_' . date('Ymd') . '.sql';
$filepath = '/opt/lampp/htdocs/loan/temp/' . $filename;

// Fetch all tables
$tables = mysqli_query($conn, "SHOW TABLES");

// Open the file for writing
$file = fopen($filepath, 'w');

// Write the header to the file
$header = "-- phpMyAdmin SQL Dump\n-- version 5.2.1\n-- https://www.phpmyadmin.net/\n";
$header .= "-- Host: localhost\n-- Generation Time: " . date('M d, Y h:i:s A') . "\n";
$header .= "-- Server version: " . mysqli_get_server_info($conn) . "\n";
$header .= "-- PHP Version: " . phpversion() . "\n\n";
$header .= "SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';\nSTART TRANSACTION;\nSET time_zone = '+00:00';\n\n";
$header .= "CREATE DATABASE IF NOT EXISTS `$database_name`;\nUSE `$database_name`;\n\n";
fwrite($file, $header);

// Loop through tables
while ($table = mysqli_fetch_row($tables)) {
    $table = $table[0];

    // Get the CREATE TABLE statement
    $result = mysqli_query($conn, "SHOW CREATE TABLE $table");
    $row = mysqli_fetch_row($result);
    $table_structure = "\n-- Table structure for table `$table`\n\n" . $row[1] . ";\n\n";
    fwrite($file, $table_structure);

    // Get the data rows
    $result_data = mysqli_query($conn, "SELECT * FROM $table");
    while ($row_data = mysqli_fetch_assoc($result_data)) {
        $insert_data = "INSERT INTO `$table` VALUES(";
        foreach ($row_data as $value) {
            $insert_data .= "'" . mysqli_real_escape_string($conn, $value) . "',";
        }
        $insert_data = rtrim($insert_data, ',');
        $insert_data .= ");\n";
        fwrite($file, $insert_data);
    }

    $table_end = "\n-- --------------------------------------------------------\n\n";
    fwrite($file, $table_end);
}

$footer = "COMMIT;\n\n";
$footer .= "/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\n";
$footer .= "/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\n";
$footer .= "/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;";
fwrite($file, $footer);

// Close the file
fclose($file);

// Close the database connection
mysqli_close($conn);

// Download the file
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $filename . '"');
readfile($filepath);
exit;
?>
