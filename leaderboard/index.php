<?php require('../private/initialize.php');?>
<html lang="en">
<?php include(PRIVATE_PATH . '/header.php'); ?>
</head>
<body>
    <!-- Responsive navbar -->
    <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>

    <!-- Page content -->
    <div class="container">
        <div class="text-center mt-5">
            <h1>Leaderboard</h1>
            <p class="lead"><br/>Welcome to the Galactic Codebreaker Leaderboard, where the universe's most skilled codebreakers shine! Here, you can see the top players who have demonstrated their extraordinary talent in cracking the cosmic codes. Each entry reflects not only speed but also precision in solving intricate patterns and puzzles. Compete against friends and fellow adventurers as you climb the ranks and prove your prowess.<br/><br/>Will you rise to the challenge and etch your name among the stars? Check back often to see if you’ve claimed the top spot or if new challengers are hot on your trail. May the best codebreaker win!<br/><br/></p>
            <h2>Galactic Guessmasters</h2>
            <p class="lead">The elite players with the highest scores in the cosmic codebreaking challenge.</p>
            <!--Put user leaderboard here-->
            <h2>Legendary Passcodes</h2>
            <p class="lead">The most challenging codes that have tested the galaxy's brightest minds.</p>
            <!--Put pattern leaderboard here-->
        </div>
    </div>

</body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
