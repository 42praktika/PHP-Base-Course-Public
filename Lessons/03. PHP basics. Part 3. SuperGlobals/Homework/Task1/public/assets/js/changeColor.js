const changeColor = () => {
    document.body.style.backgroundColor = "#" + ((Math.random() * 0xffffff) << 0).toString(16);
}
setInterval(changeColor, 500);
