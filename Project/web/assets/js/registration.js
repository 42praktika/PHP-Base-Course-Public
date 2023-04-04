const buttonCancel = document.querySelector('.cancelbtn');
const buttonSubmit = document.querySelector('.signupbtn');
let email = document.querySelector('input[name="email"]');
let password = document.querySelector('input[name="psw"]');
let password_repeat = document.querySelector('input[name="psw-repeat"]');
buttonCancel.addEventListener('click', () => {
    email.value = '';
    password.value = '';
    password_repeat.value = '';
});
buttonSubmit.addEventListener('click', (event) => {
    if (password.value !== password_repeat.value) {
        event.preventDefault();
        alert('Пароли не совпадают');
        password.value = '';
        password_repeat.value = '';
    }
})