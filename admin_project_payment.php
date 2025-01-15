<?php
header("Access-Control-Allow-Origin: *");

include('inc/db.php');

if(mysqli_connect_error()){
    echo mysqli_connect_error();
    exit();
} else {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $fee = $_POST['fee'];
    $link = $_POST['link'];

    $sql = "INSERT INTO project_payment (title, description, fee, link) VALUES ('$title', '$description', '$fee', '$link')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo json_encode(["success" => true, "message" => "Project fee uploaded successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Project fee upload failed"]);
    }

}
?>