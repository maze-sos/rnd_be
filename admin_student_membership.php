<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include('inc/db.php');
if ($conn->connect_error) {
    echo json_encode(array('success' => false, 'message' => 'Connection failed: ' . $conn->connect_error));
    exit();
} else {
    $sql = "SELECT * FROM student_membership";
    $result = $conn->query($sql);

    if ($result === false) {
        echo json_encode(array('success' => false, 'message' => 'Query failed: ' . $conn->error));
    } else {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode(array('success' => true, 'data' => $data));
    }

    $conn->close();
}
?>
