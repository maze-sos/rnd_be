<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}


if (!isset($_POST['name']) || !isset($_POST['studentid']) || !isset($_POST['email']) || !isset($_POST['department']) || !isset($_POST['password']) || !isset($_POST['confirmpassword'])) {
    echo json_encode(array('success' => false, 'message' => 'Invalid request'));
    exit();
}


$name = htmlspecialchars(trim($_POST['name']));
$studentid = htmlspecialchars(trim($_POST['studentid']));
$email = htmlspecialchars(trim($_POST['email']));
$department = htmlspecialchars(trim($_POST['department']));
$password = htmlspecialchars(trim($_POST['password']));
$confirmpassword = htmlspecialchars(trim($_POST['confirmpassword']));


if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($password) || empty($confirmpassword) || empty($name) || empty($studentid) || empty($department)) {
    echo json_encode(array('success' => false, 'message' => 'Invalid email or password'));
    exit();
}


if ($password !== $confirmpassword) {
    echo json_encode(array('success' => false, 'message' => 'Passwords do not match'));
    exit();
}


include('inc/db.php');


if ($conn->connect_error) {
    echo json_encode(array('success' => false, 'message' => 'Connection failed: ' . $conn->connect_error));
    exit();
}


$sql = "SELECT * FROM project_students WHERE studentid=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $studentid);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    echo json_encode(array('success' => false, 'message' => 'Student ID already exists'));
    $stmt->close();
    $conn->close();
    exit();
}


$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO project_students (name, studentid, email, department, password) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $studentid, $email, $department, $hashed_password);
$stmt->execute();


$stmt->close();
$conn->close();

echo json_encode(array('success' => true, 'message' => 'Student created successfully'));
?>