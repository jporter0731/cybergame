<?php
session_start();
require('../private/initialize.php');

//Check the entered username and password against expected
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // FIXME Add ldap authentication here.
    if ($username == 'jporter' && $password == 'password123') {
        $count = checkUserRegistration($username);
        if($count > 0){
            header("Location: ../pick_passcode/index.php");
        }else{
            header("Location: ../registration_page/index.php");
        }
        exit();
    } else {
        // Store the error message in the session
        $_SESSION['error'] = "Invalid credentials!";

        // Redirect back to the login page
        header("Location: index.php");
        exit();
    }
}

function checkUserRegistration($userToCheck){
    $userExistsCount = user_exists($db, $userToCheck);
    return $userExistsCount;
}
?>
