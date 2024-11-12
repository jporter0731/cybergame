function generateAlias() {
    fetch('alias.php', {  // Send a request to the PHP file
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',  // Specify that we're sending JSON data
        }
    })
    .then(response => response.json())  // Parse the JSON response from the server
    .then(data => {
        console.log('Generated Alias:', data.alias);  // Handle the response and output the alias
        document.getElementById("aliasDisplay").innerText = data.alias;  // Display the alias on the page
    })
    .catch(error => {
        console.error('Error:', error);  // If there's an error, log it
    });
}

// Automatically generate an alias when the page loads
window.onload = function() {
    generateAlias();
};
