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
