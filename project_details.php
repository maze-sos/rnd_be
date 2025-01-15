<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include('inc/db.php');

if ($conn->connect_error) {
    echo json_encode(array('success' => false, 'message' => 'Connection failed: ' . $conn->connect_error));
    exit();
} else {

$id = $_GET['id'] ?? '';

if ($id) {
    $sql = "SELECT * FROM project_information WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $project = $result->fetch_assoc();
        $response = [
            'success' => true,
            'data' => $project,
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Project not found',
        ];
    }

    $stmt->close();
} else {
    $response = [
        'success' => false,
        'message' => 'Missing ID parameter',
    ];
}

echo json_encode($response);

$conn->close();
}
?>