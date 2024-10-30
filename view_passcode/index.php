<?php
    require('../private/initialize.php');

    //SQL Query to get information from the database table
    $patternSQL = "SELECT * FROM patterns WHERE pattern_id=100006";
    $guessesSQL = "SELECT * FROM guesses WHERE correct_pattern=100006";
    $correctGuessesSQL = $guessesSQL. " AND correct_guess=1";

    //Get the passcode infomration
    $pattern_set = mysqli_query($db, $patternSQL);
    $passcode = mysqli_fetch_assoc($pattern_set);

    //Get the number of guesses on this pattern
    $guesses_set = mysqli_query($db, $guessesSQL);
    $guesses = mysqli_num_rows($guesses_set);

    //get the correct number of guesses on this pattern
    $guesses_set = mysqli_query($db, $correctGuessesSQL);
    $correctGuesses = mysqli_num_rows($guesses_set);

?>
<html lang="en">
    <head>
        <?php include(PRIVATE_PATH . '/header.php'); ?>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>
        <!-- Page content-->
        <div class="text-center mt-5">
            <h1>Here is Your Passcode</h1>
            <p class="lead">Number of Guesses: <?php echo $guesses; ?></p>
            <p class="lead">Number of Correct Guesses: <?php echo $correctGuesses; ?></p>
        </div>
        <div class="image-container">
          <?php
            // Exclude pattern_id and difficulty from showing up
            $excludedKeys = ['pattern_id', 'difficulty'];

            foreach ($passcode as $key => $symbol){
              // Checks if the char is set and skips over the ignored values
              if (isset($symbol) && !(in_array($key, $excludedKeys))){
                $image = RESOURCE_PATH. $symbol;
                echo "<img src=$image width=80 />";
              }
            }
          ?>
        </div>
    </body>
    <?php include(PRIVATE_PATH . '/footer.php'); ?>
