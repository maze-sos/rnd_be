<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json"); 

include('inc/db.php');

if (mysqli_connect_error()) {
    echo json_encode(["success" => false, "message" => "Database connection error: " . mysqli_connect_error()]);
    exit();
} else {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $student = mysqli_real_escape_string($conn, $_POST['student']);
    $link = mysqli_real_escape_string($conn, $_POST['link']);

    $targetDir = "adminprojectuploads/";

    $imageFile = $_FILES["image"];
    $imagePath = $targetDir . basename($imageFile["name"]);
    $imageFileType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));

    $documentFile = $_FILES["document"];
    $documentPath = $targetDir . basename($documentFile["name"]);
    $documentFileType = strtolower(pathinfo($documentPath, PATHINFO_EXTENSION));

    $allowedImageTypes = ["jpg", "jpeg", "png"];
    $allowedDocumentTypes = ["pdf", "doc", "docx"];

    $uploadOk = 1;
    $errors = [];

    // Validate image
    if (!in_array($imageFileType, $allowedImageTypes)) {
        $errors[] = "Only JPG, JPEG, and PNG image files are allowed.";
        $uploadOk = 0;
    }

    // Validate document
    if (!in_array($documentFileType, $allowedDocumentTypes)) {
        $errors[] = "Only PDF, DOC, and DOCX document files are allowed.";
        $uploadOk = 0;
    }

    // Validate file sizes
    if ($imageFile["size"] > 5000000 || $documentFile["size"] > 20000000) {
        $errors[] = "File size exceeds the allowed limit.";
        $uploadOk = 0;
    }

    if ($uploadOk && move_uploaded_file($imageFile["tmp_name"], $imagePath) && move_uploaded_file($documentFile["tmp_name"], $documentPath)) {
        $sql = "INSERT INTO student_projects (title, description, link, student, image, document) VALUES ('$title', '$description', '$link', '$student', '$imagePath', '$documentPath')";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            echo json_encode(["success" => true, "message" => "Project uploaded successfully!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Database insertion failed: " . mysqli_error($conn)]);
        }
    } else {
        if (empty($errors)) {
            $errors[] = "Error uploading files.";
        }
        echo json_encode(["success" => false, "message" => implode(" ", $errors)]);
    }

}

