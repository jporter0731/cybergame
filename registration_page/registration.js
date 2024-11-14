const resourcePath = "/cybergame/resources/";

// Create a mapping of keys to image sources
const keyImages = {
  'Q': resourcePath + 'character1.png',
  'W': resourcePath + 'character2.png',
  'E': resourcePath + 'character3.png',
  'R': resourcePath + 'character4.png',
  'T': resourcePath + 'character5.png',
  'Y': resourcePath + 'character6.png',
  'A': resourcePath + 'character7.png',
  'S': resourcePath + 'character8.png',
  'D': resourcePath + 'character9.png',
  'F': resourcePath + 'character10.png',
  'G': resourcePath + 'character11.png',
  'H': resourcePath + 'character12.png',
  'Z': resourcePath + 'character13.png',
  'X': resourcePath + 'character14.png',
  'C': resourcePath + 'character15.png',
  'V': resourcePath + 'character16.png',
  'B': resourcePath + 'character17.png',
  'N': resourcePath + 'character18.png',
};

function snackbar(type, msg, time){
    const snackbarContainer = document.getElementById('snackbar-container');
    const para = document.createElement('P');
    para.classList.add('snackbar');
    para.innerHTML = `${msg} <span> &times </span>`;

    if(type === 'error'){
        para.classList.add('error');
    }
    else if(type ==='success'){
        para.classList.add('success');
    }
    else if(type ==='warning'){
        para.classList.add('warning');
    }

    snackbarContainer.appendChild(para);
    para.classList.add('fadeout');

    setTimeout(()=>{
            snackbarContainer.removeChild(para)
    }, time)

}

function addToOutput(imageSrc, key) {
    const output = document.getElementById('output');
    const images = output.getElementsByTagName('img');

    //Verrify that the character length is not more than 6 before continuing
    if (images.length >= 6) {
        snackbar('warning', 'Your passcode can\'t be more than 6 characters long.', 5000);
        return; // Exit if the limit is reached
    }

    //Add the character to the list
    const img = document.createElement('img');
    img.src = imageSrc;
    img.className = 'output-image';
    output.appendChild(img);
}

// Listen for keypress events
document.addEventListener('keypress', function(event) {
    const key = event.key.toUpperCase(); // Convert to uppercase
    if (keyImages[key]) {
        addToOutput(keyImages[key], key); // Add image for the corresponding key
    }
});

// Listen for keydown events for Backspace and Escape
document.addEventListener('keydown', function(event) {
    if (event.key === 'Backspace') {
        removeLast(); // Call removeLast function on Backspace
    }
    if (event.key === 'Escape') {
        clearOutput(); // Call clearOutput function on Escape
    }
    if (event.key === 'Enter') {
        submitOutput(); // Call clearOutput function on Enter
    }
});

//Function to remove the chatacter from the list
function removeLast() {
    const output = document.getElementById('output');
    const images = output.getElementsByTagName('img');
    if (images.length > 0) {
        output.removeChild(images[images.length - 1]);
    }
}

//Function to clear the character list
function clearOutput() {
    const output = document.getElementById('output');
    output.innerHTML = ''; // Clear all images
}

//Function that will submit the users passcode once entered
function submitOutput() {
  const output = document.getElementById('output');
  const alias = document.getElementById('aliasDisplay').innerText;
  const images = output.getElementsByTagName('img');

  //Verify that the passcode is not length 0 before continuing
  if (images.length === 0) {
      snackbar('error', 'Your passcode must be at least 1 character long.', 5000);
      return; // Exit if the limit is reached
  }

  const imageFileNames = []; // Array to store filenames

  // Iterate through the images and extract filenames
  for (let img of images) {
      const fullPath = img.src;
      const filename = fullPath.split('/').pop(); // Get just the filename
      imageFileNames.push(filename); // Add filename to the array
  }

  // Send the output array to a the set passcode file
  const setPass = fetch('set_passcode.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
      },
      body: JSON.stringify({ filenames: imageFileNames }) // Send as JSON
  })

  // Send the user ailias to the set alias PHP file
  const setAilias = fetch('update_alias.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
      },
      body: JSON.stringify({ alias: alias }) // Send as JSON
  })

  // Chain the promises to ensure setPass runs first
setPass
    .then(response => {
        // Ensure setPass was successful before moving to setAlias
        if (!response.ok) {
            throw new Error('setPass failed');
        }
        return response.json();  // Handle response from setPass
    })
    .then(data => {
        console.log('setPass succeeded:', data);
        // After setPass succeeds, start setAlias
        return setAlias;  // Return the setAlias fetch promise to chain it
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('setAlias failed');
        }
        return response.json();  // Handle response from setAlias
    })
    .then(data => {
        console.log('setAlias succeeded:', data);
    })
    .catch(error => {
        console.error('Error:', error);  // Handle any errors
    });

  // Show the loading indicator
  document.getElementById('loadingIndicator').style.display = 'block';
  // Clear the output after the pattern has been submited
  snackbar('success', 'Your pattern has been set.', 5000);
  clearOutput();

  setTimeout(function() {
      window.location.href = "/cybergame/pick_passcode";
  }, 2000);


}
