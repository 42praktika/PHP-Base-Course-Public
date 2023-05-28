
function swapTextTheme_pink(){
    let titles_3 = document.querySelectorAll('.title_3');
    titles_3.forEach(title => {
        title.style.color = "#D68185";
    });
}

function showForm(){
    document.getElementById("div1").classList.remove('active');
    document.getElementById("div2").classList.add('active');
};
function hiddenForm(){
    document.getElementById("div2").classList.remove('active');
    document.getElementById("div1").classList.add('active');
}

