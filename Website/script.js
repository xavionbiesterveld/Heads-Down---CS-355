const startButton = document.getElementById('startButton');
const gameContainer = document.getElementById('gameContainer');

startButton.addEventListener('click', () => {
    startButton.style.display = 'none';
    gameContainer.style.display = 'block';

    // Add your game logic here
});

//Start of nate code
document.addEventListener('DOMContentLoaded', () => {
    const startButton = document.getElementById('start-button');
    const wordDisplay = document.getElementById('word-display');
})

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
gameContainer.appendChild(timerDisplay);

startButton.addEventListener('click', () => {
    // Hide the start button and prepare the game
    startButton.style.display = 'none';
    settingPage.style.display = 'none';
    nextAndSkip.style.display = 'flex';

    //category-selection
    const selectedCategories = [];
    const categoryCheckboxes = document.querySelectorAll('.category-checkbox input[type="checkbox"]:checked');
    categoryCheckboxes.forEach(checkbox => {
        selectedCategories.push(checkbox.value);
    });

    // Display a random word
    
    const randomWord = words[Math.floor(Math.random() * words.length)];
    wordDisplay.textContent = randomWord;
    

    // Start the timer
    startTimer();
});

// Function to start the timer
function startTimer() {
    timerInterval = setInterval(() => {
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            timerDisplay.textContent = "Time's up!";
        } else {
            timerDisplay.textContent = `Time Left: ${timeLeft}s`;
            timeLeft--;
        }
    }, 1000); // 1000ms = 1 second
}

//Leader Board
const showLeaderboardButton = document.getElementById('showLeaderboard');
const leaderboardPopup = document.getElementById('leaderboardPopup');
const leaderboardBody = document.getElementById('leaderboardBody');
const closeLeaderboardButton = document.getElementById('closeLeaderboard');

showLeaderboardButton.addEventListener('click', () => {
  // Fetch leaderboard data from your server-side script
      // Show the leaderboard popup
      leaderboardPopup.style.display = 'flex';
    })
    .catch(error => {
      console.error('Error fetching leaderboard data:', error);
      // Handle errors, e.g., display an error message
    });;

closeLeaderboardButton.addEventListener('click', () => {
  leaderboardPopup.style.display = 'none';
});