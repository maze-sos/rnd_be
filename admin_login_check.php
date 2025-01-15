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

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    echo json_encode(array('success' => false, 'message' => 'Invalid request'));
    exit();
}

$email = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($password)) {
    echo json_encode(array('success' => false, 'message' => 'Invalid email or password'));
    exit();
}

if ($conn->connect_error) {
    echo json_encode(array('success' => false, 'message' => 'Connection failed: ' . $conn->connect_error));
    exit();
}

$sql = "SELECT * FROM admin WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $admin = $result->fetch_assoc();
    if (password_verify($password, $admin['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['isAdminLoggedIn'] = true;
        echo json_encode(array('success' => true, 'message' => 'Login successful', 'email' => $email, 'isAdminLoggedIn' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Invalid password'));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid email'));
}

$stmt->close();
$conn->close();
?>
