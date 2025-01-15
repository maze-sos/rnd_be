<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

session_start();

if (!isset($_SESSION['user']) || !isset($_SESSION['isAdminLoggedIn']) || !$_SESSION['isAdminLoggedIn']) {
    echo json_encode(array('success' => false, 'message' => 'Not logged in'));
    exit();
}

echo json_encode(array('success' => true, 'message' => 'Logged in'));
?>