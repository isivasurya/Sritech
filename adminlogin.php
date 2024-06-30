<?php
session_start();
include("dbconn.php");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $signInResult = $auth->signInWithEmailAndPassword($email, $password);

        
        $_SESSION['authenticated'] = true;
        $_SESSION['email'] = $email;

        header('Location: adminhome.php');
        exit();
    } catch (\Kreait\Firebase\Exception\Auth\InvalidPassword $e) {
        $_SESSION['status'] = "Invalid password";
        header('Location: adminlogin.html');
        exit();
    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        $_SESSION['status'] = "Invalid email address";
        header('Location: adminlogin.html');
        exit();
    } catch (Exception $e) {
        $_SESSION['status'] = "An error occurred. Please try again.";
        header('Location: adminlogin.html');
        exit();
    }

    // Redirect back to login page on failure
    
}
?>