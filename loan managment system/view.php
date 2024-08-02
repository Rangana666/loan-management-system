<?php
// fetch_updated_data.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_loan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the updated data from the database
$sql = "SELECT * FROM loan WHERE status=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Output the table rows
        //header("Location:view_loans.php?data saved");
    
    }
} else {
    // Output a message if no loans are available
    echo "<tr><td colspan='8'>No loans available</td></tr>";
}

$conn->close();
?>
