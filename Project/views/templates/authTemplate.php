<div class="auth-container" id="auth-container">
    <form class="auth-content-container" id="login-content-container" action="login" method="post">
        <label for="" style="color: white; font-size: 40px; line-height: 48px;">Account</label>
        <div id="login-error-container" style="color: crimson"></div>
        <input type="email" placeholder="email" name="email" class="blurred-input" id="">
        <input type="password" placeholder="password" name="password" class="blurred-input" id="">

        <button type="button" id="validate-login-form-button" class="button-auth">Sign in</button>

        <div class="auth-bottom-container">

            <div class="outlined-button no-select" onclick="SetAuthContainerHidden()" onclick="">
                close
            </div>
            <div style="width: 20px;"></div>
            <div class="outlined-button" onclick="switchView('login-content-container', 'register-content-container')">sign up</div>
        </div>
        <label style="color: red;" id="auth-error-label"></label>
    </form>
    <form class="auth-content-container" style="display: none" id="register-content-container" action="register" method="post">
        <label for="" style="color: white; font-size: 40px; line-height: 48px;">Register</label>
        <div id="register-error-container" style="color: crimson"></div>
        <input type="text" placeholder="nickname" name="nickname" class="blurred-input" id="">
        <input type="email" placeholder="email" name="email" class="blurred-input" id="">
        <input type="password" placeholder="password" name="password" class="blurred-input" id="">
<!--        <input type="password" placeholder="repeat password" name="password_2" class="blurred-input" id="">-->
<!--        <button type="button" id="validate-register-form-button">test</button>-->
        <button type="button" class="button-auth" id="validate-register-form-button">Sign up</button>

        <div class="auth-bottom-container">

            <div class="outlined-button no-select" onclick="SetAuthContainerHidden()" onclick="">
                close
            </div>
            <div style="width: 20px;"></div>
            <div class="outlined-button no-select" onclick="switchView('login-content-container', 'register-content-container')">sign in</div>

        </div>
        <label style="color: red;" id="auth-error-label"></label>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>

    let registerForm = document.getElementById("register-content-container");
    let registerError = document.getElementById("register-error-container");
    let registerButton = document.getElementById("validate-register-form-button");
    //let response = await fetch("http://localhost:8042/validateRegisterForm");

    registerButton.onclick = sendRegisterForm;

    function sendRegisterForm() {
        registerForm = document.getElementById("register-content-container");
        jQuery.ajax({
            url:     'http://localhost:8042/validateRegisterForm',
            type:     "POST",
            dataType: "html",
            data: jQuery(registerForm).serialize(),
            success: function(response) {
                //let result = jQuery.text(response);
                if(response === "ok"){
                    registerForm.submit();
                    return;
                }
                registerError.innerText = response;
            },
            error: function(response) { // Данные не отправлены
                loginError.innerText = "Error sending form";
            }
        });
    }

    let loginForm = document.getElementById("login-content-container");
    let loginError = document.getElementById("login-error-container");
    let loginButton = document.getElementById("validate-login-form-button");


    loginButton.onclick = sendLoginForm;

    function sendLoginForm() {

        loginForm = document.getElementById("login-content-container");
        jQuery.ajax({
            url:     'http://localhost:8042/validateLoginForm',
            type:     "POST",
            dataType: "html",
            data: jQuery(loginForm).serialize(),
            success: function(response) {

                if(response === "ok"){
                    loginForm.submit();
                    return;
                }
                loginError.innerText = response;
            },
            error: function(response) {
                loginError.innerText = "Error sending form";
            }
        });
    }

    function switchView(firstContainerID, secondContainerID){
        let firstContainer = document.getElementById(firstContainerID);
        let secondContainer = document.getElementById(secondContainerID);

        if(firstContainer.style.display === "none"){
            firstContainer.style.display = "flex";
            secondContainer.style.display = "none";
        }
        else{
            firstContainer.style.display = "none";
            secondContainer.style.display = "flex";
        }

    }
</script>