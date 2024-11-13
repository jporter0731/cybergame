<?php
require('../private/initialize.php');
session_start();  // Start the session

//Check the entered username and password against expected
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // FIXME Add ldap authentication here.
    //Check if the username is in the array
    if (array_key_exists($username, USER_CREDENTIALS) && USER_CREDENTIALS[$username] === $password) {
        $count = user_exists($db, $username);
        //Start the session
        startSession($username);

        if($count > 0){
            header("Location: ../pick_passcode");
        }else{
            header("Location: ../registration_page");
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
?>
