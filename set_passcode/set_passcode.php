<?php
// Get the JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Check if 'filenames' exists
if (isset($data['filenames']) && is_array($data['filenames'])) {
    $imageFileNames = $data['filenames'];

    // Iterate over the filenames and process them as needed
    foreach ($imageFileNames as $filename) {
        $insertPatternSQL = INSERT INTO patterns (difficulty, char1) VALUES ('easy', $filename);

        //Get the passcode infomration
        $insertInto = mysqli_query($db, $getPatternSQL);
    }

    // Return a success response
    echo json_encode(['status' => 'success', 'message' => 'Filenames processed']);
} else {
    // Return an error response
    echo json_encode(['status' => 'error', 'message' => 'No filenames received']);
}
?>
