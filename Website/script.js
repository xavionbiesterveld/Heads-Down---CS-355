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

//Leader Board
const showLeaderboardButton = document.getElementById('showLeaderboard');
const leaderboardPopup = document.getElementById('leaderboardPopup');
const leaderboardBody = document.getElementById('leaderboardBody');
const closeLeaderboardButton = document.getElementById('closeLeaderboard');

showLeaderboardButton.addEventListener('click', () => {
  // Fetch leaderboard data from your server-side script
  fetch('fetch_leaderboard.php')
    .then(response => response.json())
    .then(data => {
      // Sort players by score in descending order
      data.sort((a, b) => b.score - a.score);

      // Add rank to each player
      data.forEach((player, index) => {
        player.rank = index + 1;
      });

      // Populate the leaderboard table
      data.forEach(player => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${player.rank}</td>
          <td>${player.username}</td>
          <td>${player.score}</td>
        `;
        leaderboardBody.appendChild(row);
      });

      // Show the leaderboard popup
      leaderboardPopup.style.display = 'block';
    })
    .catch(error => {
      console.error('Error fetching leaderboard data:', error);
      // Handle errors, e.g., display an error message
    });
});

closeLeaderboardButton.addEventListener('click', () => {
  leaderboardPopup.style.display = 'none';
});