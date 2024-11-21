<?php require('../private/initialize.php');
session_start();

// Check if there's an error message in the session
if (isset($_SESSION['error'])) {
    $error_message = $_SESSION['error'];  // Store the error message
    unset($_SESSION['error']);  // Clear the error message from the session
}

$loggedIn = checkSession();

if ($loggedIn){
  // Redirect to the login page
  header("Location: ../pick_passcode");
}

?>

<html lang="en">
<?php include(PRIVATE_PATH . '/header.php'); ?>
<body>
    <!-- Responsive navbar -->
    <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>

    <!-- Page content -->
    <div class="container">
      <div class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
          <div class="card shadow-sm p-4 mt-5" style="background-color: #A8B9E2;">
              <h2 class="text-center mb-4">Login</h2>
              <!-- Show error message if it exists -->
                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>

              <!-- Login Form -->
              <form action="login_logic.php" method="POST">
                  <!-- Username input -->
                  <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="username" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                  </div>
                  <!-- Password input -->
                  <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        <button type="button" class="btn btn-outline-secondary" id="togglePassword" onclick="togglePassword()">Show</button>
                      </div>
                  </div>
                  <!-- Submit button -->
                  <div class="d-grid gap-2">
                      <button type="submit" class="galactic-button">Login</button>
                  </div>
              </form>
          </div>
      </div>
    </div>
    </div>
    <script>
        // Select the button and password field
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');

        // Attach event listener to button for toggling password visibility
        togglePassword.addEventListener('click', function() {
          // Check if password is hidden or visible
          if (passwordField.type === 'password') {
            passwordField.type = 'text';  // Change type to 'text' to show password
            togglePassword.textContent = 'Hide';  // Change button text to 'Hide'
          } else {
            passwordField.type = 'password';  // Change type back to 'password' to hide password
            togglePassword.textContent = 'Show';  // Change button text to 'Show'
          }
        });
      </script>
  </body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
