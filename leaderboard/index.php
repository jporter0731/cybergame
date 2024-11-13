<?php require('../private/initialize.php');

// Example PHP code to fetch top 10 leaderboard data from a database
$passcodeData = get_top_passcodes($db);

// Example PHP code to fetch top 10 leaderboard data from a database
$aliasData = get_top_users($db);

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
            <p class="lead">Welcome to the Galactic Codebreaker Leaderboard, where you can see the top players who have demonstrated their extraordinary talent in cracking the cosmic codes. Compete against friends and fellow adventurers as you climb the ranks and prove your prowess.<br/></p>
            <div class="container">
              <div class="row">
                <!-- First section (Galactic Guessmasters) -->
                <div class="col-md-6">
                  <!-- Put user leaderboard here -->
                  <div class="container mt-4">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header" style="background-color: #C4A4A4;">
                            <h3 class="card-title">Galactic Guessmasters</h3>
                          </div>
                          <div class="card-body" style="background-color: #A8B9E2;">
                            <div class="row">
                              <div class="col-md-4"><h5>Rank</h5></div>
                              <div class="col-md-4"><h5>Alias</h5></div>
                              <div class="col-md-4"><h5>Score</h5></div>
                            </div>
                            <?php foreach ($aliasData as $entry): ?>
                              <div class="row">
                                <div class="col-md-4"><?= $entry['rank'] ?></div>
                                <div class="col-md-4"><?= $entry['alias'] ?></div>
                                <div class="col-md-4"><?= $entry['score'] ?></div>
                              </div>
                              <hr>
                            <?php endforeach; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Second section (Legendary Passcodes) -->
                <div class="col-md-6">
                  <!-- This is the start of the passcodes ranking card -->
                  <div class="container mt-4">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header" style="background-color: #C4A4A4;">
                            <h3 class="card-title">Legendary Passcodes</h3>
                          </div>
                          <div class="card-body" style="background-color: #A8B9E2;">
                            <div class="row">
                              <div class="col-md-4"><h5>Rank</h5></div>
                              <div class="col-md-4"><h5>User Alias</h5></div>
                              <div class="col-md-4"><h5>Score</h5></div>
                            </div>
                            <?php foreach ($passcodeData as $entry): ?>
                              <div class="row">
                                <div class="col-md-4"><?= $entry['rank'] ?></div>
                                <div class="col-md-4"><?= $entry['passcode'] ?></div>
                                <div class="col-md-4"><?= $entry['score'] ?></div>
                              </div>
                              <hr>
                            <?php endforeach; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="lead">The most challenging codes that have tested the galaxy's brightest minds.</p> FIXME remove or put back in later -->
                </div>
              </div>
            </div>
        </div>
    </div>

</body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
