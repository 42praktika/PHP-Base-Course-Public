const doc = document.querySelector('body')
const color = ["#51e2f5", "#d0bdf4", "#ff1d58", "#f2d53c","#ffaaab","bisque"];
let i = 0;
function change() {
    doc.style.backgroundColor = color[i];
    i++;
    if(i > color.length - 1) {
        i = 0;
    }
}
setInterval(change, 1);

const btn=document.querySelector('#btn')
let width=5000
btn.addEventListener('mousemove',()=>{
    width=width-50
    btn.style.width=width+'px'
})