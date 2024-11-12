<?php
require('../private/initialize.php');
?>
<html lang="en">
<?php include(PRIVATE_PATH . '/header.php'); ?>
<body>
    <!-- Responsive navbar -->
    <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>

    <!-- Show this if the passcode is already set-->
    <?php if (get_user_pattern($db) === NULL) { ?>
      <div class="container">
        <div class="container">
            <div class="text-center mt-5">
                <h1>Registration</h1>
                <p class="lead">Welcome, space explorer! Your galactic journey begins here. Set your passcode to secure your adventure, and get your unique alias to represent you among the stars. If you'd like to explore a different identity, just click to generate a new alias.</p>
            </div>
            <div id="snackbar-container"></div>
            <div class="text-center mt-5">
                <h2>Choose an Alias</h2>
                <p class="lead">Your galactic adventure begins with a unique alias, automatically chosen for you. This name will represent you as you journey through the stars. If you’d like to try a different one, simply click the button below to generate a new alias and start fresh.</p>
                <p id="aliasDisplay"></p>
                <div class="button-container">
                    <button class="galactic-button" onclick="generateAlias()">Generate New Alias</button>
                </div>
            </div>
            <div class="text-center mt-5">
                <h2>Pick a Pascode</h1>
                <p class="lead">Create your passcode below to embark on your journey through the galaxy. Your passcode must be no more than 6 symbols long, and you can use symbols more than once. Let your imagination guide you as you craft a passcode that reflects your unique style and readiness for adventure.</p>
            </div>
            <!-- The below code was created using the assistance of ChatGPT 4.0. All code was properly tested and works as intended -->
            <div id="output"></div>
            <div class="keyboard">
                <?php
                // Define an array of key images (placeholders for 18 keys)
                $keys = [
                  'Q' => RESOURCE_PATH . 'character1.png',
                  'W' => RESOURCE_PATH . 'character2.png',
                  'E' => RESOURCE_PATH . 'character3.png',
                  'R' => RESOURCE_PATH . 'character4.png',
                  'T' => RESOURCE_PATH . 'character5.png',
                  'Y' => RESOURCE_PATH . 'character6.png',
                  'A' => RESOURCE_PATH . 'character7.png',
                  'S' => RESOURCE_PATH . 'character8.png',
                  'D' => RESOURCE_PATH . 'character9.png',
                  'F' => RESOURCE_PATH . 'character10.png',
                  'G' => RESOURCE_PATH . 'character11.png',
                  'H' => RESOURCE_PATH . 'character12.png',
                  'Z' => RESOURCE_PATH . 'character13.png',
                  'X' => RESOURCE_PATH . 'character14.png',
                  'C' => RESOURCE_PATH . 'character15.png',
                  'V' => RESOURCE_PATH . 'character16.png',
                  'B' => RESOURCE_PATH . 'character17.png',
                  'N' => RESOURCE_PATH . 'character18.png',
                ];
                ?>

                <?php
                // Display only the first 18 keys
                foreach ($keys as $key => $image) {
                    echo "<div class='key' onclick=\"addToOutput('$image', '$key')\"><img src='$image' alt='$key'></div>";
                }
                ?>
            </div>

            <div class="button-container">
                <button class="galactic-button" onclick="clearOutput()">Clear</button>
                <button class="galactic-button" onclick="removeLast()">Back</button>
                <button class="galactic-button" onclick="submitOutput()">Submit</button>
            </div>
          </div>
      </div>
    <?php } else { ?>
      <div class="container">
          <div class="text-center mt-5">
              <h1>Registration</h1>
              <p class="lead">Welcome back, space explorer! It looks like you've already been here. To continue your adventure, you can dive straight back into the action or take a quick tutorial to brush up on your skills. The choice is yours!</p>
          </div>
          <div class="button-container">
              <button class="galactic-button" onclick="window.location.href='<?php echo url_for('pick_passcode'); ?>';">Return to Adventure</button>
              <button class="galactic-button" onclick="window.location.href='<?php echo url_for('tutorial'); ?>';">View Tutorial</button>
          </div>
      </div>
    <?php } ?>

    <script src="registration.js" defer></script>
    <script src="alias.js" defer></script>
  </body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
