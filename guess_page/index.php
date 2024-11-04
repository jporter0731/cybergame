<?php require('../private/initialize.php');

$passcodeID = isset($_GET['passcode_id']) ? $_GET['passcode_id'] : null;

?>

<html lang="en">
    <?php include(PRIVATE_PATH . '/header.php'); ?>
    <body>
        <!-- Responsive navbar-->
        <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>
        <!-- Page content-->
        <div class="container">
            <?php if (isset($passcodeID)) { ?>
            <div class="text-center mt-5">
                <h1>You Are Currently Trying to Crack Pascode <?php echo $passcodeID; ?></h1>
                <p class="lead">Make your guess using the character cards below. Remember, each secret code consists of 1 to 6 symbols, and duplicates are allowed. Harness your skills and intuition as you work to unlock this cosmic mystery. For added convenience, you can use keyboard shortcuts to make your guesses. Check out the keyboard tutorial for guidance on mastering your inputs. Good luck, codebreaker! Your journey through the stars continues!</p>
            </div>
          <?php }else{ ?>
            <div class="text-center mt-5">
                <h1>Oops! It Looks Like You’re in the Wrong Place</h1>
                <p class="lead">It seems you've landed here by mistake. No worries! To continue your adventure, please use the dropdown menu above to navigate back to the "Guess a Passcode" page. Your journey awaits, and we’re excited to have you back on track!</p>
            </div>
          <?php } ?>
			<div class="table-responsive">
				<table class="table caption-top">
					<caption>Previous Guesses</caption>
					<thead>
						<tr>
							<td colspan="7" style="color: #dddddd;">Guess #</td>
						</tr>
					</thead>
					<tbody>
						<tr style="text-align: center;">
							<th scope="row" style="color: #dddddd;">1</th>
              <!--Previous Guesses here-->
						</tr>
					</tbody>
				</table>
			</div>
      <?php if (isset($passcodeID)) {
          include('keyboard.php');
        } ?>
		</div>
    </body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
