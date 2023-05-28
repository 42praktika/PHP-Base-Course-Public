const buttonArchive = document.getElementById('but2');
const login = document.getElementById('but1');
const buttonLogin = document.getElementById('butLog');
const closeLoginButton = document.querySelector('.close');
const windowLogin = document.querySelector('.LoginWindow');
const buttonReg = document.querySelector('.newbieReg');


buttonArchive.addEventListener('click', () => {
    window.location.href = '/archive';
})

buttonLogin.addEventListener('click', () => {
    window.location.href = '/login';
})

closeLoginButton.addEventListener('click', () => {
    windowLogin.style.visibility = 'hidden';
})

buttonReg.addEventListener('click', () => {
    window.location.href = '/register';
})

login.addEventListener('click', () => {
    windowLogin.style.visibility = 'visible';
})

