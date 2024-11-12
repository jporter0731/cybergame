<?php

// Require database credentials to allow for easy logins
require_once('db_credentials.php');

// Get connected to the database based on the login infomration
function db_connect(){
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  confirm_db_connect();
  return $connection;
}

// Disconnect from the database when finished using it
function db_disconnect($connection){
  if(isset($connection)){
    mysqli_close($connection);
  }
}

// Confirm whether the database is connected or not
function confirm_db_connect(){
  if(mysqli_connect_errno()){
    $msg = "Database connection failed: ";
    $msg .= mysqli_connect_error();
    $msg .= " (" . mysqli_connect_errno() . ")";
    exit($msg);
  }
}

// Check whether the pattern id exists in the Database
function pattern_solved($connection, $patternID){
    //SQL Query to get the list of patterns with a specific id
    $patternSQL = "SELECT * FROM guesses WHERE correct_pattern = " . $patternID;
    $patternSQL .= " AND user_guessing = " . USER_ID;
    $patternSQL .= " AND correct_guess = 1";

    //Get the passcode infomration
    $pattern_set = mysqli_query($connection, $patternSQL);
    $count = mysqli_num_rows($pattern_set);

    return $count;
}

// Check whether the pattern id exists in the Database
function pattern_exists($connection, $patternID){
    //SQL Query to get the list of patterns with a specific id
    $patternSQL = "SELECT * FROM patterns WHERE pattern_id = '" . $patternID . "'";

    //Get the passcode infomration
    $pattern_set = mysqli_query($connection, $patternSQL);
    $count = mysqli_num_rows($pattern_set);

    return $count;
}

// Check whether the pattern id exists in the Database
function user_exists($connection, $userName){
    //SQL Query to get the list of patterns with a specific id
    $patternSQL = "SELECT * FROM users WHERE uname = '" . $userName . "'";

    //Get the passcode infomration
    $pattern_set = mysqli_query($connection, $patternSQL);
    $count = mysqli_num_rows($pattern_set);

    return $count;
}

// Get the pattern for the user that is logged in
function get_user_pattern($connection){
  //SQL Query to get information from the database table
  $getPatternSQL = "SELECT user_pattern FROM users WHERE user_id=" . USER_ID;

  //Get the passcode infomration
  $pattern_set = mysqli_query($connection, $getPatternSQL);
  $passcode_info = mysqli_fetch_assoc($pattern_set);

  $patternID = $passcode_info['user_pattern'];

  return $patternID;
}

// SQL Query to show data based on a specific id (used for the view_passcode page)
function view_passcode_queries($connection){
  //SQL Query to get information from the database table
  $patternSQL = "SELECT * FROM patterns WHERE pattern_id=". get_user_pattern($connection);

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

// SQL Query to show data based on a specific id (used for the view_passcode page)
function view_passcode($connection, $patternID){
  //SQL Query to get information from the database table
  $patternSQL = "SELECT * FROM patterns WHERE pattern_id=". $patternID;

  //Get the passcode infomration
  $pattern_set = mysqli_query($connection, $patternSQL);
  $passcode_info = mysqli_fetch_assoc($pattern_set);

  //remove the passcode id and difficulty from the list
  unset($passcode_info['pattern_id']);
  unset($passcode_info['difficulty']);

  foreach ($myPatternInfo as $key => $value) {
    $passcode_info[$key] = $value;
  }

  return $passcode_info;
}

// Get the information about the users pattern (total guesses and correct guesses)
function get_guess_info($connection){
  $guessesSQL = "SELECT * FROM guesses WHERE correct_pattern=". get_user_pattern($connection);
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

  usort($passcodes, function($a, $b) {
        // Define the order for status: "Complete" should always be last
        $statusOrder = ['Not Started' => 0, 'In Progress' => 0, 'Complete' => 2];

        // First, compare status: "Not Started" or "In Progress" should come before "Complete"
        if ($statusOrder[$a['status']] < $statusOrder[$b['status']]) {
            return -1; // $a comes before $b
        } elseif ($statusOrder[$a['status']] > $statusOrder[$b['status']]) {
            return 1; // $b comes before $a
        }

        // If statuses are the same, compare difficulty for non-complete patterns
        if ($statusOrder[$a['status']] < 2 && $statusOrder[$b['status']] < 2) {
            // Define the order for difficulty: Easy < Medium < Hard
            $difficultyOrder = ['Easy' => 0, 'Medium' => 1, 'Hard' => 2];

            if ($difficultyOrder[$a['difficulty']] < $difficultyOrder[$b['difficulty']]) {
                return -1; // $a comes before $b
            } elseif ($difficultyOrder[$a['difficulty']] > $difficultyOrder[$b['difficulty']]) {
                return 1; // $b comes before $a
            }
        }

        // If both status and difficulty are the same, keep the order unchanged
        return 0;
    });
  return $passcodes;
}
?>
