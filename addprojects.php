<?php
session_start();


include('dbconn.php');


if (isset($_POST['addprojects'])) {
  
    $project_id = $_POST['project_id'];
    $project_name = $_POST['project_name'];
    $project_status = $_POST['project_status'];
    $project_description = $_POST['project_description'];

    try {
       
        $newProjectRef = $database->getReference('projects')->push([
            'project_id' => $project_id,
            'project_name' => $project_name,
            'project_status' => $project_status,
            'project_description' => $project_description
        ]);

        $_SESSION['status'] = "Project added successfully";
        header('Location: adminhome.php'); 
        exit();
    } catch (Exception $e) {
        $_SESSION['status'] = "Error adding project: " . $e->getMessage();
        header('Location: adminhome.php'); 
        exit();
    }
} else {
    $_SESSION['status'] = "Please submit the form"; 
    header('Location: adminhome.php'); 
    exit();
}
?>
