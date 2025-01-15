<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include('inc/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

if (!isset($_POST['studentid']) || !isset($_POST['password'])) {
    echo json_encode(array('success' => false, 'message' => 'Invalid request'));
    exit();
}

$studentid = htmlspecialchars(trim($_POST['studentid']));
$password = htmlspecialchars(trim($_POST['password']));

if (empty($studentid) || empty($password)) {
    echo json_encode(array('success' => false, 'message' => 'Invalid studentid or password'));
    exit();
}

if ($conn->connect_error) {
    echo json_encode(array('success' => false, 'message' => 'Connection failed: ' . $conn->connect_error));
    exit();
}

$sql = "SELECT * FROM project_students WHERE studentid=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $studentid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $student = $result->fetch_assoc();
    if (password_verify($password, $student['password'])) {
        $_SESSION['studentid'] = $studentid;
        $_SESSION['isProjectLoggedIn'] = true;

        echo json_encode(array('success' => true, 'message' => 'Login successful', 'studentid' => $studentid, 'isProjectLoggedIn' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Invalid studentid or password'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid studentid or password'));
}

$stmt->close();
$conn->close();
?>
