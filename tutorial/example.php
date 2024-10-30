<?php
function createCharacterButton($imagePath, $altText, $class) {
    return "
        <td class='$class'>
            <button class='btn btn-default'>
                <img src='$imagePath' width='80' alt='$altText' />
            </button>
        </td>
    ";
}

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
