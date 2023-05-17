const submit = document.querySelector('input[name="submit"]');
const name = document.querySelector('input[name="name_of_reviewer"]');
const star = document.querySelectorAll('input[name="stars"]')
const review = document.querySelector('textarea[name="review"]')


submit.addEventListener('click', (event) => {
    if (name.value === '' || review.value === '') {
        event.preventDefault();
        alert("Вы пропустили некоторые поля!");
    } else if
     (star[0].checked === false && star[1].checked === false && star[2].checked === false &&
        star[3].checked === false && star[4].checked === false) {
            event.preventDefault();
            alert("Поставьте оценку!");
    } else {
        alert("Спасибо за отзыв!");
    }
})

