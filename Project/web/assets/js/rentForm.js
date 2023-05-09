const date = document.querySelector('input[name="rental_date"]');
const end_date = document.querySelector('input[name="end_date_of_rental"]');
const number_of_days = document.querySelector('input[name="number_of_days"]');
const sum = document.querySelector('input[name="sum"]');
const car_id = document.querySelector('input[name="car_id"]');
const submit = document.querySelector('.signupbtn');

Date.prototype.addDays = function(days) {
    let date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date.toLocaleDateString();
}

const data = new Date();
date.value = data.toLocaleDateString();

number_of_days.addEventListener('change', () => {
    switch (number_of_days.value) {
        case '1':
            end_date.value = data.addDays(1);
            break;
        case '2':
            end_date.value = data.addDays(2);
            break;
        case '3':
            end_date.value = data.addDays(3);
            break;
        case '4':
            end_date.value = data.addDays(4);
            break;
        case '5':
            end_date.value = data.addDays(5);
            break;
        case '6':
            end_date.value = data.addDays(6);
            break;
        case '7':
            end_date.value = data.addDays(7);
            break;
        default:
            alert('Арендовать можно только от 1 до 7 дней!')
            number_of_days.value = '';
    }
})

car_id.addEventListener('change', () => {
    switch (car_id.value) {
        case '1':
            sum.value = 2550 * number_of_days.value;
            break;
        case '2':
            sum.value = 2400 * number_of_days.value;
            break;
        case '3':
            sum.value = 3000 * number_of_days.value;
            break;
        case '4':
            sum.value = 3250 * number_of_days.value;
            break;
        case '5':
            sum.value = 3560 * number_of_days.value;
            break;
        case '6':
            sum.value = 3100 * number_of_days.value;
            break;
        case '7':
            sum.value = 4000 * number_of_days.value;
            break;
        case '8':
            sum.value = 5000 * number_of_days.value;
            break;
        case '9':
            sum.value = 3250 * number_of_days.value;
            break;
        case '10':
            sum.value = 3490 * number_of_days.value;
            break;
        default:
            alert("Такой машины нет");
    }
    submit.addEventListener('click', (event) => {
        alert('Машина арендована и ожидает вас по адресу ул.Пушкина д.Колотушкина. Занесите' + ' ' + sum.value + ' ' + 'рублей после поездки!');
    })
} )