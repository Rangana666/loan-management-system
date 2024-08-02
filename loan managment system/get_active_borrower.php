<?php
include_once("db_connect.php");

$sql = "SELECT DISTINCT l.borrower_id, b.b_id FROM loan l
        INNER JOIN borrowers b ON l.borrower_id = b.b_id
        WHERE l.status = 1";

$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));

$borrowers = [];
while ($rows = mysqli_fetch_assoc($resultset)) {
    $borrowers[] = $rows;
}

echo json_encode($borrowers);
?>
