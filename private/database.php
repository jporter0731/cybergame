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

// Get the pattern for the user that is logged in
function get_user_id($connection, $username){
  //SQL Query to get information from the database table
  $getPatternSQL = "SELECT user_id FROM users WHERE uname='" . $username . "'";

  //Get the passcode infomration
  $pattern_set = mysqli_query($connection, $getPatternSQL);
  $passcode_info = mysqli_fetch_assoc($pattern_set);

  $patternID = $passcode_info['user_id'];

  return $patternID;
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

function get_user_alias($connection, $patternID){
  // Connect the pattern id to a user
  $userPatternSQL = "SELECT alias FROM users WHERE user_pattern=". $patternID;
  $user_set = mysqli_query($connection, $userPatternSQL);

  $user = mysqli_fetch_assoc($user_set);
  $userAlias = $user['alias'];

  if ($userAlias === null){
    return "Game Pattern " . $patternID;
  }else{
    return $userAlias;
  }
}

// This function will update the user score after a pattern is solved
function update_score($connection, $pattern){
  //Get the user score
  $userScoreSQL = "SELECT score FROM users WHERE user_id=". USER_ID;
  $user_set = mysqli_query($connection, $userScoreSQL);
  $user = mysqli_fetch_assoc($user_set);

  //Set initial values
  $score = $user['score'];
  $difficultyMultiplyer = 1;

  //Get incorrect guesses
  $sqlPasscodes = "SELECT correct_guess FROM guesses WHERE user_guessing=". USER_ID. " AND correct_pattern=". $pattern. " AND correct_guess = 0";
  $guess_set = mysqli_query($connection, $sqlPasscodes);

  $incorrectGuesses = mysqli_num_rows($guess_set);

  //Get the pattern difficulty
  $getDifficultySQL = "SELECT difficulty FROM patterns WHERE pattern_id='". $pattern. "'";
  $difficulty_set = mysqli_query($connection, $getDifficultySQL);
  $difficultyArray = mysqli_fetch_assoc($difficulty_set);

  $difficulty = $difficultyArray['difficulty'];

  if ($difficulty === "Easy"){
    $difficultyMultiplyer = 1;
  }elseif($difficulty === "Medium"){
    $difficultyMultiplyer = 2;
  }else{
    $difficultyMultiplyer = 4;
  }

  //Update score
  $score += ($difficultyMultiplyer * (100 - ($incorrectGuesses * 5)));
  $updateUserSQL = "UPDATE users SET score = '". $score ."' WHERE user_id = " . USER_ID;

  $updateResult = mysqli_query($connection, $updateUserSQL);
}

// This function will get the list of the top passcodes
function get_top_passcodes($connection){
  // Setup the ranking array
  $rankedArray = [];

  $getPatternSQL = "SELECT pattern_id, difficulty FROM patterns WHERE difficulty IS NOT NULL;";
  $pattern_set = mysqli_query($connection, $getPatternSQL);

  while($pattern = mysqli_fetch_assoc($pattern_set)){
    //Figure out how many guesses were made on a specific pattern
    $getGuessesSQL = "SELECT correct_guess FROM guesses WHERE correct_pattern=". $pattern['pattern_id'];
    $guess_set = mysqli_query($connection, $getGuessesSQL);
    $score = 0;

    // Get the pattern base score
    if($pattern['difficulty'] === "Easy"){
      $score = 25;
    }elseif($pattern['difficulty'] === "Medium"){
      $score = 50;
    }else{
      $score = 100;
    }

    // Get the count of the guesses
    $score += (mysqli_num_rows($guess_set) * 5);

    //Figure out how many correct guesses were made on a specific pattern
    $correctGuessesSQL = "SELECT correct_guess FROM guesses WHERE correct_pattern=". $pattern['pattern_id'] . "AND correct_guess=1";
    $correct_guess_set = mysqli_query($connection, $correctGuessesSQL);

    $alias = get_user_alias($connection, $pattern['pattern_id']);

    // Get the count of the correct guesses
    $score -= (mysqli_num_rows($correct_guess_set) * 25);

    $rankedArray[] = [
      'score' => $score,
      'passcode' => $alias
    ];
  }

  usort($rankedArray, function($a, $b) {
        // Sort by score in descending order
        if ($a['score'] == $b['score']) {
            // If scores are equal, sort by passcode alphabetically
            return strcmp($a['passcode'], $b['passcode']);
        }
        return $b['score'] - $a['score']; // Descending score order
    });

    // Reduce array to just 10 values
    $topTenArray = array_slice($rankedArray, 0, 10);

    // Add rank field to each element
    $rank = 1;
    foreach ($topTenArray as &$item) {
        $item['rank'] = $rank++;
    }

  return $topTenArray;
}

// This function will get the list of top users
function get_top_users($connection){
  //setup the ranked array
  $rankedArray = [];

  $getUsersSQL = "SELECT alias, score FROM users";
  $pattern_set = mysqli_query($connection, $getUsersSQL);

  while($user = mysqli_fetch_assoc($pattern_set)){
    $rankedArray[] = [
      'score' => $user['score'],
      'alias' => $user['alias']
    ];
  }

  usort($rankedArray, function($a, $b) {
        // Sort by score in descending order
        if ($a['score'] == $b['score']) {
            // If scores are equal, sort by passcode alphabetically
            return strcmp($a['alias'], $b['alias']);
        }
        return $b['score'] - $a['score']; // Descending score order
    });

    // Reduce array to just 10 values
    $topTenArray = array_slice($rankedArray, 0, 10);

    // Add rank field to each element
    $rank = 1;
    foreach ($topTenArray as &$item) {
        $item['rank'] = $rank++;
    }

  return $topTenArray;
}
?>
