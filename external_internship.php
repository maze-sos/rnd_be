<?php
header("Access-Control-Allow-Origin: *");

include('inc/db.php');

if(mysqli_connect_error()){
    echo mysqli_connect_error();
    exit();
} else {
    // Retrieve text inputs
    $name = $_POST['name'];
    $school = $_POST['school'];
    $department = $_POST['department'];
    $fieldStudy = $_POST['fieldStudy'];
    $skill = $_POST['skill'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    

    $internshipLetterPath = null;

    // Check if an internship letter file is uploaded
    if (isset($_FILES['internshipLetter']) && $_FILES['internshipLetter']['error'] == 0) {
    
        $uploadDir = 'externalitletters/';
        
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $fileName = uniqid() . '_' . basename($_FILES['internshipLetter']['name']);
        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['internshipLetter']['tmp_name'], $filePath)) {
            $internshipLetterPath = $filePath; // Save the file path if upload is successful
        } else {
            echo json_encode(["success" => false, "message" => "File upload failed"]);
            exit();
        }
    }

    $sql = "INSERT INTO external_internship (name, school, department, fieldStudy, skill, phone, email, date, internshipLetterPath) 
            VALUES ('$name', '$school', '$department', '$fieldStudy', '$skill', '$phone', '$email', '$date', '$internshipLetterPath')";
    
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo json_encode(["success" => true, "message" => "Data and file uploaded successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Database insertion failed"]);
    }
}

?>
