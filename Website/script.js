const startButton = document.getElementById('startButton');
const gameContainer = document.getElementById('game-area');
const wordDisplay = document.getElementById('word-display');
const timerDisplay = document.createElement('div');

// Timer-related variables
let timeLeft = 60; // Seconds
let timerInterval;

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

const wrapper = document.querySelector('.wrapper')
const loginLink = document.querySelector('.login-link')
const registerLink = document.querySelector('.register-link')
const btnPopup = document.querySelector('.btnLogin-popup');
const closeWindow = document.querySelector('.close-window');

registerLink.addEventListener('click', () => {
    wrapper.classList.add('active');
})

loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');
})

btnPopup.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
})

closeWindow.addEventListener('click', () => {
    wrapper.classList.remove('active-popup');
})
