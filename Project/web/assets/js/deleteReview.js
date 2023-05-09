const deleteBtn = document.querySelector('.cancelbtn');
const idInput = document.querySelector('input[name="id"]');

deleteBtn.addEventListener('click', (event) => {
    alert('Запись успешно удалена!');
    idInput.value = '';
})