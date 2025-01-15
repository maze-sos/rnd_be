<?php
header("Access-Control-Allow-Origin: *");

include('inc/db.php');

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit();
} else {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $fieldStudy = $_POST['fieldStudy'];
    $skill = $_POST['skill'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $date = $_POST['date'];

    // Check if a file was uploaded
    if (isset($_FILES['internshipLetter']) && $_FILES['internshipLetter']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['internshipLetter']['tmp_name'];
        $fileName = $_FILES['internshipLetter']['name'];
        $fileSize = $_FILES['internshipLetter']['size'];
        $fileType = $_FILES['internshipLetter']['type'];
        
        $uploadDir = 'internalitletters/';
        
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Set the destination path for the file
        $destPath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            $sql = "INSERT INTO internal_internship (name, department, fieldStudy, skill, phone, email, date, internship_letter) 
                    VALUES ('$name', '$department', '$fieldStudy', '$skill', '$phone', '$email', '$date', '$destPath')";
            $res = mysqli_query($conn, $sql);

            if ($res) {
                echo json_encode(["success" => true, "message" => "Success"]);
            } else {
                echo json_encode(["success" => false, "message" => "Error: Could not save data to the database."]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Error: File upload failed."]);
        }
    } else {
        $sql = "INSERT INTO internal_internship (name, department, fieldStudy, skill, phone, email, date) 
                VALUES ('$name', '$department', '$fieldStudy', '$skill', '$phone', '$email', '$date')";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            echo json_encode(["success" => true, "message" => "Application submitted successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error: Could not save data to the database."]);
        }
    }

}

