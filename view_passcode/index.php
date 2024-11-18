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
            <h1><?php echo get_user_alias($db); ?>'s Statistics:</h1>
            <p class="lead">Passcode Score:</p>
            <div id="aliasDisplay"><?php echo calculate_passcode_score($db, get_user_pattern($db, $_SESSION['username']), get_user_pattern_difficulty($db)); ?></div>
            <p class="lead">Guess Score:</p>
            <div id="aliasDisplay"><?php echo get_user_score($db); ?></div>
            <p class="lead">Passcodes Solved:</p>
            <div id="aliasDisplay"><?php echo generate_patterns_solved($db); ?></div>
            <p class="lead">Guesses Per Passcode:</p>
            <div id="aliasDisplay"><?php echo generate_guesses_per_pattern($db); ?></div>
            <p class="lead">Your Passcode:</p>
            <div id="aliasDisplay">
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
            </div>
        </div>
    </body>
    <?php include(PRIVATE_PATH . '/footer.php'); ?>
