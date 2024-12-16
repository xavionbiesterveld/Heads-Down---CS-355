
const startButton = document.getElementById('startButton');
const settingPage = document.getElementById('settingPage');
const nextAndSkip = document.getElementById('nextAndSkip');
const wordDisplay = document.getElementById('word-display');
const nextButton = document.getElementById('nextButton');
const skipButton = document.getElementById('skipButton');
const timerDisplay = document.createElement('div');

// Timer-related variables
let timeLeft = 60; // Seconds
let timerInterval;

// Score variables
let currentScore = 0;
let teamOneScore = 0;
let teamTwoScore = 0;
let currentTeam = 1;

// Word list
const words = [
    "Elephant",
    "Pizza",
    "Spaceship",
    "Superman",
    "Guitar",
    "Sunflower"
];

// Add the timer display to the game area
timerDisplay.id = "timer";
timerDisplay.style.fontSize = "1.5rem";
timerDisplay.style.fontWeight = "bold";
timerDisplay.style.margin = "20px";
document.getElementById('game-area').appendChild(timerDisplay);

startButton.addEventListener('click', () => {
    // Hide the start button and prepare the game
    startButton.style.display = 'none';
    settingPage.style.display = 'none';
    nextAndSkip.style.display = 'flex';

    // Start the timer
    startTimer();
    // Display a random word
    wordDisplay.textContent = getRandomWord();
});

nextButton.addEventListener('click', () => {
    // Increment score and display a new word
    currentScore++;
    wordDisplay.textContent = getRandomWord();
});

skipButton.addEventListener('click', () => {
    // Display a new word without incrementing the score
    wordDisplay.textContent = getRandomWord();
});

// Function to start the timer
function startTimer() {
    timeLeft = 60; // Reset timer for each round
    timerDisplay.textContent = `Time Left: ${timeLeft}s`;
    timerInterval = setInterval(() => {
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            timerDisplay.textContent = "Time's up!";
            nextTeam();
        } else {
            timerDisplay.textContent = `Time Left: ${timeLeft}s`;
            timeLeft--;
        }
    }, 1000); // 1000ms = 1 second
}

// Function to get a random word
function getRandomWord() {
    return words[Math.floor(Math.random() * words.length)];
}

function nextTeam() {
    clearInterval(timerInterval);

    if (currentTeam === 1) {
        teamOneScore = currentScore;
        currentTeam = 2;
        alert(`Team 1 scored: ${teamOneScore}. Team 2, get ready!`);
    } else {
        teamTwoScore = currentScore;
        alert(`Team 2 scored: ${teamTwoScore}`);
        endGame();
        return;
    }

    // Reset for the next team
    currentScore = 0;
    wordDisplay.textContent = "Press Start to see your word!";
    startButton.style.display = 'block';
    nextAndSkip.style.display = 'none';
}

// Function to end the game
function endGame() {
    if (teamOneScore > teamTwoScore) {
        alert("The winner is Team 1!");
    } else if (teamOneScore < teamTwoScore) {
        alert("The winner is Team 2!");
    } else {
        alert("It's a tie!");
    }

    // Reset the game for replay
    currentScore = 0;
    teamOneScore = 0;
    teamTwoScore = 0;
    currentTeam = 1;

    wordDisplay.textContent = "Press Start to see your word!";
    startButton.style.display = 'block';
    nextAndSkip.style.display = 'none';
}
