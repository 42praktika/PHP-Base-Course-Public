
function SetAuthContainerVisible(){
    document.getElementById('auth_container').style.visibility = "visible"
}
function SetAuthContainerHidden(){
    document.getElementById('auth_container').style.visibility = "hidden"
}
function redirect(urn){
    location.href = '/' + urn;
}