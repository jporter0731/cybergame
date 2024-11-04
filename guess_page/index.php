<?php require('../private/initialize.php');

$passcodeID = isset($_GET['passcode_id']) ? $_GET['passcode_id'] : null;

$previousGuessSQL = "SELECT * FROM guesses WHERE correct_pattern = " . $passcodeID . " AND user_guessing = " . USER_ID . " ORDER BY guess_time ASC";
$previous_guess_set = mysqli_query($db, $previousGuessSQL);

?>

<html lang="en">
    <?php include(PRIVATE_PATH . '/header.php'); ?>
    <body>
        <!-- Responsive navbar-->
        <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>
        <!-- Page content-->
        <div class="container">
            <!--The below line checks if the passcode is set and then makes sure that it exits in the database-->
            <?php if (isset($passcodeID) && (pattern_exists($db, $passcodeID) > 0) && (pattern_solved($db, $passcodeID) === 0)) { ?>
            <div class="text-center mt-5">
                <h1>You Are Currently Trying to Crack Pascode <?php echo $passcodeID; ?></h1>
                <p class="lead">Make your guess using the character cards below. Remember, each secret code consists of 1 to 6 symbols, and duplicates are allowed. Harness your skills and intuition as you work to unlock this cosmic mystery. For added convenience, you can use keyboard shortcuts to make your guesses. Check out the keyboard tutorial for guidance on mastering your inputs. Good luck, codebreaker! Your journey through the stars continues!</p>
            </div>
          <?php }elseif (pattern_solved($db, $passcodeID) > 0){ ?>
            <div class="text-center mt-5">
                <h1>Congratulations! You Have Cracked Pascode <?php echo $passcodeID; ?></h1>
                <p class="lead"><p class="lead">It seems you've successfully solved the pattern! No worries about landing here by mistake. To continue your adventure, please use the dropdown menu above to navigate back to the "Guess a Passcode" page. Your journey awaits, and we’re excited to see where your next challenge takes you!</p></p>
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
              <?php $count = 0; /*Set the count variable for the number of guesses made*/
              while($pattern = mysqli_fetch_assoc($previous_guess_set)){
                  $count++;
                  $guessID = $pattern['pattern_guessed'];
                  $charList = view_passcode($db, $guessID);
              ?>
							<th scope="row" style="color: #dddddd; text-align: center; vertical-align: middle;"><?php echo $count; ?></th>
              <?php foreach ($charList as $key => $value){
                    $resourceLink = RESOURCE_PATH . $value; ?>
                    <td class="coloryl" style="text-align: center;">
      								<button class="btn btn-default">
      									<img src=<?php echo $resourceLink; ?> width="80" />
      								</button>
      							</td>
              <?php } ?>
						</tr>
            <?php } ?>
					</tbody>
				</table>
			</div>
      <?php if (isset($passcodeID)) {
          include('keyboard.php');
        } ?>
		</div>
    </body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
