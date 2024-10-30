<?php
    require('../private/initialize.php');

    $passcode = [
        RESOURCE_PATH . "character1.png",
        RESOURCE_PATH . "character12.png",
        RESOURCE_PATH . "character5.png",
        RESOURCE_PATH . "character8.png",
        RESOURCE_PATH . "character10.png",
        RESOURCE_PATH . "character18.png"
    ];
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
            <p class="lead">Number of Guesses: #####</p>
            <p class="lead">Number of Correct Guesses: #####</p>
        </div>
        <div class="image-container">
          <?php
            foreach ($passcode as $symbol){
              echo "<img src=$symbol width=80 />";
            }
          ?>
        </div>
    </body>
    <?php include(PRIVATE_PATH . '/footer.php'); ?>
