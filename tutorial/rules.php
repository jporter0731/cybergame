<?php require('../private/initialize.php');?>

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
        <div class="container">
            <div class="text-center mt-5">
                <h1>Rules Tutorial: Mastering the Art of Codebreaking</h1>
                <p class="lead">Welcome, aspiring codebreaker! As you embark on this thrilling journey through the stars, it's crucial to familiarize yourself with the rules that govern the game. Follow these steps to enhance your skills and ensure your success in cracking the passcode.</p>
            </div>
            <div class="text-center mt-5">
                <h3>Enter Your Guess</h3>
                <p class="lead">To begin your quest, use the on-screen keyboard or your keyboard shortcuts to enter your guess. Once you’ve crafted your potential passcode, click the Submit button to send your guess into the cosmic void. Every guess brings you closer to unlocking the mysteries hidden among the stars!</p>
            </div>
            <div class="text-center mt-5">
                <h3>Receive Feedback on Your Guess</h3>
                <p class="lead">Once your guess is submitted, the game will provide immediate feedback to guide you on your journey:<br/></p>
                <p class="lead">Red Background: This signifies that the symbol you guessed is not included in the passcode at all. Discard this symbol from your future guesses!<br/></p>
                <?php include('../tutorial/example_red.php'); ?>
                <p class="lead">Yellow Background: A yellow background indicates that the symbol is present in the passcode, but it’s in the wrong position. This means you're on the right track, but adjustments are needed.<br/></p>
                <?php include('../tutorial/example_yellow.php'); ?>
                <p class="lead">Green Background: A green background means that the symbol is correctly placed within the passcode! You’re getting closer to cracking the code!<br/></p>
                <?php include('../tutorial/example_green.php'); ?>
                <p class="lead">A complete guess will look something like this.</p>
                <?php include('../tutorial/example_full.php'); ?>
                </p>
            </div>
            <div class="text-center mt-5">
                <h3>Deduce and Repeat</h3>
                <p class="lead">Armed with the feedback from your guesses, it's time to employ your deductive reasoning. Analyze the clues and make strategic changes to your next passcode guess. Keep refining your approach, using the feedback as your guide, and repeat the guessing process until you successfully solve the pattern.</p>
            </div>
        </div>
        <div class="button-container">
            <button class="galactic-button" onclick="location.href='<?php echo url_for("tutorial") ?>';">Back to Tutorial</button>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
