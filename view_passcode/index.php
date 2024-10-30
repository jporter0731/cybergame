<?php
    require('../private/initialize.php');

    $passcode = view_passcode_queries($db, 12312);

?>
<html lang="en">
    <head>
        <?php include(PRIVATE_PATH . '/header.php'); ?>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href=<?php echo CSS_PATH; ?> rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>
        <!-- Page content-->
        <div class="text-center mt-5">
            <h1>Here is Your Passcode</h1>
            <p class="lead">Number of Guesses: <?php echo $passcode['guesses']; ?></p>
            <p class="lead">Number of Correct Guesses: <?php echo $passcode['correct_guesses']; ?></p>
        </div>
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
    </body>
    <?php include(PRIVATE_PATH . '/footer.php'); ?>
