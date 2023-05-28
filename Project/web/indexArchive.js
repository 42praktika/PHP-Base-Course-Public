const mainPage = document.getElementById('butTitle');
const login = document.getElementById('but1');
const windowLogin = document.querySelector('.LoginWindow');
const closeLoginButton = document.querySelector('.close');
const buttonReg = document.querySelector('.newbieReg');

mainPage.addEventListener('click', () => {
    window.location.href = '/';
})

login.addEventListener('click', () => {
    windowLogin.style.visibility = 'visible';
})

closeLoginButton.addEventListener('click', () => {
    windowLogin.style.visibility = 'hidden';
})

buttonReg.addEventListener('click', () => {
    window.location.href = '/register';
})