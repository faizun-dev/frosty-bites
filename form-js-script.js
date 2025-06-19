const signUpButton = document.getElementById('js-overlay-signUp-button');
const signInButton = document.getElementById('js-overlay-signIn-button');
const container = document.getElementById('js-container');

signUpButton.addEventListener('click', () => {
    container.classList.add('right-panel-active');
});

signInButton.addEventListener('click', () => {
    container.classList.remove('right-panel-active');
});