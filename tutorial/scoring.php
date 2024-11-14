<?php require('../private/initialize.php');
check_redirect();?>

<html lang="en">
    <?php include(PRIVATE_PATH . '/header.php'); ?>
    <body>
        <!-- Responsive navbar-->
        <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h1>Scoring</h1>
                <p class="lead">Welcome, aspiring codebreaker! Understanding the scoring system is crucial for mastering the Galactic Codebreaker game and climbing the leaderboards. Each decision you make while guessing and creating passcodes can significantly impact your score. Here’s a detailed breakdown of how your performance translates into points, with distinct sections for both top guessers and top passcodes.</p>
                <h2>Galactic Guessmasters</h2>
                <p class="lead">In this section, we honor the elite players who excel in solving codes. Your score is a reflection of your skills in both accuracy and speed, rewarding those who can crack the toughest challenges efficiently.</p>
                <div class="card" style="width: 36rem; margin: auto; text-align: center;">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><strong>Difficulty Multiplier</strong><br/>
                        <span style="margin-right: 20px;">Easy: x1 pts</span>
                        <span style="margin-right: 20px;">Medium: x2 pts</span>
                        <span>Hard: x4 pts</span>
                      </li>
                      <li class="list-group-item"><strong>Passcode Solved</strong><br/>
                        <span>100 pts</span>
                      </li>
                      <li class="list-group-item"><strong>Incorrect Guesses</strong><br/>
                        <span>-5 pts/guess</span>
                      </li>
                    </ul>
                </div>
                <br/>
                <h2>Legendary Passcodes</h2>
                <p class="lead">This section celebrates the most challenging codes crafted by users, showcasing their ingenuity and creativity. The scoring for passcodes is determined by their difficulty level, reflecting the skills required to crack them.</p>
                <div class="card" style="width: 36rem; margin: auto; text-align: center;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Difficulty Base Score</strong><br/>
                          <span style="margin-right: 20px;">Easy: 25 pts</span>
                          <span style="margin-right: 20px;">Medium: 50 pts</span>
                          <span>Hard: 100 pts</span>
                        </li>
                        <li class="list-group-item"><strong>Solved Passcode Count</strong><br/>
                          <span>-25 pts/guess</span>
                        </li>
                        <li class="list-group-item"><strong>Total Guesses</strong><br/>
                          <span>10 pts/guess</span>
                        </li>
                    </ul>
                </div>
                <br/>
            </div>
        </div>
        <div class="button-container">
            <button class="galactic-button" onclick="location.href='<?php echo url_for("tutorial") ?>';">Back to Tutorial</button>
        </div>
    </body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
