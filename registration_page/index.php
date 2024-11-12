<?php require('../private/initialize.php');?>
<html lang="en">
<?php include(PRIVATE_PATH . '/header.php'); ?>
<body>
    <!-- Responsive navbar -->
    <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>

    <!-- Show this if the passcode is already set-->
    <?php if (get_user_pattern($db) === NULL) { ?>
      <div class="container">
          <div class="text-center mt-5">
              <h1>Registration (TODO)</h1>
          </div>
      </div>
    <?php } else { ?>
      <div class="container">
          <div class="text-center mt-5">
              <h1>Registration</h1>
              <p class="lead">It looks like you have been here already. To continue your adventure use one of the buttons below.</p>
          </div>
      </div>

    <?php } ?>


  </body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
