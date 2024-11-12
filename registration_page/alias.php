<?php

  $firstWord = [
    "Rapid",
    "Bouncy",
    "Swift",
    "Whistling",
    "Graceful",
    "Spiraling",
    "Slippery",
    "Fidgety",
    "Endless",
    "Speedy",
    "Round",
    "Springy",
    "Mischievous",
    "Rhythmic",
    "Smooth",
    "Wild",
    "Excited",
    "Cozy",
    "Splashy",
    "Fiery",
    "Energetic",
    "Refined",
    "Stealthy",
    "Fast",
    "Twisty",
    "Powerful",
    "Mighty",
    "Messy",
    "Weightless",
    "Flexible"
  ];

  $secondWord = [
    "Jellybean",
    "Cupcake",
    "Ninja",
    "Panda",
    "Unicorn",
    "Pirate",
    "Cactus",
    "Giraffe",
    "Marshmallow",
    "Pickle",
    "Bumblebee",
    "Shark",
    "Kangaroo",
    "Burrito",
    "Llama",
    "Rocket",
    "Squirrel",
    "Monster",
    "Cookie",
    "Cheeseburger",
    "Dragonfly",
    "Donut",
    "Penguin",
    "Robot",
    "Pizza",
    "Taco",
    "Banana",
    "Pineapple",
    "Jellyfish",
    "Koala"
  ]

  // Generate a random user alias based on the arrays $firstWord and $secondWord
  function generateUserAlias(){
    //Get a random index for each array
    $randomIndex1 = array_rand($firstWord);
    $randomIndex2 = array_rand($secondWord);

    // Get the words from the selected indices
    $word1 = $firstWord[$randomIndex1];
    $word2 = $secondWord[$randomIndex2];

    // Combine the two words
    $randomCombination = $word1 . " " . $word2;

    return $randomCombination
  }

  function verifyAilis($ailis){
    
  }
?>
