<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
session_start();
include('inc/db.php');

// Define the base URL for the receipt images
$imageBaseUrl = "http://localhost/rnd/"; 

$sql = "
    SELECT psp.id, psp.rowid, psp.student_id, psp.receipt_path, psp.payment_status, pp.title
    FROM project_student_payments psp
    JOIN project_payment pp ON psp.rowid = pp.id
";

$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $row['receipt_path'] = $imageBaseUrl . $row['receipt_path'];
        $data[] = $row;
    }
    echo json_encode(['success' => true, 'data' => $data]);
} else {
    echo json_encode(['success' => false, 'message' => 'No records found.']);
}

$conn->close();
?>
