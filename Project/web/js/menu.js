const btn = document.querySelector('.dropButton');
btn.addEventListener('click', ()=>{
    document.getElementById("dropList").classList.toggle("show");
})

const lists = document.querySelectorAll(".dropLists");
const listsBtn = document.querySelectorAll('.dropListsBtn');
for (let i = 0; i < listsBtn.length; i++) {
    listsBtn[i].addEventListener("click", () => {
        lists[i].classList.toggle("show");
    })

}