<?php require('../private/initialize.php');?>

<!DOCTYPE html>
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
                <h1>Set Your Passcode</h1>
                <p class="lead">Create your passcode below to embark on your journey through the galaxy. Your passcode must be no more than 6 symbols long, and you can use symbols more than once. Let your imagination guide you as you craft a passcode that reflects your unique style and readiness for adventure. Get ready to dive into the mysteries of the cosmos!</p>
            </div>
			<!-- The below code was created using the assistance of ChatGPT 4.0. All code was properly tested and works as intended -->
      <div class="keyboard">
          <?php
          // Define an array of key images (placeholders for 18 keys)
          $keys = [
              'Q' => '../resources/character1.png',
              'W' => '../resources/character2.png',
              'E' => '../resources/character3.png',
              'R' => '../resources/character4.png',
              'T' => '../resources/character5.png',
              'Y' => '../resources/character6.png',
              'A' => '../resources/character7.png',
              'S' => '../resources/character8.png',
              'D' => '../resources/character9.png',
              'F' => '../resources/character10.png',
              'G' => '../resources/character11.png',
              'H' => '../resources/character12.png',
              'Z' => '../resources/character13.png',
              'X' => '../resources/character14.png',
              'C' => '../resources/character15.png',
              'V' => '../resources/character16.png',
              'B' => '../resources/character17.png',
              'N' => '../resources/character18.png',
          ];

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

      <div id="output"></div>

      <script>
          // Create a mapping of keys to image sources
          const keyImages = {
            'Q': '../resources/character1.png',
            'W': '../resources/character2.png',
            'E': '../resources/character3.png',
            'R': '../resources/character4.png',
            'T': '../resources/character5.png',
            'Y': '../resources/character6.png',
            'A': '../resources/character7.png',
            'S': '../resources/character8.png',
            'D': '../resources/character9.png',
            'F': '../resources/character10.png',
            'G': '../resources/character11.png',
            'H': '../resources/character12.png',
            'Z': '../resources/character13.png',
            'X': '../resources/character14.png',
            'C': '../resources/character15.png',
            'V': '../resources/character16.png',
            'B': '../resources/character17.png',
            'N': '../resources/character18.png',
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
