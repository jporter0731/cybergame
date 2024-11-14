<?php

  function startSession($username){
    session_start();

    // Set a session variable to track the login status
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
  }

  function setUserID($id){
    $_SESSION['user_id'] = $id;
  }

  function getUserFromDatabase($connection, $username){
    $_SESSION['user_id'] = get_user_id($connection, $username);
  }

  function checkSession(){
    session_start();
    // Session timeout duration in seconds
    $timeout = 900;

    // Check if a user is actually logged in
    if( !isset( $_SESSION['loggedin']) || $_SESSION['loggedin'] === false){
      session_unset();
      session_destroy();
      return false;
    }

    // Check existing timeout variable
    elseif( isset( $_SESSION['lastaccess'] ) ) {
    	// Time difference since user sent last request
    	$duration = time() - intval( $_SESSION['lastaccess'] );

    	// Destroy if last request was sent before the current time minus last request
    	if( $duration > $timeout ) {
        session_unset();
        session_destroy();
        return false;
    	}
    }

    return true;
  }

  function check_redirect(){
    $loggedIn = checkSession();

    if (!$loggedIn){
      // Redirect to the login page
      header("Location: ../login");
    }
  }
?>
