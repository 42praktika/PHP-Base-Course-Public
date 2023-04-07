const signIn = document.querySelector('.form-signin');
const signUp = document.querySelector('.form-signup');
const frame = document.querySelector('.frame');
const signUpInActive = document.querySelector('.signup-inactive');
const signUpActive = document.querySelector('.signin-active');

const btns = document.querySelectorAll('.btn');

btns.forEach(btn =>  btn.addEventListener('click', () => {
    signIn.classList.toggle("form-signin-left");
    signUp.classList.toggle("form-signup-left");
    frame.classList.toggle("frame-long");
    signUpInActive.classList.toggle("signup-active");
    signUpActive.classList.toggle("signin-inactive");
}))
