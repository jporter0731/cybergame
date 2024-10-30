<?php
  require('../private/initialize.php');
  $passcodes = [
    [
        'id' => 1,
        'difficulty' => 'easy',
        'status' => 'not started',
        'guess_count' => 10
    ],
    [
        'id' => 2,
        'difficulty' => 'easy',
        'status' => 'in progress',
        'guess_count' => 5
    ],
    [
        'id' => 3,
        'difficulty' => 'easy',
        'status' => 'complete',
        'guess_count' => 8
    ],
    [
        'id' => 4,
        'difficulty' => 'medium',
        'status' => 'not started',
        'guess_count' => 15
    ],
    [
        'id' => 5,
        'difficulty' => 'medium',
        'status' => 'in progress',
        'guess_count' => 20
    ],
    [
        'id' => 6,
        'difficulty' => 'medium',
        'status' => 'complete',
        'guess_count' => 30
    ],
    [
        'id' => 7,
        'difficulty' => 'hard',
        'status' => 'not started',
        'guess_count' => 40
    ],
    [
        'id' => 8,
        'difficulty' => 'hard',
        'status' => 'in progress',
        'guess_count' => 50
    ],
    [
        'id' => 9,
        'difficulty' => 'hard',
        'status' => 'complete',
        'guess_count' => 60
    ],
    [
        'id' => 10,
        'difficulty' => 'extreme',
        'status' => 'not started',
        'guess_count' => 70
    ],
    [
        'id' => 11,
        'difficulty' => 'extreme',
        'status' => 'in progress',
        'guess_count' => 80
    ],
    [
        'id' => 12,
        'difficulty' => 'extreme',
        'status' => 'complete',
        'guess_count' => 90
    ],
    [
        'id' => 13,
        'difficulty' => 'extreme',
        'status' => 'complete',
        'guess_count' => 90
    ],
  ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(PRIVATE_PATH . '/header.php'); ?>
    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="../css/styles.css" rel="stylesheet" />
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
                                <li class="list-group-item">Correct Guesses: ####</li>
                                <li class="list-group-item">Total Guesses: ####</li>
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
                                <div class="card-footer">
                                    <a href= <?php echo url_for('guess_page'); ?> class="card-link">View Passcode</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
