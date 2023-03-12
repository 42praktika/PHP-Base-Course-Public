const amplitude = 100;
const left_pos = 250;
const top_pos = -amplitude;
const pi = Math.PI;
const inc = pi / 30;
let position = 0;
const form =  document.querySelector(".registerForm");
function fly() {
    position += inc;
    form.style.left = amplitude * Math.cos(position)* Math.sin(position) + left_pos + "px";
    form.style.top = amplitude * Math.sin(position) + top_pos + "px";
}
let timer = setInterval("fly()", 40);
form.addEventListener("mouseover", ()=> {
        clearInterval(timer)
    }
)
form.addEventListener("mouseout", ()=> {
    timer = setInterval("fly()", 40);
})
