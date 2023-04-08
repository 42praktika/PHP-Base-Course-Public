function swapHeaderTheme_pink(){
    let hrefs = document.querySelectorAll('.hrefs_text');
    let icons = document.querySelectorAll('.icon_img');
    hrefs.forEach(href => {
        href.style.color = "#D68185";
    });
    icons.forEach(icon => {
        icon.style.filter = "contrast(0%)";
    });

}
