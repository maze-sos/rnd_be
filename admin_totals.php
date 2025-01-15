<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include('inc/db.php');

if ($conn->connect_error) {
    echo json_encode(array('success' => false, 'message' => 'Connection failed: ' . $conn->connect_error));
    exit();
} else {

    $counts = array();

    $sqlStaffMemberships = "SELECT COUNT(*) AS count FROM staff_membership";
    $resultStaffMemberships = $conn->query($sqlStaffMemberships);
    $rowStaffMemberships = $resultStaffMemberships->fetch_assoc();
    $counts[] = array('title' => 'Staff Memberships', 'total' => $rowStaffMemberships['count'], 'link' => '/admindash/adminstaffmembership');

    $sqlStudentMemberships = "SELECT COUNT(*) AS count FROM student_membership";
    $resultStudentMemberships = $conn->query($sqlStudentMemberships);
    $rowStudentMemberships = $resultStudentMemberships->fetch_assoc();
    $counts[] = array('title' => 'Student Memberships', 'total' => $rowStudentMemberships['count'], 'link' => '/admindash/adminstudentmembership');

    $sqlStudentProjects = "SELECT COUNT(*) AS count FROM student_projects";
    $resultStudentProjects = $conn->query($sqlStudentProjects);
    $rowStudentProjects = $resultStudentProjects->fetch_assoc();
    $counts[] = array('title' => 'Student Projects', 'total' => $rowStudentProjects['count'], 'link' => '/admindash/adminviewstudentprojects');

    $sqlExternalMemberships = "SELECT COUNT(*) AS count FROM external_membership";
    $resultExternalMemberships = $conn->query($sqlExternalMemberships);
    $rowExternalMemberships = $resultExternalMemberships->fetch_assoc();
    $counts[] = array('title' => 'External Memberships', 'total' => $rowExternalMemberships['count'], 'link' => '/admindash/adminexternalmembership');

    $sqlInternalInternships = "SELECT COUNT(*) AS count FROM internal_internship";
    $resultInternalInternships = $conn->query($sqlInternalInternships);
    $rowInternalInternships = $resultInternalInternships->fetch_assoc();
    $counts[] = array('title' => 'Internal Internships', 'total' => $rowInternalInternships['count'], 'link' => '/admindash/admininternalinternship');

    $sqlExternalInternships = "SELECT COUNT(*) AS count FROM external_internship";
    $resultExternalInternships = $conn->query($sqlExternalInternships);
    $rowExternalInternships = $resultExternalInternships->fetch_assoc();
    $counts[] = array('title' => 'External Internships', 'total' => $rowExternalInternships['count'], 'link' => '/admindash/adminexternalinternship');
 
    $response = [
        'success' => true,
        'data' => $counts
    ];
    
    echo json_encode($response);

    $conn->close();
}
?>
