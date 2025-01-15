<?php
header("Access-Control-Allow-Origin: *");

include('inc/db.php');

if(mysqli_connect_error()){
    echo mysqli_connect_error();
    exit();
} else {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $author = $_POST['author'];

    $sql = "INSERT INTO project_information (title, description, author) VALUES ('$title', '$description', '$author')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo json_encode(["success" => true, "message" => "Project Information uploaded successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Project Information upload failed"]);
    }
}

?>
