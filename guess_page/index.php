<?php require('../private/initialize.php');?>

<html lang="en">
    <?php include(PRIVATE_PATH . '/header.php'); ?>
    <body>
        <!-- Responsive navbar-->
        <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h1>You Are Currently Trying to Crack Pascode ######</h1>
                <p class="lead">Make your guess using the character cards below. Remember, each secret code consists of 1 to 6 symbols, and duplicates are allowed. Harness your skills and intuition as you work to unlock this cosmic mystery. For added convenience, you can use keyboard shortcuts to make your guesses. Check out the keyboard tutorial for guidance on mastering your inputs. Good luck, codebreaker! Your journey through the stars continues!</p>
            </div>
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
			<!--Put current guess here-->
			<!--put symbol keyboard here-->
      <?php include(PRIVATE_PATH . '/keyboard.php'); ?>
		</div>
    </body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
