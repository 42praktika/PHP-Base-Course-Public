let currentSymbol = ""
const link = document.querySelector('link')
const inputUsername = document.querySelector(".input-username")
const updateUsername = () => {
    inputUsername.addEventListener("focus", event => {
        link.href = "../assets/favicons/def.png"
    })

    inputUsername.addEventListener('keypress',  event => {
        if (event.keyCode === 32) {
            currentSymbol = parseInt((Math.random() * 35).toString())
            link.href = "../assets/favicons/" + currentSymbol + ".png"
            console.log(link.href)
        }
    })

    inputUsername.addEventListener("keypress", event => {
        if (event.key == "+") {
            if (currentSymbol === "") {
                alert('Сначала нажмите "Пробел"')
            } else {
                if (currentSymbol < 10) {
                    inputUsername.value = inputUsername.value + String.fromCharCode(48 + currentSymbol)
                } else {
                    inputUsername.value = inputUsername.value + String.fromCharCode(87 + currentSymbol).toUpperCase()
                }
            }
        }
    })

    inputUsername.addEventListener( "keydown", event => {
        if (event.key === "Backspace" ) {
            inputUsername.value = inputUsername.value.substring(0, inputUsername.value.length - 1)
            return false;
        }
    })
}


updateUsername()


const inputPassword = document.querySelector(".input-password")
inputPassword.addEventListener("focus", event => {
    link.href = "../assets/favicons/password.png"
})

inputPassword.addEventListener("keypress", event => {
    if (event.key == "+") {
        if (currentSymbol === "") {
            alert('Сначала нажмите "Пробел"')
        } else {
            if (currentSymbol < 10) {
                inputPassword.value = inputPassword.value + String.fromCharCode(48 + currentSymbol)
            } else {
                inputPassword.value = inputPassword.value + String.fromCharCode(87 + currentSymbol).toUpperCase()
            }
        }
    }
})

inputPassword.addEventListener('keypress',  event => {
    if (event.keyCode === 32) {
            currentSymbol = parseInt((Math.random() * 35).toString())
    }
})

inputPassword.addEventListener( "keydown", event => {
    if (event.key === "Backspace" ) {
        inputPassword.value = inputPassword.value.substring(0, inputPassword.value.length - 1)
        return false;
    }
})

const checker = document.querySelector("#checker")
checker.addEventListener("click", event => {
    if (checker.checked) {
        document.title = inputPassword.value
    }
    else {
        document.title = 'Скрыт'
    }
})



