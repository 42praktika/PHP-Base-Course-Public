const LETTERS = {
    A: 'А',
    B: 'Б',
    V: 'В',
    G: 'Г',
    D: 'Д',
    E: 'Е',
    J: 'Ж',
    Z: 'З',
    I: 'И',
    K: 'К',
    L: 'Л',
    M: 'М',
    N: 'Н',
    O: 'О',
    P: 'П',
    R: 'Р',
    S: 'С',
    T: 'Т',
    Y: 'У',
    F: 'Ф',
    X: 'Х',
    C: 'Ц',
    CH: 'Ч',
    SH: 'Ш',
    'b-I': 'Ы',
    YE: 'Э',
    U: 'Ю',
    YA: 'Я',
    Gosling: 'Да не умер он в конце драйва',
}

const state = {
    letterIndex: 0,
    name: ' ',
}

const lettersKeys = Object.keys(LETTERS);

const startApp = () => {
    const name = document.getElementById('name');

    name.addEventListener('click', () => {
        const testModal = document.querySelector('.modal');
        if (testModal !== null) {
            testModal.remove();
            state.letterIndex = 0;
            state.name = ' ';
        }

        let modal = $modal({
            title: state.name,
            content: `<div class="card"><img alt="Пикчу украли" src="/public/assets/letters/${lettersKeys[state.letterIndex]}.jpg" class="card__img"/> <div class="card__buttons"> <button class="card__button card__button--dislike">Dislike</button> <button class="card__button card__button--like">Like</button> </div> </div>`,
            footerButtons: [
                { class: 'btn btn__ok', text: 'Сохранить', handler: 'modalHandlerOk' }
            ]
        });

        const likeButton = document.querySelector('.card__button--like');
        const dislikeButton = document.querySelector('.card__button--dislike');
        const saveButton = document.querySelector('.btn__ok');

        likeButton.addEventListener('click', () => {
            if (state.letterIndex === 9) {
                window.location.href = '/info';
            }
            if (state.name === ' ' || state.letterIndex === lettersKeys.length - 1) {
                state.name = LETTERS[lettersKeys[state.letterIndex]];
                modal.setTitle(state.name);
            } else {
                state.name += LETTERS[lettersKeys[state.letterIndex]];
                modal.setTitle(state.name);
            }

            changeSlide();
        });

        dislikeButton.addEventListener('click', changeSlide);

        saveButton.addEventListener('click', () => {
            const nameInput = document.getElementById('name-input');
            const nameLabel = document.getElementById('name');

            nameInput.value = state.name;
            nameLabel.textContent = state.name;

            state.name = ' ';
            state.letterIndex = 0;

            modal.destroy();
        });

        modal.show();
    })
}

const changeSlide = () => {
    const img = document.querySelector('.card__img');
    if (state.letterIndex === lettersKeys.length - 1) {
        state.letterIndex = 0;
    } else {
        state.letterIndex++;
    }

    img.src = `/public/assets/letters/${lettersKeys[state.letterIndex]}.jpg`;
}

document.addEventListener('DOMContentLoaded', function() {
    startApp();
});