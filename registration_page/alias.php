<?php
  // Generate a random user alias based on the arrays $firstWord and $secondWord
  function generateUserAlias(){
    $firstWord = ["Rapid", "Bouncy", "Swift", "Whistling", "Graceful", "Spiraling", "Slippery", "Fidgety", "Endless", "Speedy", "Round", "Springy", "Mischievous", "Rhythmic", "Smooth", "Wild", "Excited", "Cozy", "Splashy", "Fiery", "Energetic", "Refined", "Stealthy", "Fast", "Twisty", "Powerful", "Mighty", "Messy", "Weightless", "Flexible"];
    $secondWord = ["Jellybean", "Cupcake", "Ninja", "Panda", "Unicorn", "Pirate", "Cactus", "Giraffe", "Marshmallow", "Pickle", "Bumblebee", "Shark", "Kangaroo", "Burrito", "Llama", "Koala", "Squirrel", "Monster", "Cookie", "Cheeseburger", "Dragonfly", "Donut", "Penguin", "Robot", "Pizza", "Taco", "Banana", "Pineapple", "Jellyfish", "Ghost"];

    // Try again boolean
    $validAlias = 0;

    do{
      //Get a random index for each array
      $randomIndex1 = array_rand($firstWord);
      $randomIndex2 = array_rand($secondWord);
      // Get the words from the selected indices
      $word1 = $firstWord[$randomIndex1];
      $word2 = $secondWord[$randomIndex2];
      // Combine the two words
      $randomCombination = $word1 . " " . $word2;

      $validAlias = verifyAlias($randomCombination);
    } while ($validAlias === 0)

    return $randomCombination
  }

  function verifyAlias($ailis){
    //SQL Query to get the list of patterns with a specific id
    $aliasSQL = "SELECT * FROM users WHERE alias = '" . $alias . "'";

    //Get the passcode infomration
    $pattern_set = mysqli_query($db, $aliasSQL);
    $count = mysqli_num_rows($pattern_set);

    return $count;
  }
?>
