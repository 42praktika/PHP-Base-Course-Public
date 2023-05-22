const deleteBTN = document.querySelector('.delete');
deleteBTN.addEventListener('click', ()=> {
    if(confirm('Are you sure you want to leave the site?')) {
        window.location.href = 'http://localhost:8080/logout';
    }
})