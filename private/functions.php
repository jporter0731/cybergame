<?php

// Return the url path
function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

// Get the passcode difficulty
function passcode_difficulty(){

}

// Creates the character button used for displaying patterns (on the view_passcode and guess_page)
function createCharacterButton($imagePath, $altText, $class) {
    return "
        <td class='$class' style='text-align: center;'>
            <button class='btn btn-default'>
                <img src='$imagePath' width='80' alt='$altText' />
            </button>
        </td>
    ";
}

// Creates the table for the example page for the example output
function createCharacterTable($characters) {
    $rows = "<tr>";

    foreach ($characters as $character) {
        $rows .= createCharacterButton($character['image'], $character['alt'], $character['class']);
    }

    $rows .= "</tr>";

    return "
        <div class='table-responsive'>
            <table class='table caption-top'>
                <tbody>
                    $rows
                </tbody>
            </table>
        </div>
    ";
}

// Creates the table for the example page where the result is all the same
function createCharacterTableOneColor($characters, $classColor) {
    $rows = "<tr>";

    foreach ($characters as $character) {
        $rows .= createCharacterButton($character['image'], $character['alt'], $classColor);
    }

    $rows .= "</tr>";

    return "
        <div class='table-responsive'>
            <table class='table caption-top'>
                <tbody>
                    $rows
                </tbody>
            </table>
        </div>
    ";
}
?>
