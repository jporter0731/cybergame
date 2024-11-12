<?php
// Get the raw POST data
$inputData = file_get_contents('php://input');

// Decode the JSON data
$data = json_decode($inputData, true);
$aliasRaw = $data['alias'];
// Check if the alias is received
if (isset($data['alias'])) {
    $alias = $data['alias'];

    // Do something with the alias (e.g., save to a database or file)
    // For this example, we'll just echo the alias back as a response
    echo json_encode(['status' => 'success', 'alias' => $alias]);
} else {
    // Handle error if alias is not sent
    echo json_encode(['status' => 'error', 'message' => $aliasRaw]);
}
?>
