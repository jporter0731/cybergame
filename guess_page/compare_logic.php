<?php

function compare_patterns($connection, $guessList, $correctID){
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
      if(!isset($guessColors[$guessKey])){
          foreach ($correctList as $correctKey => $correctValue) {
            if($guessValue === $correctValue){
              $guessColors[$guessKey] = "coloryl";
              unset($correctList[$correctKey]);
            }
          }
          if(!isset($guessColors[$guessKey])){
              $guessColors[$guessKey] = "colorrd";
          }
      }
  }

  return $guessColors;
}

?>
