<?php require('../private/initialize.php');

// Example PHP code to fetch top 10 leaderboard data from a database
$leaderboardData = [
    ['rank' => 1, 'passcode' => 'Pattern1', 'score' => 100],
    ['rank' => 2, 'passcode' => 'Pattern2', 'score' => 95],
    // Add more data...
];
?>
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
            <p class="lead"><br/>Welcome to the Galactic Codebreaker Leaderboard, where you can see the top players who have demonstrated their extraordinary talent in cracking the cosmic codes. Compete against friends and fellow adventurers as you climb the ranks and prove your prowess.<br/><br/>Will you rise to the challenge and etch your name among the stars? Check back often to see if you’ve claimed the top spot or if new challengers are hot on your trail. May the best codebreaker win!<br/><br/></p>
            <div class="container">
              <div class="row">
                <!-- First section (Galactic Guessmasters) -->
                <div class="col-md-6">
                  <h2>Galactic Guessmasters</h2>
                  <p class="lead">The elite players with the highest scores in the cosmic codebreaking challenge.</p>
                  <!-- Put user leaderboard here -->
                </div>

                <!-- Second section (Legendary Passcodes) -->
                <div class="col-md-6">
                  <h2>Legendary Passcodes</h2>
                  <p class="lead">The most challenging codes that have tested the galaxy's brightest minds.</p>
                  <!-- This is the start of the passcodes ranking card -->
                  <div class="container mt-4">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Top 10 Patterns</h3>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-4"><h5>Rank</h5></div>
                              <div class="col-md-4"><h5>Passcode</h5></div>
                              <div class="col-md-4"><h5>Score</h5></div>
                            </div>
                            <?php foreach ($leaderboardData as $entry): ?>
                              <div class="row">
                                <div class="col-md-4"><?= $entry['rank'] ?></div>
                                <div class="col-md-4"><?= $entry['passcode'] ?></div>
                                <div class="col-md-4"><?= $entry['score'] ?></div>
                              </div>
                            <?php endforeach; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

</body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
