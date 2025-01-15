<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();

include('inc/db.php');

$student_id = isset($_POST['studentid']) ? htmlspecialchars(trim($_POST['studentid'])) : null;
$rowid = isset($_POST['rowid']) ? intval($_POST['rowid']) : 0;

if (empty($student_id) || $rowid <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid input data.']);
    exit();
}

if (isset($_FILES['receipt']) && $_FILES['receipt']['error'] == UPLOAD_ERR_OK) {
    $uploadDir = 'receiptuploads/'; 

    if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
        echo json_encode(['success' => false, 'message' => 'Upload directory is not writable.']);
        exit();
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    $maxFileSize = 2 * 1024 * 1024; // 2 MB

    if (!in_array($_FILES['receipt']['type'], $allowedTypes) || $_FILES['receipt']['size'] > $maxFileSize) {
        echo json_encode(['success' => false, 'message' => 'Invalid file type or size.']);
        exit();
    }

    $fileExtension = pathinfo($_FILES['receipt']['name'], PATHINFO_EXTENSION);
    $safeFileName = uniqid('receipt_', true) . '.' . $fileExtension;
    $receiptPath = $uploadDir . $safeFileName;

    if (move_uploaded_file($_FILES['receipt']['tmp_name'], $receiptPath)) {
        $sql = "INSERT INTO project_student_payments (rowid, student_id, receipt_path, payment_status) 
                VALUES (?, ?, ?, 'paid')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iss', $rowid, $student_id, $receiptPath);
        
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Receipt uploaded successfully.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Database insert failed.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'File upload failed.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No file uploaded or upload error.']);
}

$conn->close();
?>
