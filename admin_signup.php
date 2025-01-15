<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

if (!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['confirmpassword'])) {
    echo json_encode(array('success' => false, 'message' => 'Invalid request'));
    exit();
}

$email = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));
$confirmpassword = htmlspecialchars(trim($_POST['confirmpassword']));

// Validate email and password
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($password) || empty($confirmpassword)) {
    echo json_encode(array('success' => false, 'message' => 'Invalid email or password'));
    exit();
}

// Validate that the password and confirm password match
if ($password !== $confirmpassword) {
    echo json_encode(array('success' => false, 'message' => 'Passwords do not match'));
    exit();
}

// Connect to the database
include('inc/db.php');

if ($conn->connect_error) {
    echo json_encode(array('success' => false, 'message' => 'Connection failed: ' . $conn->connect_error));
    exit();
}

$sql = "SELECT * FROM admin WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo json_encode(array('success' => false, 'message' => 'Email already exists'));
    $stmt->close();
    $conn->close();
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO admin (email, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $hashed_password);
$stmt->execute();

$stmt->close();
$conn->close();

echo json_encode(array('success' => true, 'message' => 'Admin user created successfully'));
?>