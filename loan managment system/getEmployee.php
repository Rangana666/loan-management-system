<?php
include_once("db_connect.php");

if ($_REQUEST['b_id']) {
	$sql = "SELECT b_id, name, contact, address,garanter1,garanter2 FROM borrowers WHERE b_id='" . $_REQUEST['b_id'] . "'";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));	
	$data = array();
	while ($rows = mysqli_fetch_assoc($resultset)) {
		$data = $rows;
	}
	echo json_encode($data);
} else {
	echo 0;	
}
?>
