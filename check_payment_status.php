<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();

include('inc/db.php');

$rowid = isset($_GET['rowid']) ? intval($_GET['rowid']) : 0;
$student_id = isset($_GET['studentid']) ? htmlspecialchars(trim($_GET['studentid'])) : null;

if (empty($student_id) || $rowid <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid input data.']);
    exit();
}

$sql = "SELECT * FROM project_student_payments 
        WHERE rowid = ? AND student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $rowid, $student_id);
$stmt->execute();
$result = $stmt->get_result();

$payments = [];
while ($row = $result->fetch_assoc()) {
    $payments[] = $row;
}

echo json_encode(['success' => true, 'payments' => $payments]);

$stmt->close();
$conn->close();
?>
