const submit = document.querySelector('.signupbtn');
const state_number = document.querySelector('input[name="state_number"]');
const mark = document.querySelector('input[name="mark"]');
const model = document.querySelector('input[name="model"]');
const typeid = document.querySelector('input[name="typeid"]');
const cost = document.querySelector('input[name="cost"]');

submit.addEventListener('click', (event) => {
    alert("Машина добавлена успешно!");
    state_number.value = '';
    mark.value = '';
    model.value = '';
    typeid.value = '';
    cost.value = '';
})
