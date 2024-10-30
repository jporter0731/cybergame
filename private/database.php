<?php

  require_once('db_credentials.php');
  function db_connect(){
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    return $connection;
  }

  function db_disconnect($connection){
    if(isset($connection)){
      mysqli_close($connection);
    }
  }

  // SQL Query to show data based on a specific id (used for the view_passcode page)
  function view_passcode_queries($connection, $user_id){
    //SQL Query to get information from the database table
    $patternSQL = "SELECT * FROM patterns WHERE pattern_id=". $user_id;
    $guessesSQL = "SELECT * FROM guesses WHERE correct_pattern=". $user_id ;
    $correctGuessesSQL = $guessesSQL. " AND correct_guess=1";

    //Get the passcode infomration
    $pattern_set = mysqli_query($connection, $patternSQL);
    $passcode_info = mysqli_fetch_assoc($pattern_set);

    //remove the passcode id and difficulty from the list
    unset($passcode_info['pattern_id']);
    unset($passcode_info['difficulty']);

    //Get the number of guesses on this pattern
    $guesses_set = mysqli_query($connection, $guessesSQL);
    $guesses = mysqli_num_rows($guesses_set);

    //get the correct number of guesses on this pattern
    $guesses_set = mysqli_query($connection, $correctGuessesSQL);
    $correctGuesses = mysqli_num_rows($guesses_set);

    //Add the values from above to the info array
    $passcode_info['guesses'] = $guesses;
    $passcode_info['correct_guesses'] = $correctGuesses;

    return $passcode_info;
  }
?>
