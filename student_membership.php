<?php
header("Access-Control-Allow-Origin: *");

include('inc/db.php');

if(mysqli_connect_error()){
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

    $sql = "INSERT INTO student_membership (name, department, fieldStudy, skill, phone, email, date) VALUES ('$name', '$department', '$fieldStudy', '$skill', '$phone', '$email', '$date')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo json_encode(["success" => true, "message" => "Application submitted successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Application submission failed"]);
    }
}


?>