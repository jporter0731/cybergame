<?php
require('../private/initialize.php');

// Example Data
$exampleCharacters = [
    ['image' => '../resources/character1.png', 'alt' => 'Character 1'],
    ['image' => '../resources/character8.png', 'alt' => 'Character 8'],
    ['image' => '../resources/character12.png', 'alt' => 'Character 12'],
];

// Full Example Data
$fullExampleCharacters = [
    ['image' => '../resources/character1.png', 'alt' => 'Character 1', 'class' => 'colorrd'],
    ['image' => '../resources/character5.png', 'alt' => 'Character 5', 'class' => 'colorgn'],
    ['image' => '../resources/character12.png', 'alt' => 'Character 12', 'class' => 'coloryl'],
    ['image' => '../resources/character13.png', 'alt' => 'Character 13', 'class' => 'colorgn'],
    ['image' => '../resources/character8.png', 'alt' => 'Character 8', 'class' => 'coloryl'],
    ['image' => '../resources/character16.png', 'alt' => 'Character 16', 'class' => 'colorrd'],
];
$fullExampleCharacters2 = [
    ['image' => '../resources/character7.png', 'alt' => 'Character 1', 'class' => 'coloryl'],
    ['image' => '../resources/character18.png', 'alt' => 'Character 5', 'class' => 'colorrd'],
    ['image' => '../resources/character2.png', 'alt' => 'Character 12', 'class' => 'colorgn'],
    ['image' => '../resources/character1.png', 'alt' => 'Character 13', 'class' => 'coloryl'],
    ['image' => '../resources/empty.png', 'alt' => 'Character 8', 'class' => 'colorrd'],
    ['image' => '../resources/empty.png', 'alt' => 'Character 16', 'class' => 'colorgn'],
];
?>

<html lang="en">
    <?php include(PRIVATE_PATH . '/header.php'); ?>
    <body>
        <!-- Responsive navbar-->
        <?php include(PRIVATE_PATH . '/nav_bar.php'); ?>
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h1>Rules Tutorial: Mastering the Art of Codebreaking</h1>
                <p class="lead">Welcome, aspiring codebreaker! As you embark on this thrilling journey through the stars, it's crucial to familiarize yourself with the rules that govern the game. Follow these steps to enhance your skills and ensure your success in cracking the passcode.</p>
            </div>
            <div class="text-center mt-5">
                <h2>Your Goal</h2>
                <p class="lead">As a Passcode Protector, your objective is to crack the passcodes as quickly and efficiently as possible. Each time you make a guess, you're getting closer to unlocking the correct passcode. However, the key to maximizing your score lies in making as few guesses as possible. The fewer the guesses, the higher your score — so think carefully and strategize your next move to solve the passcode with precision and speed.</p>
            </div>
            <div class="text-center mt-5">
                <h2>Enter Your Guess</h2>
                <p class="lead">To begin your quest, use the on-screen keyboard or your keyboard shortcuts to enter your guess. Once you’ve crafted your potential passcode, click the Submit button to send your guess into the cosmic void. Every guess brings you closer to unlocking the mysteries hidden among the stars!</p>
            </div>
            <div class="text-center mt-5">
                <h2>Receive Feedback on Your Guess</h2>
                <p class="lead">Once your guess is submitted, the game will provide immediate feedback to guide you on your journey:<br/></p>
                <p class="lead">Red Background: This signifies that the symbol you guessed is not included in the passcode at all. Discard this symbol from your future guesses!<br/></p>
                <?php echo createCharacterTableOneColor($exampleCharacters, "colorrd"); ?>
                <p class="lead">Yellow Background: A yellow background indicates that the symbol is present in the passcode, but it’s in the wrong position. This means you're on the right track, but adjustments are needed.<br/></p>
                <?php echo createCharacterTableOneColor($exampleCharacters, "coloryl"); ?>
                <p class="lead">Yellow & Green Background: A yellow/green background means the symbol appears multiple times in the passcode. It is correctly placed in one position, but it also appears elsewhere in the passcode. Keep searching — it will be in another position as well.<br/></p>
                <?php echo createCharacterTableOneColor($exampleCharacters, "colorgy"); ?>
                <p class="lead">Green Background: A green background means that the symbol is correctly placed within the passcode! You’re getting closer to cracking the code!<br/></p>
                <?php echo createCharacterTableOneColor($exampleCharacters, "colorgn"); ?>
                <p class="lead">A complete guess will look something like this.</p>
                <?php echo createCharacterTable($fullExampleCharacters); ?>
                </p>
                <p class="lead">Remember, a guess can be 1-6 characters. Empty space characters do not need to be added to your guess, but will show up in your feedback. A complete guess feedback might also look like this.</p>
                <?php echo createCharacterTable($fullExampleCharacters2); ?>
                </p>
            </div>
            <div class="text-center mt-5">
                <h2>Deduce and Repeat</h2>
                <p class="lead">Armed with the feedback from your guesses, it's time to employ your deductive reasoning. Analyze the clues and make strategic changes to your next passcode guess. Keep refining your approach, using the feedback as your guide, and repeat the guessing process until you successfully solve the pattern.</p>
            </div>
        </div>
        <div class="button-container">
            <button class="galactic-button" onclick="location.href='<?php echo url_for("tutorial") ?>';">Back to Tutorial</button>
        </div>
    </body>
<?php include(PRIVATE_PATH . '/footer.php'); ?>
