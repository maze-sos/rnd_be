<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}


if (!isset($_POST['description']) || !isset($_POST['studentid'])) {
    echo json_encode(array('success' => false, 'message' => 'Invalid request'));
    exit();
}


$description = htmlspecialchars(trim($_POST['description']));
$studentid = htmlspecialchars(trim($_POST['studentid']));
$gitlink = htmlspecialchars(trim($_POST['gitlink']));

if (empty($description) || empty($studentid)) {
    echo json_encode(array('success' => false, 'message' => 'Invalid name or studentid'));
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
    $project_students = $result->fetch_assoc();
    if ($project_students['status_1'] === 1 && $project_students['status_2'] === 1) {

        if ($project_students['studentid'] === $studentid) {
            if (isset($_FILES["document"]) && $_FILES["document"]["error"] == 0) {
                $allowedExtensions = array("doc", "docx");
                $fileExtension = pathinfo($_FILES["document"]["name"], PATHINFO_EXTENSION);
        
                if (in_array($fileExtension, $allowedExtensions)) {
                    $maxFileSize = 5 * 1024 * 1024; // 5MB

                    if ($_FILES["document"]["size"] <= $maxFileSize) {

                        $uploadDirectory = "projectuploads1/";
                        $uploadPath = $uploadDirectory . basename($_FILES["document"]["name"]);
                        if (move_uploaded_file($_FILES["document"]["tmp_name"], $uploadPath)) {
                            $stmt = $conn->prepare("INSERT INTO project_uploads (description, studentid, document, gitlink) VALUES (?, ?, ?, ?)");
                            $stmt->bind_param("ssss", $description, $studentid, $uploadPath, $gitlink);
                            if ($stmt->execute()) {
                                echo json_encode(array('success' => true, 'message' => 'Submission successful'));
                                exit();
                            } else {
                                echo json_encode(array('success' => false, 'message' => 'Submission failed'));
                                exit();
                            }
                        } else {
                            echo json_encode(array('success' => false, 'message' => 'Sorry, there was an error uploading your file.'));
                            exit();
                        }
                    } else {
                        echo json_encode(array('success' => false, 'message' => 'File size exceeds maximum limit (5MB).'));
                        exit();
                    }
                } else {
                    echo json_encode(array('success' => false, 'message' => 'Only Word documents (.doc, .docx) are allowed.'));
                    exit();
                }
            } else {
                echo json_encode(array('success' => false, 'message' => 'Error uploading file.'));
                exit();
            }

        } else {
            echo json_encode(array('success' => false, 'message' => 'Invalid Student ID'));
            exit();
        }
    } else {
        echo json_encode(array('success' => false, 'message' => 'Project Payment Reciepts not yet valid'));
        exit();
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'Invalid Student ID'));
    exit();
}

$stmt->close();
$conn->close();
?>
