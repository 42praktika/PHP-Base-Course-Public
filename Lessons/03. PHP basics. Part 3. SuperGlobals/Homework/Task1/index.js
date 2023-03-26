document.addEventListener("DOMContentLoaded", () => {
    const date_field = document.querySelector(".date-in-seconds");
    const button_minus = document.querySelector("button.minus");
    const button_plus = document.querySelector("button.plus");
    const table = document.querySelector(".age");
    const age_field = document.querySelector(".age-field");

    button_minus.addEventListener('click', () => {
        const seconds = Number(date_field.value);
        date_field.value = seconds - 1;
    })

    button_plus.addEventListener('click', () => {
        const seconds = Number(date_field.value);
        date_field.value = seconds + 1;
    })

    table.addEventListener('click', (event) => {
        if (!event.target.classList.contains('checked-item')) {
            event.target.classList.add('checked-item');
            age_field.value = Number(age_field.value) + 1;
        }
    })
})
