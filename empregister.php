<?php
session_start();
include('dbconn.php');

if (isset($_POST['register'])) {
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $role = $_POST['role'];

    try {
        $userProperties = [
            'email' => $email,
            'password' => $password,
            'displayName' => $fullName,
            
        ];

        $createdUser = $auth->createUser($userProperties);

        
        $database->getReference('EmpRegister/' . $createdUser->uid)
            ->set([
                'full_name' => $fullName,
                'email' => $email,
                'password' => $password,
                'contact' => $contact,
                'role' => $role
            ]);

        $_SESSION['status'] = "Employee registered successfully";

        if ($role === 'Employee') {
            header('Location: emplogin.html');
        } else if ($role === 'Admin') {
            header('Location: adminlogin.html');
        }
        exit();

    } catch (\Kreait\Firebase\Exception\Auth\EmailExists $e) {
        $_SESSION['status'] = "Email already exists";
        header('Location: empregn.html');
        exit();
    } catch (Exception $e) {
        $_SESSION['status'] = "Registration failed: " . $e->getMessage();
        header('Location: empregn.html');
        exit();
    }
} else {
    $_SESSION['status'] = "Invalid request";
    header('Location: empregn.html');
    exit();
}
?>
