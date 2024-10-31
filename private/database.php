<?php

  require_once('db_credentials.php');
  function db_connect(){
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connect();
    return $connection;
  }

  function db_disconnect($connection){
    if(isset($connection)){
      mysqli_close($connection);
    }
  }

  function confirm_db_connect(){
    if(mysqli_connect_errno()){
      $msg = "Database connection failed: ";
      $msg .= mysqli_connect_error();
      $msg .= " (" . mysqli_connect_errno() . ")";
      exit($msg);
    }
  }

  // SQL Query to show data based on a specific id (used for the view_passcode page)
  function view_passcode_queries($connection){
    //SQL Query to get information from the database table
    $patternSQL = "SELECT * FROM patterns WHERE pattern_id=". USER_PATTERN_ID;

    //Get the passcode infomration
    $pattern_set = mysqli_query($connection, $patternSQL);
    $passcode_info = mysqli_fetch_assoc($pattern_set);

    //remove the passcode id and difficulty from the list
    unset($passcode_info['pattern_id']);
    unset($passcode_info['difficulty']);

    //get the guess info using the get_guess_info function
    $myPatternInfo = get_guess_info($connection);

    foreach ($myPatternInfo as $key => $value) {
      $passcode_info[$key] = $value;
    }

    return $passcode_info;
  }

  // Get the information about the users pattern (total guesses and correct guesses)
  function get_guess_info($connection){
    $guessesSQL = "SELECT * FROM guesses WHERE correct_pattern=". USER_PATTERN_ID;
    $correctGuessesSQL = $guessesSQL. " AND correct_guess=1";

    //Get the number of guesses on this pattern
    $guesses_set = mysqli_query($connection, $guessesSQL);
    $guesses = mysqli_num_rows($guesses_set);

    //get the correct number of guesses on this pattern
    $guesses_set = mysqli_query($connection, $correctGuessesSQL);
    $correctGuesses = mysqli_num_rows($guesses_set);

    //Add the values from above to the info array
    $guessInfo['guesses'] = $guesses;
    $guessInfo['correct_guesses'] = $correctGuesses;

    return $guessInfo;
  }

  // Get the information about the patterns that you can guess (used for the pick_passcode page)
  function get_available_patterns($connection){
    $getPatternSQL = "SELECT pattern_id, difficulty FROM patterns WHERE difficulty IS NOT NULL;";
    $pattern_set = mysqli_query($connection, $getPatternSQL);

    while($pattern = mysqli_fetch_assoc($pattern_set)){
      //Figure out how many guesses a user made on a specific pattern
      $sqlPasscodes = "SELECT correct_guess FROM guesses WHERE user_guessing=". USER_ID. " AND correct_pattern=". $pattern['pattern_id'];
      $guess_set = mysqli_query($connection, $sqlPasscodes);

      $guessCount = mysqli_num_rows($guess_set);
      $status = 'In Progress';

      //Cycle through the guesses and see if any ore correct
      while($correctGuess = mysqli_fetch_assoc($guess_set)){
        if ($correctGuess['correct_guess'] == 1){
          $status = 'Complete';
        }
      }
      if($guessCount == 0){
        $status = 'Not Started';
      }

      //Add the information found to the passcodes array to be passed to the page
      $passcodes[] = [
        'id' => $pattern['pattern_id'],
        'difficulty' => $pattern['difficulty'],
        'status' => $status,
        'guess_count' => $guessCount
      ];
    }

    return $passcodes;
  }
?>
