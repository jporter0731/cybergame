<?php
  require('initialize.php');
  function startSession($username){
    session_start();

    // Set a session variable to track the login status
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;

    $_SESSION['user_id'] = get_user_id($db, $username);
  }

  function checkSession(){
    session_start();
  }

  function endSession(){
    session_start();  // Start the session

    // Destroy all session data
    session_unset();  // Unset all session variables
    session_destroy();  // Destroy the session itself

    // Redirect to the login page
    header("Location: ../login");
    exit();  // Stop script execution
  }
?>
