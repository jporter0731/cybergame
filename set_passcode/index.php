<?php require('../private/initialize.php');?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include(PRIVATE_PATH . '/header.php'); ?>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h1>Set Your Passcode</h1>
                <p class="lead">Create your passcode below to embark on your journey through the galaxy. Your passcode must be no more than 6 symbols long, and you can use symbols more than once. Let your imagination guide you as you craft a passcode that reflects your unique style and readiness for adventure. Get ready to dive into the mysteries of the cosmos!</p>
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
          foreach (array_slice($keys, 0, 18) as $key => $image) {
              echo "<div class='key' onclick=\"addToOutput('$image', '$key')\"><img src='$image' alt='$key'></div>";
          }
          ?>
      </div>

      <div class="button-container">
          <button class="galactic-button" onclick="clearOutput()">Clear</button>
          <button class="galactic-button" onclick="removeLast()">Back</button>
          <button class="galactic-button" onclick="submitOutput()">Submit</button> <!-- FIXME: Implement functionality later -->
      </div>

      <script>
          // Create a mapping of keys to image sources
          const keyImages = {
            'Q': '<?php echo RESOURCE_PATH; ?>character1.png',
            'W': '<?php echo RESOURCE_PATH; ?>character2.png',
            'E': '<?php echo RESOURCE_PATH; ?>character3.png',
            'R': '<?php echo RESOURCE_PATH; ?>character4.png',
            'T': '<?php echo RESOURCE_PATH; ?>character5.png',
            'Y': '<?php echo RESOURCE_PATH; ?>character6.png',
            'A': '<?php echo RESOURCE_PATH; ?>character7.png',
            'S': '<?php echo RESOURCE_PATH; ?>character8.png',
            'D': '<?php echo RESOURCE_PATH; ?>character9.png',
            'F': '<?php echo RESOURCE_PATH; ?>character10.png',
            'G': '<?php echo RESOURCE_PATH; ?>character11.png',
            'H': '<?php echo RESOURCE_PATH; ?>character12.png',
            'Z': '<?php echo RESOURCE_PATH; ?>character13.png',
            'X': '<?php echo RESOURCE_PATH; ?>character14.png',
            'C': '<?php echo RESOURCE_PATH; ?>character15.png',
            'V': '<?php echo RESOURCE_PATH; ?>character16.png',
            'B': '<?php echo RESOURCE_PATH; ?>character17.png',
            'N': '<?php echo RESOURCE_PATH; ?>character18.png',
          };

          function addToOutput(imageSrc, key) {
              const output = document.getElementById('output');
              const images = output.getElementsByTagName('img');

              if (images.length >= 6) {
                  alert("You can only enter up to 6 letters."); // Standard alert
                  return; // Exit if the limit is reached
              }

              const img = document.createElement('img');
              img.src = imageSrc;
              img.className = 'output-image';
              output.appendChild(img);
          }

          // Listen for keypress events
          document.addEventListener('keypress', function(event) {
              const key = event.key.toUpperCase(); // Convert to uppercase
              if (keyImages[key]) {
                  addToOutput(keyImages[key], key); // Add image for the corresponding key
              }
          });

          // Listen for keydown events for Backspace and Escape
          document.addEventListener('keydown', function(event) {
              if (event.key === 'Backspace') {
                  removeLast(); // Call removeLast function on Backspace
              }
              if (event.key === 'Escape') {
                  clearOutput(); // Call clearOutput function on Escape
              }
          });

          function removeLast() {
              const output = document.getElementById('output');
              const images = output.getElementsByTagName('img');
              if (images.length > 0) {
                  output.removeChild(images[images.length - 1]);
              }
          }

          function clearOutput() {
              const output = document.getElementById('output');
              output.innerHTML = ''; // Clear all images
          }

          function submitOutput() {
              // FIXME: Implement functionality later
              console.log("Submit functionality will be implemented later.");
          }
      </script>
		</div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
