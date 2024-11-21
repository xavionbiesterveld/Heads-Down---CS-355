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
