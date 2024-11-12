<?php require('../private/initialize.php');
session_start();  // Start the session

// Check if there's an error message in the session
if (isset($_SESSION['error'])) {
    $error_message = $_SESSION['error'];  // Store the error message
    unset($_SESSION['error']);  // Clear the error message from the session
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
                      <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
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

  </body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
