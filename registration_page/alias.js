function generateAlias() {
    // Define your arrays (similar to what you had in PHP)
    const firstWord = ["Rapid", "Bouncy", "Swift", "Whistling", "Graceful", "Spiraling", "Slippery", "Fidgety", "Endless", "Speedy", "Round", "Springy", "Mischievous", "Rhythmic", "Smooth", "Wild", "Excited", "Cozy", "Splashy", "Fiery", "Energetic", "Refined", "Stealthy", "Fast", "Twisty", "Powerful", "Mighty", "Messy", "Weightless", "Flexible"];
    const secondWord = ["Jellybean", "Cupcake", "Ninja", "Panda", "Unicorn", "Pirate", "Cactus", "Giraffe", "Marshmallow", "Pickle", "Bumblebee", "Shark", "Kangaroo", "Burrito", "Llama", "Football", "Squirrel", "Monster", "Cookie", "Cheeseburger", "Dragonfly", "Donut", "Penguin", "Robot", "Pizza", "Taco", "Banana", "Pineapple", "Jellyfish", "Koala"];

    // Get a random index for each array
    const randomIndex1 = Math.floor(Math.random() * firstWord.length);
    const randomIndex2 = Math.floor(Math.random() * secondWord.length);

    // Get the words from the selected indices
    const word1 = firstWord[randomIndex1];
    const word2 = secondWord[randomIndex2];

    // Combine the two words to form the alias
    const randomCombination = word1 + " " + word2;

    // Update the displayed alias
    document.getElementById('aliasDisplay').innerText = randomCombination;
}

// Automatically generate an alias when the page loads
window.onload = function() {
    generateAlias();
};
