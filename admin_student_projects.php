<?php
header("Access-Control-Allow-Origin: *");

include('inc/db.php');

if(mysqli_connect_error()){
    echo mysqli_connect_error();
    exit();
} else {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $student = $_POST['student'];

    $targetDir = "adminprojectuploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo json_encode(["success" => true, "message" => "File is an image - " . $check["mime"] . "."]);
            $uploadOk = 1;
        } else {
            echo json_encode(["success" => false, "message" => "File is not an image."]);
            $uploadOk = 0;
        }
    }
    if (file_exists($targetFile)) {
        echo json_encode(["success" => false, "message" => "Sorry, file already exists."]);
        $uploadOk = 0;
    }
    if ($_FILES["image"]["size"] > 500000) {
        echo json_encode(["success" => false, "message" => "Sorry, your file is too large."]);
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo json_encode(["success" => false, "message" => "Sorry, only JPG, JPEG, PNG files are allowed."]);
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo json_encode(["success" => false, "message" => "Sorry, your file was not uploaded."]);

    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo json_encode(["success" => true, "message" => "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded."]);
        } else {
            echo json_encode(["success" => false, "message" => "Sorry, there was an error uploading your file."]);
        }
    }

    $sql = "INSERT INTO student_projects (title, description, student, image) VALUES ('$title', '$description', '$student', '$targetFile')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo json_encode(["success" => true, "message" => "Project uploaded successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Project upload failed"]);
    }


}
?>
