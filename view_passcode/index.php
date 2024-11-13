<?php
    require('../private/initialize.php');
    check_redirect();

    $passcode = view_passcode_queries($db);

?>
<html lang="en">
    <?php include(PRIVATE_PATH . '/header.php'); ?>
    <body>
        <!-- Responsive navbar-->
        <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>
        <!-- Page content-->
        <div class="text-center mt-5">
            <h1><?php echo get_user_alias($db); ?>'s Passcode:</h1>
            <div class="image-container">
              <?php
                // Exclude pattern_id and difficulty from showing up
                $excludedKeys = ['guesses', 'correct_guesses'];

                foreach ($passcode as $key => $symbol){
                  // Checks if the char is set and skips over the ignored values
                  if (isset($symbol) && !(in_array($key, $excludedKeys))){
                    $image = RESOURCE_PATH. $symbol;
                    echo "<img src=$image width=80 />";
                  }
                }
              ?>
            </div>
            <p class="lead">Number of Guesses: <?php echo $passcode['guesses']; ?></p>
            <p class="lead">Number of Correct Guesses: <?php echo $passcode['correct_guesses']; ?></p>
            <p class="lead">Pattern Score: <?php echo calculate_passcode_score($db, USER_ID, get_user_pattern_difficulty($db)); ?></p>
            <p class="lead">Guess Score: <?php echo get_user_score($db); ?></p>
        </div>
    </body>
    <?php include(PRIVATE_PATH . '/footer.php'); ?>
