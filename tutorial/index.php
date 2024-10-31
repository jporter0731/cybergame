<?php require('../private/initialize.php');?>

<html lang="en">
    <?php include(PRIVATE_PATH . '/header.php'); ?>
    <body>
        <!-- Responsive navbar-->
        <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h1>Tutorial</h1>
                <p class="lead">As you navigate the vast expanse of the galaxy, it's essential to equip yourself with the knowledge needed to become a master codebreaker. Below, you’ll find three unique aspects of the game, each crucial for understanding the rules and strategies that will aid you on your journey. Select one of the buttons to delve into the tutorial that aligns with your needs. Each option will provide vital insights to prepare you for the challenges that lie ahead. Choose wisely, and may your quest for knowledge lead you to success among the stars!</p>
            </div>
        <div class="button-container">
            <button class="galactic-button" onclick="location.href='<?php echo url_for("tutorial/rules.php") ?>';">Rules</button>
            <button class="galactic-button" onclick="location.href='<?php echo url_for("tutorial/keyboard.php") ?>';">Using a Keyboard</button>
            <button class="galactic-button" onclick="location.href='<?php echo url_for("tutorial/scoring.php") ?>';">Scoring</button>
        </div>
        </div>
    </body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
