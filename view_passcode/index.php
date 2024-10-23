<?php
    require('../private/initialize.php');

    $passcode = [
        "../resources/character1.png",
        "../resources/character12.png",
        "../resources/character5.png",
        "../resources/character8.png",
        "../resources/character10.png",
        "../resources/character18.png"
    ];
?>
<html lang="en">
    <head>
        <?php include('../private/header.php'); ?>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <?php include('../private/nav_bar.php'); ?>
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
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </html>
