const archive = document.getElementById('butArchive');
const jokes = document.getElementById('butJokes');
const butChange = document.getElementById('butLog');

archive.addEventListener('click', () => {
    window.location.href = '/archive';
})

jokes.addEventListener('click', () => {
    window.location.href = '/anecdots';
})

butChange.addEventListener('click', () => {
    window.location.href = '/login';
})