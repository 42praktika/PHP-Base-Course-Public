const buttonCancel = document.querySelector('.cancelbtn');
const buttonSubmit = document.querySelector('.signupbtn');

let email = document.querySelector('input[name="email"]');
let phone = document.querySelector('input[name="phone"]');
let password = document.querySelector('input[name="psw"]');
let password_repeat = document.querySelector('input[name="psw-repeat"]');
let first_name = document.querySelector('input[name="first_name"]');
let second_name = document.querySelector('input[name="second_name"]');
let third_name = document.querySelector('input[name="third_name"]');
let number = document.querySelector('input[name="number"]');
let number_driver = document.querySelector('input[name="number_driver"]');
let series = document.querySelector('input[name="series"]');

const reg_numbers = /^[0-9]+$/;
const reg_symbols = /[а-яА-Я];
const reg_email = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
const reg_phone = /^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/;


buttonCancel.addEventListener('click', () => {
    email.value = '';
    phone.value = '';
    password.value = '';
    password_repeat.value = '';
    first_name.value = '';
    second_name.value = '';
    third_name.value = '';
    series.value = '';
    number.value = '';
    number_driver.value = '';
});

buttonSubmit.addEventListener('click', (event) => {
    if (password.value !== password_repeat.value) {
        event.preventDefault();
        alert('Пароли не совпадают');
        password.value = '';
        password_repeat.value = '';
    }
    if (reg_numbers.test(series.value) === false || reg_numbers.test(number.value) === false) {
        event.preventDefault();
        alert('Неверно введен паспорт(серия или номер)');
        series.value = '';
        number.value = '';
    }
    if (reg_numbers.test(number_driver.value) === false) {
        event.preventDefault();
        alert('Неверно введен номер водительского удостоверения');
        number_driver.value = '';
    }
    if (reg_symbols.test(first_name.value) === false || reg_symbols.test(second_name.value) === false || reg_symbols.test(third_name.value)) {
        event.preventDefault();
        alert('Неверно введены ФИО');
        first_name.value = '';
        second_name.value = '';
        third_name.value = '';
    }
    if (reg_email.test(email.value) === false) {
        event.preventDefault();
        alert('Неправильно введен email');
        email.value = '';
    }
    if (reg_phone.test(phone.value) === false) {
        event.preventDefault();
        alert('Неправильно введен номер телефона');
        phone.value = '';
    }
})