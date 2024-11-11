<?php require('private/initialize.php');?>
<html lang="en">
<?php include(PRIVATE_PATH . '/header.php'); ?>
</head>
<body>
    <!-- Responsive navbar -->
    <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>

    <!-- Page content -->
    <div class="container">
        <div class="text-center mt-5">
            <h1>Welcome to Galactic Codebreaker</h1>
            <p class="lead">
                In a faraway galaxy, where the hum of technology meets the quiet of the cosmos, you take on the role of a determined codebreaker. Your goal? To crack as many passcodes as possible to unlock the secrets hidden within this vast universe. But before you begin, you'll need to set your own passcode—a simple yet vital step in your journey.<br/>
                This game invites you to engage your mind as you tackle a series of passcodes, each presenting a unique challenge. As you navigate through different levels, you’ll encounter puzzles that require focus and logic, testing your ability to think critically. Each passcode you crack will bring you closer to mastery, but remember, the first step starts with you. Choose a passcode that reflects your style—then dive into the task of decoding the rest. Are you ready to unlock the mysteries that lie ahead? Your adventure begins now!
            </p>
        </div>
        <div class="button-container">
            <button class="galactic-button" onclick="location.href='<?php echo url_for("pick_passcode") ?>';">Start Adventure</button>
            <button class="galactic-button" onclick="location.href='<?php echo url_for("leaderboard") ?>';">Leaderboard</button>
        </div>
    </div>
</body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
