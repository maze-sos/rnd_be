<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

session_start();
include('inc/db.php');

$studentId = isset($_POST['studentId']) ? htmlspecialchars(trim($_POST['studentId'])) : null;
$newStatus = isset($_POST['newStatus']) ? intval($_POST['newStatus']) : null;
$statusType = isset($_POST['statusType']) ? htmlspecialchars(trim($_POST['statusType'])) : null; // Added status type


if ($studentId === null || $newStatus === null || ($statusType !== 'status_1' && $statusType !== 'status_2')) {
    echo json_encode(['success' => false, 'message' => 'Invalid input data.']);
    exit();
}

$sql = "UPDATE project_students SET $statusType = ? WHERE studentid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('is', $newStatus, $studentId);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true, 'message' => 'Student status updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'No changes made, student status may already be updated.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Database update failed.']);
}

$stmt->close();
$conn->close();
?>
