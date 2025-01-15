<?php
header("Access-Control-Allow-Origin: *");

include('inc/db.php');

if(mysqli_connect_error()){
    echo mysqli_connect_error();
    exit();
} else {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $focusArea = $_POST['focusArea'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];


    $sql = "INSERT INTO staff_membership (name, department, focusArea, phone, email) VALUES ('$name', '$department', '$focusArea', '$phone', '$email')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo json_encode(["success" => true, "message" => "Application submitted successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Application submission failed"]);
    }
}


?>