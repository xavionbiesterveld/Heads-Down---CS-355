// run 'npm install axios' or 'yarn add axios' in bash to install Axios
import axios from 'axios';
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

const numPlayersInput = document.getElementById('numPlayers');
const timeLimitInput = document.getElementById('timeLimit');
const categorySelect = document.getElementById('category');
const startGameButton = document.getElementById('startGame');

startGameButton.addEventListener('click', () => {
    const numPlayers = parseInt(numPlayersInput.value);
    const timeLimit = parseInt(timeLimitInput.value);
    const category = categorySelect.value;

    // Send the selected settings to the game logic or server
    console.log(`Number of Players: ${numPlayers}`);
    console.log(`Time Limit: ${timeLimit} seconds`);
    console.log(`Category: ${category}`);

    // You might want to redirect to the game screen or trigger other actions here
    // For example, you could use JavaScript's window.location.href to redirect.
});

//Leader Board
function showLeaderBoard() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
  }
axios.get('fetch_leaderboard.php')
.then(response => {
    const players = response.data; // Assuming the PHP script returns an array of player objects

    // Now you have an array of players, each with 'user_id' and 'score' properties
    console.log(players);

    // Use the 'players' array to populate your leaderboard display
    const leaderboardContainer = document.getElementById('leaderboard');
    players.forEach(player => {
        const leaderboardRow = document.createElement('tr');
        leaderboardRow.innerHTML = `
        <td>${player.user_id}</td>
        <td>${player.score}</td>
        `;
        leaderboardContainer.appendChild(leaderboardRow);
    });
})
.catch(error => {
    console.error('Error fetching leaderboard data:', error);
});
