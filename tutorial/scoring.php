<?php require('../private/initialize.php');?>

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
        <div class="container">
            <div class="text-center mt-5">
                <h1>Scoring</h1>
                <p class="lead">Welcome to the Keyboard Tutorial! Here, you can familiarize yourself with the controls for Passcode Protector. The keys and their corresponding symbols are mapped below, giving you the tools you need to navigate this interstellar challenge. Use this page to practice and get comfortable with the keyboard before you venture into the game. Sharpen your skills, and prepare to unlock the mysteries of the galaxy!</p>
            </div>
        </div>
        <div class="button-container">
            <button class="galactic-button" onclick="location.href='<?php echo url_for("tutorial") ?>';">Back to Tutorial</button>
        </div>
    </body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
