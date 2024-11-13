const startButton = document.getElementById('startButton');
const gameContainer = document.getElementById('gameContainer');

startButton.addEventListener('click', () => {
    startButton.style.display = 'none';
    gameContainer.style.display = 'block';

    // Add your game logic here
});


document.addEventListener('DOMContentLoaded', () => {
    const startButton = document.getElementById('start-button');
    const wordDisplay = document.getElementById('word-display');

    const words = [
        "Elephant",
        "Pizza",
        "Spaceship",
        "Superman",
        "Guitar",
        "Sunflower"
    ];

    startButton.addEventListener('click', () => {
        const randomWord = words[Math.floor(Math.random() * words.length)];
        wordDisplay.textContent = randomWord;
    });
});
