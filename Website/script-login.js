const wrapper = document.querySelector('.wrapper')
const loginLink = document.querySelector('.login-link')
const registerLink = document.querySelector('.register-link')
const btnPopup = document.querySelector('.btnLogin-popup')
const closeWindow = document.querySelector('.close-window')
const btnPopupCat = document.querySelector('.btncategorycreation-popup')

if (registerLink) {
    registerLink.addEventListener('click', () => {
        wrapper.classList.add('active');
    })
}

if (loginLink) {
    loginLink.addEventListener('click', () => {
        wrapper.classList.remove('active');
    })
}

if (btnPopup) {
    btnPopup.addEventListener('click', () => {
        wrapper.classList.add('active-popup');
    })
}

if (closeWindow) {
    closeWindow.addEventListener('click', () => {
        wrapper.classList.remove('active-popup');
    })
}

if (btnPopupCat) {
    btnPopupCat.addEventListener('click', () => {
        wrapper.classList.add('active-popup');
    })
}