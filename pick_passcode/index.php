<?php
  require('../private/initialize.php');

  // Get a list of all the patterns in the database that can be guessed
  $passcodes = get_available_patterns($db);

  // Get guess info for the users passcode
  $guessInfo = get_guess_info($db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(PRIVATE_PATH . '/header.php'); ?>
    <!-- Core theme CSS (includes Bootstrap) -->
    <link href=<?php echo CSS_PATH; ?> rel="stylesheet" />
</head>
<body>
    <!-- Responsive navbar -->
    <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>

    <!-- Page content -->
    <div class="container">
        <div class="text-center mt-5">
            <h1>Choose Your Target Passcode</h1>
            <p class="lead">
                Select a passcode from the list below to test your skills as a codebreaker. Each passcode holds its own secrets waiting to be uncovered. Feel free to explore your options, and remember, the "Passcode Example" is here to help you practice before you dive into the real challenges. Prepare yourself—every guess brings you closer to mastery in this cosmic quest!
            </p>
        </div>

        <div class="container">
            <div class="row">
                <div class="row justify-content-center">
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Your Passcode</li>
                                <li class="list-group-item">Correct Guesses: <?php echo $guessInfo['correct_guesses']; ?></li>
                                <li class="list-group-item">Total Guesses: <?php echo $guessInfo['guesses']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row gy-3 justify-content-center">
                    <?php foreach ($passcodes as $passcode): ?>
                        <div class="col-md-3 d-flex justify-content-center">
                            <div class="card" style="width: 18rem;">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Passcode <?php echo $passcode['id']; ?></li>
                                    <li class="list-group-item">Difficulty: <?php echo $passcode['difficulty']; ?></li>
                                    <li class="list-group-item">Status: <?php echo $passcode['status']; ?></li>
                                    <li class="list-group-item">Guess Count: <?php echo $passcode['guess_count']; ?></li>
                                </ul>
                                <?php
                                  if($passcode['status'] !== 'Complete'){ ?>
                                    <div class="card-footer">
                                    	<a href= <?php echo url_for('guess_page'); ?> class="card-link">View Passcode</a>
                                    </div>
                                <?php  }
                                ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
