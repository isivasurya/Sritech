<?php
session_start();


include('dbconn.php');


if (isset($_POST['updateprojs'])) {
    
    $project_id = $_POST['project_id'];
    $new_status = $_POST['new_status'];
    $comments = $_POST['comments'];

    try {
       
        $projectsRef = $database->getReference('projects');
        $query = $projectsRef->orderByChild('project_id')->equalTo($project_id);
        $snapshot = $query->getSnapshot();

        if ($snapshot->exists()) {
            foreach ($snapshot->getValue() as $key => $project) {
                $projectsRef->getChild($key)->update([
                    'project_status' => $new_status,
                    'comments' => $comments
                ]);
            }

            $_SESSION['status'] = "Project updated successfully";
            header('Location: emphome.php');
            exit();
        } else {
            $_SESSION['status'] = "Project with ID $project_id not found";
            header('Location: emphome.php');
            exit();
        }
    } catch (Exception $e) {
        $_SESSION['status'] = "Error updating project: " . $e->getMessage();
        header('Location: emphome.php');
        exit();
    }
} else {
    $_SESSION['status'] = "Please submit the form";
    header('Location: emphome.php');
    exit();
}
?>
