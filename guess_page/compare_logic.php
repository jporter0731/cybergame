<?php

function compare_patterns($connection, $guessList, $correctID){
  //Get the correct pattern list
  $correctList = view_passcode($connection, $correctID);
  $guessColors = [];

  //Check for correct characters in correct spots
  foreach ($guessList as $key => $value) {
    if($correctList[$key] === $value){
        $guessColors[$key] = "colorgn";
        unset($correctList[$key]);
    }
  }

  //Check for correct characters in wrong spots
  foreach ($guessList as $guessKey => $guessValue) {
      // Check to make sure that the character has not been identified as correct
      if(!isset($guessColors[$guessKey])){
          $alreadyUsed = false;
          //Cycle through the correct list to see if the guess matches any of that list
          foreach ($correctList as $correctKey => $correctValue) {
            if($guessValue === $correctValue && !$alreadyUsed){
              //Set the color of the character if it is in the pattern but not in the right spot
              $guessColors[$guessKey] = "coloryl";
              unset($correctList[$correctKey]);
              //Quit looking for more characters in this pattern
              $alreadyUsed = true;
            }
          }
          //Make all other characters red if not set
          if(!isset($guessColors[$guessKey])){
              $guessColors[$guessKey] = "colorrd";
          }
      }
  }

  return $guessColors;
}

function correct_guess($connection, $guessID, $correctID){
    $guessList = view_passcode($connection, $guessID);
    $correctList = view_passcode($connection, $correctID);

    //Check for correct characters in correct spots
    foreach ($guessList as $key => $value) {
      if($correctList[$key] === $value){
          unset($correctList[$key]);
      }
    }

    //Check if the list it 0, if it is, the pattern was guessed correctly otherwise is wasnt
    //Return the result accordingly
    if (count($correctList) === 0){
      return 1;
    }else{
      return 0;
    }
}

?>
